<?php
// Database connection details - replace with your Hostinger credentials
$servername = "193.203.184.230";
$username = "u991936209_first";
$password = "Concertcircle1705";
$dbname = "u991936209_Concert_Circle"; // concert_circle or whatever you named it // Your database name

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    // Redirect with error status if connection fails
    header("Location: Contact.php?status=error");
    exit();
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Escape user inputs for security
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);
    $submission_date = date('Y-m-d H:i:s');
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: Contact.php?status=error");
        exit();
    }
    
    // Prepare SQL statement
    $sql = "INSERT INTO contact_messages (name, email, subject, message, submission_date) 
            VALUES ('$name', '$email', '$subject', '$message', '$submission_date')";
    
    // Execute query and check for success
    if ($conn->query($sql) === TRUE) {
        // Success - redirect back to contact page
        header("Location: Contact.php?status=success");
    } else {
        // Error - redirect with error status
        header("Location: Contact.php?status=error");
    }
    
    // Close connection
    $conn->close();
} else {
    // If not a POST request, redirect to contact page
    header("Location: Contact.php");
}
?>