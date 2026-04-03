<?php
// config.php - Database connection configuration
define('DB_HOST', '193.203.184.230'); // Your Hostinger MySQL hostname
define('DB_USER', 'u991936209_Authentication'); // Your Hostinger MySQL username
define('DB_PASS', '~2Sac6^pS'); // Your Hostinger MySQL password
define('DB_NAME', 'u991936209_Final_auth'); // Your database name

// Create connection
function connectDB() {
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Check connection
    if ($conn->connect_error) {
        return false;
    }
    
    return $conn;
}

// API response helper function
function sendResponse($status, $message, $data = null) {
    header('Content-Type: application/json');
    $response = [
        'status' => $status,
        'message' => $message
    ];
    
    if ($data !== null) {
        $response['data'] = $data;
    }
    
    echo json_encode($response);
    exit;
}