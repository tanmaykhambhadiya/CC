<?php
header('Content-Type: application/json');

// DB Config
$host = "193.203.184.230";
$user = "u991936209_first";
$pass = "Concertcircle1705";
$db = "u991936209_Concert_Circle";
$amount = 899;

// Connect to DB
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'DB connection failed']);
    exit;
}

// Read JSON
$input = json_decode(file_get_contents("php://input"), true);
if (!isset($input['fullName'], $input['email'], $input['phone'])) {
    echo json_encode(['success' => false, 'message' => 'Missing input fields']);
    exit;
}

$fullName = $conn->real_escape_string($input['fullName']);
$email = $conn->real_escape_string($input['email']);
$phone = $conn->real_escape_string($input['phone']);
$ticketId = 'CR' . time() . rand(100, 999);

// Insert
$stmt = $conn->prepare("INSERT INTO event_tickets (full_name, email, phone, ticket_id, amount_paid, payment_status, event) VALUES (?, ?, ?, ?, ?, 'Success', 'Cafe Raves')");
$stmt->bind_param("ssssd", $fullName, $email, $phone, $ticketId, $amount);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'ticket_id' => $ticketId]);
} else {
    echo json_encode(['success' => false, 'message' => 'DB error']);
}

$stmt->close();
$conn->close();
