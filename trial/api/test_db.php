<?php
header("Content-Type: text/plain");
$servername = "193.203.184.230";
$username = "u991936209_first";
$password = "Concertcircle1705";
$dbname = "u991936209_Concert_Circle";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
} else {
    echo "Connection successful!";
}
$conn->close();
?>