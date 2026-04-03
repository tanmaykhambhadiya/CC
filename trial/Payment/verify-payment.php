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

function validateCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Environment variables
$appId = getenv('CASHFREE_APP_ID');
$secretKey = getenv('CASHFREE_SECRET_KEY');
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
        $pdo = new PDO($dsn, $config['username'], $config['password'], [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]);
        return $pdo;
    } catch (PDOException $e) {
        error_log("DB connect error: " . $e->getMessage());
        throw new Exception('Database connection failed');
    }
}

function verifyCashfreePayment($orderId, $appId, $secretKey, $baseUrl) {
    $url = $baseUrl . '/pg/orders/' . urlencode($orderId);

    $headers = [
        'Content-Type: application/json',
        'x-api-version: 2023-08-01',
        'x-client-id: ' . $appId,
        'x-client-secret: ' . $secretKey
    ];

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_HTTPGET => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => $headers,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_FOLLOWLOCATION => true
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $error = curl_error($ch);
    curl_close($ch);

    error_log("VERIFY-RESPONSE [{$orderId}] HTTP {$httpCode}: $response");

    if ($error) {
        return ['success' => false, 'message' => 'Network error: ' . $error];
    }

    if ($httpCode !== 200) {
        return ['success' => false, 'message' => "API returned HTTP {$httpCode}", 'response' => $response];
    }

    $data = json_decode($response, true);

    if (json_last_error() !== JSON_ERROR_NONE) {
        return ['success' => false, 'message' => 'Invalid JSON response', 'response' => $response];
    }

    if (!isset($data['order_status'])) {
        return ['success' => false, 'message' => 'Missing order_status in response', 'data' => $data];
    }

    return [
        'success' => true,
        'order_status' => $data['order_status'],
        'order_amount' => $data['order_amount'] ?? 0,
        'transaction_id' => $data['cf_order_id'] ?? $orderId,
        'payment_method' => $data['payment_method'] ?? 'Unknown',
        'payment_data' => $data
    ];
}

function checkOrderExists($orderId, $pdo) {
    try {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM orders WHERE order_id = ?");
        $stmt->execute([$orderId]);
        return $stmt->fetchColumn() > 0;
    } catch (PDOException $e) {
        error_log("Order check failed: " . $e->getMessage());
        return false;
    }
}

function updateOrderStatus($orderId, $status, $txnId, $paymentData, $pdo) {
    try {
        // Check if order exists first
        if (!checkOrderExists($orderId, $pdo)) {
            error_log("Order {$orderId} not found in database");
            return false;
        }

        $stmt = $pdo->prepare("UPDATE orders SET status = ?, transaction_id = ?, payment_data = ?, updated_at = NOW() WHERE order_id = ?");
        $result = $stmt->execute([$status, $txnId, json_encode($paymentData), $orderId]);
        
        if ($result) {
            error_log("Order {$orderId} updated successfully with status: {$status}");
        } else {
            error_log("Failed to update order {$orderId}");
        }
        
        return $result;
    } catch (PDOException $e) {
        error_log("Order update failed for {$orderId}: " . $e->getMessage());
        return false;
    }
}

function savePaymentDetails($orderId, $paymentData, $pdo) {
    try {
        // Check if payment already exists
        $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM payments WHERE order_id = ?");
        $checkStmt->execute([$orderId]);
        
        if ($checkStmt->fetchColumn() > 0) {
            error_log("Payment for order {$orderId} already exists, skipping insert");
            return true;
        }

        $stmt = $pdo->prepare("INSERT INTO payments 
            (payment_id, order_id, amount, currency, payment_method, payment_status, transaction_time, gateway_response) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

        $result = $stmt->execute([
            $paymentData['cf_payment_id'] ?? $orderId,
            $orderId,
            $paymentData['order_amount'] ?? 0,
            $paymentData['order_currency'] ?? 'INR',
            $paymentData['payment_method'] ?? 'Unknown',
            $paymentData['order_status'],
            date('Y-m-d H:i:s'),
            json_encode($paymentData)
        ]);

        if ($result) {
            error_log("Payment details saved for order {$orderId}");
        } else {
            error_log("Failed to save payment details for order {$orderId}");
        }

        return $result;
    } catch (PDOException $e) {
        error_log("Insert payment failed for {$orderId}: " . $e->getMessage());
        return false;
    }
}

function sendConfirmationEmail($order, $payment) {
    $to = $order['customer_email'];
    $subject = 'Payment Confirmation - Order #' . $order['order_id'];
    $message = "<html><body>
        <h2>🎶 Thank you for your payment!</h2>
        <p>Hi " . htmlspecialchars($order['customer_name']) . ",</p>
        <p>Here are your order details:</p>
        <ul>
            <li><strong>Order ID:</strong> " . $order['order_id'] . "</li>
            <li><strong>Transaction ID:</strong> " . htmlspecialchars($payment['transaction_id']) . "</li>
            <li><strong>Amount:</strong> ₹" . number_format($order['order_amount'], 2) . "</li>
        </ul>
        
        <p>Enjoy the concert!</p>
    </body></html>";

    $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=UTF-8',
        'From: noreply@concertcircle.com'
    ];

    return mail($to, $subject, $message, implode("\r\n", $headers));
}

// Main processing
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $input = json_decode(file_get_contents('php://input'), true);

        if (!$input || empty($input['order_id']) || empty($input['csrf_token'])) {
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Missing order_id or CSRF token']);
            exit;
        }

        if (!validateCsrfToken($input['csrf_token'])) {
            http_response_code(403);
            echo json_encode(['success' => false, 'message' => 'Invalid CSRF token']);
            exit;
        }

        $orderId = $input['order_id'];
        error_log("Starting verification for order: {$orderId}");

        // Get database connection
        $pdo = getDatabaseConnection($dbConfig);

        // Verify payment with Cashfree
        $result = verifyCashfreePayment($orderId, $appId, $secretKey, $baseUrl);

        if (!$result['success']) {
            error_log("Cashfree verification failed for {$orderId}: " . $result['message']);
            http_response_code(500);
            echo json_encode([
                'success' => false, 
                'message' => $result['message'],
                'order_status' => 'FAILED'
            ]);
            exit;
        }

        $orderStatus = $result['order_status'];
        error_log("Order {$orderId} status from Cashfree: {$orderStatus}");

        // Update order status in database
        $updateResult = updateOrderStatus($orderId, $orderStatus, $result['transaction_id'], $result['payment_data'], $pdo);
        
        if (!$updateResult) {
            error_log("Failed to update order status in database for {$orderId}");
        }

        // Save payment details if payment is successful
        if ($orderStatus === 'PAID') {
            savePaymentDetails($orderId, $result['payment_data'], $pdo);
            
            // Send confirmation email
            try {
                $stmt = $pdo->prepare("SELECT * FROM orders WHERE order_id = ?");
                $stmt->execute([$orderId]);
                $orderData = $stmt->fetch();
                if ($orderData) {
                    sendConfirmationEmail($orderData, $result);
                }
            } catch (PDOException $e) {
                error_log("Order fetch failed for email: " . $e->getMessage());
            }
        }

        // Return response
        echo json_encode([
            'success' => true,
            'order_status' => $orderStatus,
            'order_amount' => $result['order_amount'],
            'transaction_id' => $result['transaction_id'],
            'payment_method' => $result['payment_method'],
            'database_updated' => $updateResult
        ]);

    } catch (Exception $e) {
        error_log("Verification error: " . $e->getMessage());
        http_response_code(500);
        echo json_encode([
            'success' => false, 
            'message' => 'Server error occurred',
            'order_status' => 'ERROR'
        ]);
    }
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
}
?>