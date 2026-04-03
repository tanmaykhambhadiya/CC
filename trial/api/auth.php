<?php
// api/auth.php - Main authentication API handler

// Include configuration
require_once '../config.php';

// Set headers for API
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit;
}

// Get the request path
$request = $_SERVER['PATH_INFO'] ?? '';
$request = trim($request, '/');

// Process based on the endpoint
switch ($request) {
    case 'register':
        handleRegister();
        break;
    case 'login':
        handleLogin();
        break;
    case 'logout':
        handleLogout();
        break;
    case 'forgot-password':
        handleForgotPassword();
        break;
    case 'reset-password':
        handleResetPassword();
        break;
    case 'verify-phone':
        handleVerifyPhone();
        break;
    case 'verify-code':
        handleVerifyCode();
        break;
    case 'google-auth':
        handleGoogleAuth();
        break;
    default:
        sendResponse('error', 'Endpoint not found');
}

// Function to handle user registration
function handleRegister() {
    // Check request method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        sendResponse('error', 'Method not allowed');
    }

    // Get request data
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Validate data
    if (!isset($data['name']) || !isset($data['email']) || !isset($data['password'])) {
        sendResponse('error', 'Missing required fields');
    }
    
    $name = $data['name'];
    $email = $data['email'];
    $password = $data['password'];
    $phone = $data['phone'] ?? null;
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        sendResponse('error', 'Invalid email format');
    }
    
    // Validate password strength
    if (strlen($password) < 8) {
        sendResponse('error', 'Password must be at least 8 characters long');
    }
    
    // Connect to database
    $conn = connectDB();
    if (!$conn) {
        sendResponse('error', 'Database connection failed');
    }
    
    // Check if email already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        sendResponse('error', 'Email already registered');
    }
    
    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert user
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $hashedPassword, $phone);
    
    if ($stmt->execute()) {
        $userId = $conn->insert_id;
        
        // Create session
        $token = generateToken();
        $expiresAt = date('Y-m-d H:i:s', strtotime('+30 days'));
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        
        $stmt = $conn->prepare("INSERT INTO sessions (user_id, token, ip_address, user_agent, expires_at) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $userId, $token, $ipAddress, $userAgent, $expiresAt);
        $stmt->execute();
        
        sendResponse('success', 'Registration successful', [
            'token' => $token,
            'expires_at' => $expiresAt,
            'user' => [
                'id' => $userId,
                'name' => $name,
                'email' => $email
            ]
        ]);
    } else {
        sendResponse('error', 'Registration failed');
    }
    
    $stmt->close();
    $conn->close();
}

// Function to handle user login
function handleLogin() {
    // Check request method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        sendResponse('error', 'Method not allowed');
    }

    // Get request data
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Validate data
    if (!isset($data['email']) || !isset($data['password'])) {
        sendResponse('error', 'Missing required fields');
    }
    
    $email = $data['email'];
    $password = $data['password'];
    
    // Connect to database
    $conn = connectDB();
    if (!$conn) {
        sendResponse('error', 'Database connection failed');
    }
    
    // Get user by email
    $stmt = $conn->prepare("SELECT id, name, email, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        sendResponse('error', 'Invalid email or password');
    }
    
    $user = $result->fetch_assoc();
    
    // Verify password
    if (!password_verify($password, $user['password'])) {
        sendResponse('error', 'Invalid email or password');
    }
    
    // Create session
    $token = generateToken();
    $expiresAt = date('Y-m-d H:i:s', strtotime('+30 days'));
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    
    $stmt = $conn->prepare("INSERT INTO sessions (user_id, token, ip_address, user_agent, expires_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user['id'], $token, $ipAddress, $userAgent, $expiresAt);
    $stmt->execute();
    
    sendResponse('success', 'Login successful', [
        'token' => $token,
        'expires_at' => $expiresAt,
        'user' => [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email']
        ]
    ]);
    
    $stmt->close();
    $conn->close();
}

// Function to handle user logout
function handleLogout() {
    // Check request method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        sendResponse('error', 'Method not allowed');
    }
    
    // Get authorization header
    $headers = getallheaders();
    $authHeader = $headers['Authorization'] ?? '';
    
    if (empty($authHeader) || !strpos($authHeader, 'Bearer ')) {
        sendResponse('error', 'Invalid authorization header');
    }
    
    $token = str_replace('Bearer ', '', $authHeader);
    
    // Connect to database
    $conn = connectDB();
    if (!$conn) {
        sendResponse('error', 'Database connection failed');
    }
    
    // Delete session
    $stmt = $conn->prepare("DELETE FROM sessions WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    
    if ($stmt->affected_rows > 0) {
        sendResponse('success', 'Logout successful');
    } else {
        sendResponse('error', 'Invalid session');
    }
    
    $stmt->close();
    $conn->close();
}

// Function to handle forgot password
function handleForgotPassword() {
    // Check request method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        sendResponse('error', 'Method not allowed');
    }

    // Get request data
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Validate data
    if (!isset($data['email'])) {
        sendResponse('error', 'Missing required fields');
    }
    
    $email = $data['email'];
    
    // Connect to database
    $conn = connectDB();
    if (!$conn) {
        sendResponse('error', 'Database connection failed');
    }
    
    // Check if email exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        // Don't reveal if email exists or not for security
        sendResponse('success', 'If your email is registered, you will receive a password reset link');
    }
    
    $user = $result->fetch_assoc();
    
    // Generate reset token
    $resetToken = bin2hex(random_bytes(32));
    $resetExpires = date('Y-m-d H:i:s', strtotime('+1 hour'));
    
    // Update user with reset token
    $stmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_expires = ? WHERE id = ?");
    $stmt->bind_param("ssi", $resetToken, $resetExpires, $user['id']);
    $stmt->execute();
    
    // In a real application, you would send an email here
    // For this example, we'll just return the token
    sendResponse('success', 'If your email is registered, you will receive a password reset link', [
        'reset_token' => $resetToken
    ]);
    
    $stmt->close();
    $conn->close();
}

// Function to handle reset password
function handleResetPassword() {
    // Check request method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        sendResponse('error', 'Method not allowed');
    }

    // Get request data
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Validate data
    if (!isset($data['token']) || !isset($data['password'])) {
        sendResponse('error', 'Missing required fields');
    }
    
    $token = $data['token'];
    $password = $data['password'];
    
    // Validate password strength
    if (strlen($password) < 8) {
        sendResponse('error', 'Password must be at least 8 characters long');
    }
    
    // Connect to database
    $conn = connectDB();
    if (!$conn) {
        sendResponse('error', 'Database connection failed');
    }
    
    // Get user by reset token
    $stmt = $conn->prepare("SELECT id FROM users WHERE reset_token = ? AND reset_expires > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        sendResponse('error', 'Invalid or expired reset token');
    }
    
    $user = $result->fetch_assoc();
    
    // Hash new password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Update user password and clear reset token
    $stmt = $conn->prepare("UPDATE users SET password = ?, reset_token = NULL, reset_expires = NULL WHERE id = ?");
    $stmt->bind_param("si", $hashedPassword, $user['id']);
    $stmt->execute();
    
    sendResponse('success', 'Password reset successful');
    
    $stmt->close();
    $conn->close();
}

// Function to handle phone verification
function handleVerifyPhone() {
    // Check request method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        sendResponse('error', 'Method not allowed');
    }

    // Get request data
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Validate data
    if (!isset($data['phone'])) {
        sendResponse('error', 'Missing required fields');
    }
    
    $phone = $data['phone'];
    
    // Validate phone number format
    if (!preg_match('/^\+[0-9]{10,15}$/', $phone)) {
        sendResponse('error', 'Invalid phone number format');
    }
    
    // Connect to database
    $conn = connectDB();
    if (!$conn) {
        sendResponse('error', 'Database connection failed');
    }
    
    // Generate verification code
    $verificationCode = sprintf("%06d", mt_rand(100000, 999999));
    $verificationExpires = date('Y-m-d H:i:s', strtotime('+15 minutes'));
    
    // Check if phone already exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE phone = ?");
    $stmt->bind_param("s", $phone);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Update existing user
        $user = $result->fetch_assoc();
        $stmt = $conn->prepare("UPDATE users SET verification_code = ?, verification_expires = ? WHERE id = ?");
        $stmt->bind_param("ssi", $verificationCode, $verificationExpires, $user['id']);
    } else {
        // Create new user
        $name = "User"; // Default name
        $tempEmail = $phone . "@temp.concertcircle.com"; // Temporary email
        $tempPassword = password_hash(bin2hex(random_bytes(8)), PASSWORD_DEFAULT); // Random password
        
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone, auth_method, verification_code, verification_expires) VALUES (?, ?, ?, ?, 'phone', ?, ?)");
        $stmt->bind_param("ssssss", $name, $tempEmail, $tempPassword, $phone, $verificationCode, $verificationExpires);
    }
    
    $stmt->execute();
    
    // In a real application, you would send an SMS here
    // For this example, we'll just return the code
    sendResponse('success', 'Verification code sent', [
        'verification_code' => $verificationCode
    ]);
    
    $stmt->close();
    $conn->close();
}

// Function to handle verification code
function handleVerifyCode() {
    // Check request method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        sendResponse('error', 'Method not allowed');
    }

    // Get request data
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Validate data
    if (!isset($data['phone']) || !isset($data['code'])) {
        sendResponse('error', 'Missing required fields');
    }
    
    $phone = $data['phone'];
    $code = $data['code'];
    
    // Connect to database
    $conn = connectDB();
    if (!$conn) {
        sendResponse('error', 'Database connection failed');
    }
    
    // Verify code
    $stmt = $conn->prepare("SELECT id, name, email FROM users WHERE phone = ? AND verification_code = ? AND verification_expires > NOW()");
    $stmt->bind_param("ss", $phone, $code);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        sendResponse('error', 'Invalid or expired verification code');
    }
    
    $user = $result->fetch_assoc();
    
    // Mark as verified and clear verification code
    $stmt = $conn->prepare("UPDATE users SET is_verified = 1, verification_code = NULL, verification_expires = NULL WHERE id = ?");
    $stmt->bind_param("i", $user['id']);
    $stmt->execute();
    
    // Create session
    $token = generateToken();
    $expiresAt = date('Y-m-d H:i:s', strtotime('+30 days'));
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    
    $stmt = $conn->prepare("INSERT INTO sessions (user_id, token, ip_address, user_agent, expires_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $user['id'], $token, $ipAddress, $userAgent, $expiresAt);
    $stmt->execute();
    
    sendResponse('success', 'Phone verification successful', [
        'token' => $token,
        'expires_at' => $expiresAt,
        'user' => [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'phone' => $phone
        ]
    ]);
    
    $stmt->close();
    $conn->close();
}

// Function to handle Google authentication
function handleGoogleAuth() {
    // Check request method
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        sendResponse('error', 'Method not allowed');
    }

    // Get request data
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Validate data
    if (!isset($data['google_id']) || !isset($data['name']) || !isset($data['email'])) {
        sendResponse('error', 'Missing required fields');
    }
    
    $googleId = $data['google_id'];
    $name = $data['name'];
    $email = $data['email'];
    
    // Connect to database
    $conn = connectDB();
    if (!$conn) {
        sendResponse('error', 'Database connection failed');
    }
    
    // Check if user exists by Google ID or email
    $stmt = $conn->prepare("SELECT id, name, email FROM users WHERE google_id = ? OR email = ?");
    $stmt->bind_param("ss", $googleId, $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 0) {
        // Create new user
        $tempPassword = password_hash(bin2hex(random_bytes(8)), PASSWORD_DEFAULT); // Random password
        
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, google_id, auth_method, is_verified) VALUES (?, ?, ?, ?, 'google', 1)");
        $stmt->bind_param("ssss", $name, $email, $tempPassword, $googleId);
        $stmt->execute();
        
        $userId = $conn->insert_id;
    } else {
        // Update existing user
        $user = $result->fetch_assoc();
        $userId = $user['id'];
        
        $stmt = $conn->prepare("UPDATE users SET google_id = ?, name = ?, is_verified = 1, auth_method = 'google' WHERE id = ?");
        $stmt->bind_param("ssi", $googleId, $name, $userId);
        $stmt->execute();
    }
    
    // Create session
    $token = generateToken();
    $expiresAt = date('Y-m-d H:i:s', strtotime('+30 days'));
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    
    $stmt = $conn->prepare("INSERT INTO sessions (user_id, token, ip_address, user_agent, expires_at) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $userId, $token, $ipAddress, $userAgent, $expiresAt);
    $stmt->execute();
    
    sendResponse('success', 'Google authentication successful', [
        'token' => $token,
        'expires_at' => $expiresAt,
        'user' => [
            'id' => $userId,
            'name' => $name,
            'email' => $email
        ]
    ]);
    
    $stmt->close();
    $conn->close();
}

// Helper function to generate a secure token
function generateToken() {
    return bin2hex(random_bytes(32));
}