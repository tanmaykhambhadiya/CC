<?php
// Cashfree Webhook Handler

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: https://concertcircle.com');
header('Access-Control-Allow-Methods: POST');

// Enforce HTTPS
$isSecure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');

if (!$isSecure) {
    http_response_code(403);
    echo json_encode(['error' => 'HTTPS required']);
    exit;
}

// Database configuration
$dbConfig = [
    'host' => '193.203.184.230',
    'dbname' => 'u991936209_Concert_Circle',
    'username' => 'u991936209_first',
    'password' => 'Concertcircle1705'
];

function getDatabaseConnection($config) {
    static $pdo = null;

    if ($pdo === null) {
        try {
            $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
            $pdo = new PDO($dsn, $config['username'], $config['password'], [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);
        } catch (PDOException $e) {
            error_log("DB connection failed: " . $e->getMessage());
            http_response_code(500);
            echo json_encode(['error' => 'Database connection failed']);
            exit;
        }
    }

    return $pdo;
}

function verifyWebhookSignature($data, $signature, $secretKey) {
    $computed = base64_encode(hash_hmac('sha256', $data, $secretKey, true));
    return hash_equals($signature, $computed);
}

function updateOrderStatus($orderId, $status, $webhookData, $dbConfig) {
    try {
        $pdo = getDatabaseConnection($dbConfig);
        $sql = "UPDATE orders SET status = ?, webhook_data = ?, updated_at = NOW() WHERE order_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$status, json_encode($webhookData), $orderId]);
        return $stmt->rowCount() > 0;
    } catch (PDOException $e) {
        error_log("DB update error: " . $e->getMessage());
        return false;
    }
}

function savePaymentDetails($orderId, $data, $dbConfig) {
    try {
        $pdo = getDatabaseConnection($dbConfig);
        $sql = "INSERT INTO payments (payment_id, order_id, amount, currency, payment_method, payment_status, transaction_time, gateway_response) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $data['data']['payment']['payment_id'] ?? $orderId,
            $orderId,
            $data['data']['order']['order_amount'] ?? 0.00,
            $data['data']['order']['order_currency'] ?? 'INR',
            $data['data']['payment']['payment_method'] ?? '',
            $data['data']['payment']['payment_status'] ?? $data['event'],
            $data['data']['payment']['payment_time'] ?? date('Y-m-d H:i:s'),
            json_encode($data)
        ]);
        return true;
    } catch (PDOException $e) {
        error_log("DB payment save error: " . $e->getMessage());
        return false;
    }
}

function logWebhook($data, $success) {
    $log = [
        'order_id' => $data['data']['order']['order_id'] ?? 'unknown',
        'event' => $data['event'] ?? 'unknown',
        'success' => $success,
        'timestamp' => date('Y-m-d H:i:s')
    ];
    error_log("WEBHOOK LOG: " . json_encode($log));
}

// Main webhook logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawData = file_get_contents('php://input');
    $webhookData = json_decode($rawData, true);

    if (!$webhookData || !isset($webhookData['data']['order']['order_id'])) {
        logWebhook(['error' => 'Invalid webhook structure'], false);
        http_response_code(400);
        echo json_encode(['error' => 'Invalid webhook data']);
        exit;
    }

    // Signature from header
    $headers = getallheaders();
    $signature = '';
    foreach ($headers as $key => $value) {
        if (strtolower($key) === 'x-webhook-signature') {
            $signature = $value;
            break;
        }
    }

    if (empty($signature)) {
        logWebhook(['error' => 'Missing signature'], false);
        http_response_code(401);
        echo json_encode(['error' => 'Missing webhook signature']);
        exit;
    }

    $secretKey = getenv('CASHFREE_SECRET_KEY');
    if (!verifyWebhookSignature($rawData, $signature, $secretKey)) {
        logWebhook(['error' => 'Signature mismatch'], false);
        http_response_code(401);
        echo json_encode(['error' => 'Invalid webhook signature']);
        exit;
    }

    $orderId = $webhookData['data']['order']['order_id'];
    $event = $webhookData['event'] ?? 'UNKNOWN';

    $statusMap = [
        'PAYMENT_SUCCESS_WEBHOOK' => 'PAID',
        'PAYMENT_FAILED_WEBHOOK' => 'FAILED',
        'PAYMENT_USER_DROPPED_WEBHOOK' => 'CANCELLED'
    ];

    $status = $statusMap[$event] ?? 'UNKNOWN';

    $orderUpdated = updateOrderStatus($orderId, $status, $webhookData, $dbConfig);
    $paymentSaved = savePaymentDetails($orderId, $webhookData, $dbConfig);

    logWebhook($webhookData, $orderUpdated && $paymentSaved);

    if ($orderUpdated && $paymentSaved) {
        http_response_code(200);
        echo json_encode(['status' => 'success']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Failed to process webhook']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
 