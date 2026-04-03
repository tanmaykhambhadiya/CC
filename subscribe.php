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
    photo_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $target_dir = "uploads/";
    
    // Create uploads directory if it doesn't exist
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $target_file = $target_dir . basename($_FILES["ticket_photo"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
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
        $stmt = $conn->prepare("INSERT INTO submissions (name, email, photo_path) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $target_file);
        
        if ($stmt->execute()) {
            // Send email with attachment
            $to = "leads@concertcircle.com";
            $subject = "Ticket Submission from $name";
            $message = "A new ticket submission has been received.\n\nName: $name\nEmail: $email\n\nPlease find the ticket image attached.";
            $headers = "From: no-reply@concertcircle.com\r\n";
            $headers .= "Reply-To: $email16";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

            // Read the file content
            $file = $_FILES["ticket_photo"]["tmp_name"];
            $file_content = chunk_split(base64_encode(file_get_contents($target_file)));

            // Add attachment to headers
            $headers .= "--boundary\r\n";
            $headers .= "Content-Type: image/$imageFileType; name=\"" . basename($target_file) . "\"\r\n";
            $headers .= "Content-Transfer-Encoding: base64\r\n";
            $headers .= "Content-Disposition: attachment; filename=\"" . basename($target_file) . "\"\r\n\r\n";
            $headers .= $file_content . "\r\n";
            $headers .= "--boundary--";

            // Send the email
            if (mail($to, $subject, $message, $headers)) {
                header("Location: index.php?status=success");
                exit();
            } else {
                echo "Error sending email.";
            }

            $stmt->close();
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Error uploading file.";
    }
}

$conn->close();
?>