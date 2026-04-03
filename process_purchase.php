<?php
header('Content-Type: application/json');

// Database connection details - replace with your Hostinger credentials
$servername = getenv('DB_HOST') ?: 'db';
$username = getenv('DB_USER') ?: 'concertcircle';
$password = getenv('DB_PASSWORD') ?: 'change_me';
$dbname = getenv('DB_NAME') ?: 'concertcircle';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ticketType = $conn->real_escape_string($_POST['ticketType']);
    $fullName = $conn->real_escape_string($_POST['fullName']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $concertPlace = $conn->real_escape_string($_POST['concertPlace']);
    $quantity = $conn->real_escape_string($_POST['quantity']);

    $sql = "INSERT INTO ticket_purchases (ticket_type, full_name, email, phone, concert_place, quantity, purchase_date) 
            VALUES ('$ticketType', '$fullName', '$email', '$phone', '$concertPlace', '$quantity', NOW())";

    if ($conn->query($sql) === TRUE) {
    // Email to User
    $toUser = $email;
    $subjectUser = "Your Pass to Travis Scott is Locked In";
    $messageUser = "Hi $fullName,\n\nWe got your inquiry — your pass to Travis Scott’s Circus Maximus Tour is here! 🙌\n\nOur crew will reach out to you within the next 24 hours to share your ticket details.\n\nNo shady deals. No ditching. Just 100% real tickets for the Utopia experience.\n\nStay tuned — the stage is set, and you’re on the list.\n\nBest,\nTeam Concert Circle";
    $headersUser = "From: admin@concertcircle.com";
    mail($toUser, $subjectUser, $messageUser, $headersUser);


        // Email to Admin
        $toAdmin = "purchases@concertcircle.com";
        $subjectAdmin = "New Ticket Enquiry";
        $messageAdmin = "New enquiry:\nName: $fullName\nEmail: $email\nPhone: $phone\nTicket: $ticketType\nLocation: $concertPlace\nQuantity: $quantity\nDate: " . date('h:i A T, F d, Y');
        $headersAdmin = "From: no-reply@concertcircle.com";
        mail($toAdmin, $subjectAdmin, $messageAdmin, $headersAdmin);

        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error saving enquiry']);
    }
}

$conn->close();
?>