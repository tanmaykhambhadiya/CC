<?php
require_once 'inc/config.php';

header('Content-Type: application/json');

// Connect to database
$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

// If connection fails
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

// Fetch concert titles
$sql = "SELECT title FROM events ORDER BY date DESC";
$result = $conn->query($sql);

$events = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $events[] = $row['title'];
    }
}

// Add fallback "Other" option
if (!in_array("Other (Not Listed)", $events)) {
    $events[] = "Other (Not Listed)";
}

$conn->close();

echo json_encode($events);
?>
