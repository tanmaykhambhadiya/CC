<?php
// Allow cross-origin requests if needed
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Database connection details - replace with your Hostinger credentials
$servername = "193.203.184.230";
$username = "u991936209_first";
$password = "Concertcircle1705";
$dbname = "u991936209_Concert_Circle"; // concert_circle or whatever you named it

// Get the posted data
$data = json_decode(file_get_contents("php://input"));

// Validate input
if(empty($data->email)) {
    echo json_encode(array("success" => false, "message" => "Email is required"));
    exit();
}

// Sanitize email
$email = filter_var($data->email, FILTER_SANITIZE_EMAIL);

// Validate email format
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(array("success" => false, "message" => "Invalid email format"));
    exit();
}

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($conn->connect_error) {
    echo json_encode(array("success" => false, "message" => "Database connection failed: " . $conn->connect_error));
    exit();
}

try {
    // Check if email already exists
    $check_stmt = $conn->prepare("SELECT id FROM email_registrations WHERE email = ?");
    $check_stmt->bind_param("s", $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    
    if($result->num_rows > 0) {
        echo json_encode(array("success" => false, "message" => "Email already registered"));
        $check_stmt->close();
        $conn->close();
        exit();
    }
    $check_stmt->close();
    
    // Get IP address
    $ip_address = $_SERVER['REMOTE_ADDR'];
    
    // Get user agent
    $user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    
    // Insert new email
    $stmt = $conn->prepare("INSERT INTO email_registrations (email, registration_date, ip_address, user_agent) VALUES (?, NOW(), ?, ?)");
    $stmt->bind_param("sss", $email, $ip_address, $user_agent);
    
    if($stmt->execute()) {
        // Get current count
        $count_result = $conn->query("SELECT COUNT(*) as total FROM email_registrations");
        $count_row = $count_result->fetch_assoc();
        $actual_count = $count_row['total'];
        
        echo json_encode(array(
            "success" => true, 
            "message" => "Registration successful",
            "count" => $actual_count
        ));
    } else {
        echo json_encode(array("success" => false, "message" => "Error: " . $stmt->error));
    }
    
    $stmt->close();
    
} catch (Exception $e) {
    echo json_encode(array("success" => false, "message" => "Error: " . $e->getMessage()));
} finally {
    $conn->close();
}
?>