<?php
// Database connection
$servername = getenv('DB_HOST') ?: 'db';
$username = getenv('DB_USER') ?: 'concertcircle';
$password = getenv('DB_PASSWORD') ?: 'change_me';
$dbname = getenv('DB_NAME') ?: 'concertcircle';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS submissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    photo_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $target_dir = "uploads/";
    
    // Create uploads directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["ticket_photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Validate inputs
    if (empty($name) || empty($email) || empty($phone)) {
        die("Name, email, and phone are required.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    // Validate phone (basic check for digits and length)
    if (!preg_match("/^[0-9]{10,15}$/", $phone)) {
        die("Invalid phone number format.");
    }

    // Validate image
    $check = getimagesize($_FILES["ticket_photo"]["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }

    // Check file size (5MB limit)
    if ($_FILES["ticket_photo"]["size"] > 5000000) {
        die("File is too large.");
    }

    // Allow only certain file formats
    if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
        die("Only JPG, JPEG, PNG & GIF files are allowed.");
    }

    // Move uploaded file
    if (move_uploaded_file($_FILES["ticket_photo"]["tmp_name"], $target_file)) {
        // Insert data into database
        $stmt = $conn->prepare("INSERT INTO submissions (name, email, phone, photo_path) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $target_file);
        
        if ($stmt->execute()) {
            // Send email with attachment
            $to = $email;
            $subject = "Your Chance to Get a FREE Travis Scott Ticket is Locked🚀";
            $firstName = explode(" ", $name)[0];
            $message = "--boundary\r\n";
            $message .= "Content-Type: text/plain; charset=UTF-8\r\n";
            $message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
            $message .= "Hey $firstName,\n\n";
            $message .= "Your Travis Scott ticket submission is locked in ✅\n\n";
            $message .= "You’re officially in the running to be 1 of 5 lucky fans who’ll get their ticket fully refunded.\n\n";
            $message .= "We’re as hyped as you are for this Delhi show is going to be unreal.\n\n";
            $message .= "📅 Winners will be announced on 25-09-2025 — keep an eye on your inbox.\n\n";
            $message .= "Meanwhile… don’t just stop at the ticket.\n";
            $message .= "We’ve curated exclusive Travis Scott experience packages - from travel & stay to on-ground vibes — so your night is 100% stress-free.\n\n";
            $message .= "👉 [Check out the packages here](https://concertcircle.com/packages.php)\n\n";
            $message .= "Good luck — your ticket might just end up FREE.\n\n";
            $message .= "– Team Concert Circle\r\n";
            $message .= "--boundary\r\n";
            $file_content = chunk_split(base64_encode(file_get_contents($target_file)));
            $message .= "Content-Type: image/$imageFileType; name=\"" . basename($target_file) . "\"\r\n";
            $message .= "Content-Transfer-Encoding: base64\r\n";
            $message .= "Content-Disposition: attachment; filename=\"" . basename($target_file) . "\"\r\n\r\n";
            $message .= $file_content . "\r\n";
            $message .= "--boundary--";

            $headers = "From: no-reply@concertcircle.com\r\n";
            $headers .= "Reply-To: contest@concertcircle.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

            // Send the email
            if (mail($to, $subject, $message, $headers)) {
                echo "<script>localStorage.setItem('ticketPopupSubmitted', 'true'); alert('Success! Your submission is in. Check your email for details.'); window.location.href = 'index.php?status=success';</script>";
                exit();
            } else {
                echo "Error sending email.";
            }
            $stmt->close();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error uploading file.";
    }
}

$conn->close();
?>