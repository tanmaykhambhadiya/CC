<?php
require_once 'vendor/autoload.php'; // Dompdf autoload
use Dompdf\Dompdf;
use Dompdf\Options;

// Increase memory and execution time for PDF generation
ini_set('memory_limit', '512M');
ini_set('max_execution_time', 300);
ini_set('log_errors', 1);
ini_set('error_log', 'receipt_errors.log');

// More permissive CORS headers for debugging
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

function sendErrorResponse($code, $message, $details = '') {
    http_response_code($code);
    header('Content-Type: application/json');
    $error = [
        'error' => $message,
        'code' => $code,
        'timestamp' => date('Y-m-d H:i:s')
    ];
    if (!empty($details)) {
        $error['details'] = $details;
    }
    error_log("Receipt Error ($code): $message - $details");
    echo json_encode($error, JSON_PRETTY_PRINT);
    exit;
}

function sendDebugResponse($data) {
    header('Content-Type: application/json');
    echo json_encode([
        'debug' => true,
        'timestamp' => date('Y-m-d H:i:s'),
        'data' => $data
    ], JSON_PRETTY_PRINT);
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
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_TIMEOUT => 10
            ]);
            // Test connection
            $pdo->query('SELECT 1');
        } catch (PDOException $e) {
            error_log("DB Connection Error: " . $e->getMessage());
            sendErrorResponse(500, 'Database connection failed', $e->getMessage());
        }
    }
    return $pdo;
}

function getReceiptData($orderId, $dbConfig) {
    try {
        $pdo = getDatabaseConnection($dbConfig);
        
        // First check if order exists
        $checkStmt = $pdo->prepare("SELECT COUNT(*) as count FROM orders WHERE order_id = ?");
        $checkStmt->execute([$orderId]);
        $orderExists = $checkStmt->fetch()['count'] > 0;
        
        if (!$orderExists) {
            return ['error' => 'Order not found', 'order_id' => $orderId];
        }

        // Get order and payment data
        $stmt = $pdo->prepare("
            SELECT 
                o.*,
                p.payment_method,
                p.transaction_time,
                p.transaction_id as payment_transaction_id
            FROM orders o 
            LEFT JOIN payments p ON o.order_id = p.order_id 
            WHERE o.order_id = ?
        ");
        $stmt->execute([$orderId]);
        $result = $stmt->fetch();

        if (!$result) {
            return ['error' => 'Order data not found', 'order_id' => $orderId];
        }

        // Check payment status - be more flexible
        if (!in_array($result['status'], ['PAID', 'SUCCESS', 'COMPLETED'])) {
            // Still return data but with a warning
            $data = [
                'order_id' => $result['order_id'],
                'customer_name' => $result['customer_name'] ?? 'N/A',
                'customer_email' => $result['customer_email'] ?? 'N/A',
                'customer_phone' => $result['customer_phone'] ?? 'N/A',
                'amount' => $result['order_amount'] ?? 0,
                'currency' => $result['order_currency'] ?? 'INR',
                'payment_method' => $result['payment_method'] ?? 'Unknown',
                'transaction_time' => $result['transaction_time'] ?? $result['updated_at'] ?? date('Y-m-d H:i:s'),
                'transaction_id' => $result['payment_transaction_id'] ?? $result['transaction_id'] ?? $result['order_id'],
                'status' => $result['status'],
                'warning' => 'Payment status is: ' . $result['status']
            ];
            return $data;
        }

        return [
            'order_id' => $result['order_id'],
            'customer_name' => $result['customer_name'] ?? 'N/A',
            'customer_email' => $result['customer_email'] ?? 'N/A',
            'customer_phone' => $result['customer_phone'] ?? 'N/A',
            'amount' => $result['order_amount'] ?? 0,
            'currency' => $result['order_currency'] ?? 'INR',
            'payment_method' => $result['payment_method'] ?? 'Unknown',
            'transaction_time' => $result['transaction_time'] ?? $result['updated_at'] ?? date('Y-m-d H:i:s'),
            'transaction_id' => $result['payment_transaction_id'] ?? $result['transaction_id'] ?? $result['order_id'],
            'status' => $result['status']
        ];

    } catch (PDOException $e) {
        error_log("Receipt Fetch Error: " . $e->getMessage());
        return ['error' => 'Database error: ' . $e->getMessage()];
    }
}

function generateHTMLReceipt($data, $company) {
    $warningHtml = '';
    if (isset($data['warning'])) {
        $warningHtml = '<div style="background: #fff3cd; color: #856404; padding: 10px; margin: 15px 0; border: 1px solid #ffeaa7; border-radius: 5px;">
            <strong>Notice:</strong> ' . htmlspecialchars($data['warning']) . '
        </div>';
    }

    return '
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Payment Receipt - ' . htmlspecialchars($data['order_id']) . '</title>
        <style>
            body { 
                font-family: DejaVu Sans, Arial, sans-serif; 
                margin: 20px; 
                background-color: #f5f5f5;
                font-size: 14px;
                line-height: 1.4;
            }
            .receipt { 
                max-width: 600px; 
                margin: 0 auto;
                padding: 30px; 
                background: white; 
                border: 1px solid #ddd;
                border-radius: 8px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            .header { 
                text-align: center; 
                border-bottom: 2px solid #333; 
                padding-bottom: 15px; 
                margin-bottom: 20px; 
            }
            .header h2 {
                margin: 0 0 10px 0;
                font-size: 24px;
                color: #333;
            }
            .company-name {
                font-size: 18px;
                font-weight: bold;
                color: #666;
                margin: 0;
            }
            .details {
                margin: 20px 0;
            }
            .details table {
                width: 100%;
                border-collapse: collapse;
            }
            .details td {
                padding: 10px 0;
                border-bottom: 1px solid #eee;
                vertical-align: top;
            }
            .details td:first-child {
                font-weight: bold;
                width: 35%;
                color: #333;
            }
            .details td:last-child {
                color: #666;
            }
            .amount {
                font-size: 18px;
                font-weight: bold;
                color: #2c5aa0;
            }
            .status {
                display: inline-block;
                padding: 4px 8px;
                border-radius: 4px;
                font-size: 12px;
                font-weight: bold;
                background: #d4edda;
                color: #155724;
            }
            .footer { 
                text-align: center; 
                margin-top: 30px; 
                font-size: 12px; 
                color: #888;
                border-top: 1px solid #eee;
                padding-top: 15px;
            }
            .footer p {
                margin: 5px 0;
            }
            @media print {
                body { background-color: white; }
                .receipt { box-shadow: none; border: none; }
            }
        </style>
    </head>
    <body>
        <div class="receipt">
            <div class="header">
                <h2>Payment Receipt</h2>
                <p class="company-name">' . htmlspecialchars($company['name']) . '</p>
            </div>
            ' . $warningHtml . '
            <div class="details">
                <table>
                    <tr>
                        <td>Order ID:</td>
                        <td>' . htmlspecialchars($data['order_id']) . '</td>
                    </tr>
                    <tr>
                        <td>Status:</td>
                        <td><span class="status">' . htmlspecialchars($data['status'] ?? 'UNKNOWN') . '</span></td>
                    </tr>
                    <tr>
                        <td>Customer Name:</td>
                        <td>' . htmlspecialchars($data['customer_name']) . '</td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td>' . htmlspecialchars($data['customer_email']) . '</td>
                    </tr>
                    <tr>
                        <td>Phone:</td>
                        <td>' . htmlspecialchars($data['customer_phone']) . '</td>
                    </tr>
                    <tr>
                        <td>Amount:</td>
                        <td class="amount">' . htmlspecialchars($data['currency']) . ' ' . number_format($data['amount'], 2) . '</td>
                    </tr>
                    <tr>
                        <td>Payment Method:</td>
                        <td>' . htmlspecialchars($data['payment_method']) . '</td>
                    </tr>
                    <tr>
                        <td>Transaction ID:</td>
                        <td>' . htmlspecialchars($data['transaction_id']) . '</td>
                    </tr>
                    <tr>
                        <td>Transaction Time:</td>
                        <td>' . htmlspecialchars($data['transaction_time']) . '</td>
                    </tr>
                </table>
            </div>
            <div class="footer">
                <p><strong>' . htmlspecialchars($company['name']) . '</strong></p>
                <p>' . htmlspecialchars($company['address']) . '</p>
                <p>Phone: ' . htmlspecialchars($company['phone']) . ' | Email: ' . htmlspecialchars($company['email']) . '</p>
                <p>Website: ' . htmlspecialchars($company['website']) . '</p>
                <p><em>Generated on: ' . date('Y-m-d H:i:s') . '</em></p>
            </div>
        </div>
    </body>
    </html>';
}

function generatePDFReceipt($data, $company) {
    try {
        // Check if Dompdf is available
        if (!class_exists('Dompdf\Dompdf')) {
            throw new Exception("Dompdf library not found. Please install it using: composer require dompdf/dompdf");
        }

        $options = new Options();
        $options->set('defaultFont', 'DejaVu Sans');
        $options->set('isRemoteEnabled', false);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isFontSubsettingEnabled', true);
        $options->set('defaultMediaType', 'print');
        $options->set('defaultPaperSize', 'A4');
        $options->set('defaultPaperOrientation', 'portrait');
        $options->set('isPhpEnabled', false);
        
        $dompdf = new Dompdf($options);
        
        $html = generateHTMLReceipt($data, $company);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        $output = $dompdf->output();
        
        if (empty($output)) {
            throw new Exception("PDF output is empty");
        }
        
        return $output;
        
    } catch (Exception $e) {
        error_log("PDF Generation Error: " . $e->getMessage());
        throw new Exception("PDF generation failed: " . $e->getMessage());
    }
}

// ==== MAIN LOGIC ====
try {
    // Debug mode check
    $debug = isset($_GET['debug']) || isset($_GET['test']);
    
    if ($debug) {
        error_log("Receipt Handler Debug Mode - Request: " . json_encode($_GET));
    }

    // Handle different request methods
    if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
        sendErrorResponse(405, 'Method not allowed');
    }

    // Test endpoint
    if (isset($_GET['test'])) {
        sendDebugResponse([
            'message' => 'Receipt handler is working',
            'php_version' => PHP_VERSION,
            'dompdf_available' => class_exists('Dompdf\Dompdf'),
            'request_data' => $_GET,
            'server_info' => [
                'document_root' => $_SERVER['DOCUMENT_ROOT'] ?? 'N/A',
                'script_name' => $_SERVER['SCRIPT_NAME'] ?? 'N/A',
                'request_uri' => $_SERVER['REQUEST_URI'] ?? 'N/A'
            ]
        ]);
    }

    $orderId = $_GET['order_id'] ?? '';
    $format = $_GET['format'] ?? 'html';

    if (empty($orderId)) {
        sendErrorResponse(400, 'Order ID is required');
    }

    // More flexible order ID validation
    if (!preg_match('/^order_\d+/', $orderId)) {
        sendErrorResponse(400, 'Invalid Order ID format');
    }

    $companyDetails = [
        'name' => 'Concert Circle',
        'address' => 'Ahmedabad, Gujarat, India',
        'phone' => '+91-XXXXXXXXXX',
        'email' => 'support@concertcircle.com',
        'website' => 'concertcircle.com'
    ];

    $receiptData = getReceiptData($orderId, $dbConfig);

    if (isset($receiptData['error'])) {
        $statusCode = $receiptData['error'] === 'Order not found' ? 404 : 500;
        sendErrorResponse($statusCode, $receiptData['error'], $receiptData['details'] ?? '');
    }

    if ($debug) {
        sendDebugResponse([
            'message' => 'Receipt data retrieved successfully',
            'order_id' => $orderId,
            'format' => $format,
            'receipt_data' => $receiptData
        ]);
    }

    if ($format === 'pdf') {
        try {
            $pdf = generatePDFReceipt($receiptData, $companyDetails);
            
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="receipt-' . $receiptData['order_id'] . '.pdf"');
            header('Content-Length: ' . strlen($pdf));
            header('Cache-Control: private, max-age=0, must-revalidate');
            header('Pragma: public');
            
            if (ob_get_level()) {
                ob_end_clean();
            }
            
            echo $pdf;
            exit;
            
        } catch (Exception $e) {
            error_log("PDF Generation Failed: " . $e->getMessage());
            sendErrorResponse(500, 'PDF Generation Failed', $e->getMessage());
        }
    } else {
        // HTML format
        header('Content-Type: text/html; charset=UTF-8');
        echo generateHTMLReceipt($receiptData, $companyDetails);
    }

} catch (Exception $e) {
    error_log("General Error: " . $e->getMessage());
    sendErrorResponse(500, 'Internal Server Error', $debug ? $e->getMessage() : 'Please try again later');
}

// Test function
function testSystem() {
    return [
        'php_version' => PHP_VERSION,
        'dompdf_available' => class_exists('Dompdf\Dompdf'),
        'file_exists' => file_exists(__FILE__),
        'writable' => is_writable(__DIR__),
        'timestamp' => date('Y-m-d H:i:s')
    ];
}
?>