<?php
header("Content-Type: application/json; charset=UTF-8");

// Database connection details - same as register_email.php
$servername = "193.203.184.230";
$username = "u991936209_first";
$password = "Concertcircle1705";
$dbname = "u991936209_Concert_Circle";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if($conn->connect_error) {
    echo json_encode(array("success" => false, "message" => "Database connection failed"));
    exit();
}

// Get count
$result = $conn->query("SELECT COUNT(*) as total FROM email_registrations");
$row = $result->fetch_assoc();
$count = $row['total'];

echo json_encode(array(
    "success" => true,
    "count" => $count
));

$conn->close();
?>