<?php
session_start([
    'cookie_secure' => true,
    'cookie_httponly' => true,
    'cookie_samesite' => 'Strict'
]);

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: https://concertcircle.com');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

$isSecure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off')
    || (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');

if (!$isSecure) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'HTTPS required']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

$appId = getenv('CASHFREE_PROD_APP_ID');
$secretKey = getenv('CASHFREE_PROD_SECRET_KEY');
$baseUrl = 'https://api.cashfree.com';

$dbConfig = [
    'host' => getenv('DB_HOST'),
    'dbname' => getenv('DB_NAME'),
    'username' => getenv('DB_USER'),
    'password' => getenv('DB_PASSWORD')
];

function getDatabaseConnection($config) {
    try {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";
        return new PDO($dsn, $config['username'], $config['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]);
    } catch (PDOException $e) {
        error_log("Database connection failed: " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Database connection failed']);
        exit;
    }
}

function validateOrderData($input) {
    $errors = [];

    $required = ['customer_details', 'order_amount', 'order_currency', 'order_id', 'csrf_token'];
    foreach ($required as $field) {
        if (empty($input[$field])) {
            $errors[] = "Missing required field: $field";
        }
    }

    if (!isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $input['csrf_token'] ?? '')) {
        $errors[] = "Invalid CSRF token";
    }

    $customer = $input['customer_details'] ?? [];
    $fields = ['customer_id', 'customer_name', 'customer_email', 'customer_phone'];
    foreach ($fields as $f) {
        if (empty($customer[$f])) {
            $errors[] = "Missing customer field: $f";
        }
    }

    if (!filter_var($customer['customer_email'] ?? '', FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (!preg_match('/^\d{10,12}$/', preg_replace('/\D/', '', $customer['customer_phone'] ?? ''))) {
        $errors[] = "Invalid phone number";
    }

    if (($input['order_currency'] ?? '') !== 'INR') {
        $errors[] = "Only INR is supported";
    }

    return $errors;
}

function saveOrder($orderData, $dbConfig) {
    try {
        $pdo = getDatabaseConnection($dbConfig);
        $sql = "INSERT INTO orders (order_id, customer_name, customer_email, customer_phone, order_amount, order_currency, status)
                VALUES (?, ?, ?, ?, ?, ?, 'PENDING')";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $orderData['order_id'],
            $orderData['customer_details']['customer_name'],
            $orderData['customer_details']['customer_email'],
            $orderData['customer_details']['customer_phone'],
            $orderData['order_amount'],
            $orderData['order_currency']
        ]);
        return true;
    } catch (PDOException $e) {
        if ($e->getCode() == 23000) { // Duplicate order_id
            error_log("Duplicate order_id: " . $orderData['order_id']);
        }
        error_log("Database save error: " . $e->getMessage());
        return false;
    }
}

function createCashfreeOrder($orderData, $appId, $secretKey, $baseUrl) {
    $url = $baseUrl . '/pg/orders';

    $payload = [
        'order_id' => $orderData['order_id'],
        'order_amount' => $orderData['order_amount'],
        'order_currency' => $orderData['order_currency'],
        'customer_details' => [
            'customer_id' => $orderData['customer_details']['customer_id'],
            'customer_name' => $orderData['customer_details']['customer_name'],
            'customer_email' => $orderData['customer_details']['customer_email'],
            'customer_phone' => $orderData['customer_details']['customer_phone']
        ],
        'order_meta' => [
            'return_url' => 'https://concertcircle.com/payment-success.html?order_id=' . $orderData['order_id'],
            'notify_url' => 'https://concertcircle.com/payment-webhook.php'
        ]
    ];

    $headers = [
        'Content-Type: application/json',
        'x-api-version: 2023-08-01',
        'x-client-id: ' . $appId,
        'x-client-secret: ' . $secretKey
    ];

    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_SSL_VERIFYPEER => true
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    if ($error) {
        return ['success' => false, 'message' => 'cURL Error', 'error' => $error];
    }

    $responseData = json_decode($response, true);

    if ($httpCode !== 200) {
        return [
            'success' => false,
            'message' => $responseData['message'] ?? 'Cashfree API error',
            'debug' => $responseData
        ];
    }

    return [
        'success' => true,
        'payment_session_id' => $responseData['payment_session_id'],
        'order_id' => $orderData['order_id']
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (!$input) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Invalid JSON']);
        exit;
    }

    $errors = validateOrderData($input);
    if (!empty($errors)) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => implode(', ', $errors)]);
        exit;
    }

    if (!saveOrder($input, $dbConfig)) {
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Failed to save order']);
        exit;
    }

    $result = createCashfreeOrder($input, $appId, $secretKey, $baseUrl);
    if ($result['success']) {
        echo json_encode([
            'success' => true,
            'order_id' => $result['order_id'],
            'payment_session_id' => $result['payment_session_id']
        ]);
    } else {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'message' => $result['message'],
            'debug' => $result['debug'] ?? null
        ]);
    }
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
}
?>
