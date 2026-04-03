<?php
header('Content-Type: application/json');

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Log email errors to a file for debugging
ini_set('log_errors', 1);
ini_set('error_log', '/path/to/your/php_error.log'); // Update with actual path

$servername = getenv('DB_HOST') ?: 'db';
$username = getenv('DB_USER') ?: 'concertcircle';
$password = getenv('DB_PASSWORD') ?: 'change_me';
$dbname = getenv('DB_NAME') ?: 'concertcircle';
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

// Get form data
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$phone = $conn->real_escape_string($_POST['phone']);

// Generate discount code: CC-Travis- + first 2 letters of name + last 2 digits of phone
$name_prefix = substr(strtoupper($name), 0, 2); // First 2 letters of name
$phone_suffix = substr($phone, -2); // Last 2 digits of phone
$discount_code = "CC-Travis-" . $name_prefix . "-" . $phone_suffix;

// Generate unique request number
$request_number = "REQ-" . time() . "-" . rand(1000, 9999);

// Insert data into database
$sql = "INSERT INTO users (name, email, phone, discount_code) VALUES ('$name', '$email', '$phone', '$discount_code')";
if ($conn->query($sql) === TRUE) {
    // Email configuration for user
    $to_user = $email;
    $subject_user = "Your ₹3000 Drop is LIVE🔥- Concert Circle";
    $message_user = "Yoo!! $name\n\n"
                  . "Your circle’s about to rage right cause we just unlocked your Concert Experience Package group code.\n\n"
                  . "Your Code:\n\n"
                  . "🎟️ [$discount_code]\n\n"
                  . "Here's the drip:\n\n"
                  . "✅ Valid for groups of 3+\n"
                  . "✅ Flat ₹3000 OFF Travis Scott Experience Package\n"
                  . "✅ Curated by Concert Circle - we handle everything so you just vibe\n"
                  . "✅ Premium perks included\n\n"
                  . "⚡ 24-HOUR FLASH WINDOW - Code expires tomorrow!\n\n"
                  . "🔗 REDEEM NOW → https://concertcircle.com/fly-the-rage.php\n\n"
                  . "Let Concert Circle handle the whole experience! We've got everything sorted so you just focus on the vibes and make memories that'll live rent-free in your head forever!\n\n"
                  . "The clock's ticking mate ⏰\n\n"
                  . "Less stress. More vibe. All in a Circle. 🔥\n\n"
                  . "Peace,\nConcert Circle Team";
    $headers_user = "From: Concert Circle <no-reply@concertcircle.com>\r\n";
    $headers_user .= "Reply-To: no-reply@concertcircle.com\r\n";
    $headers_user .= "MIME-Version: 1.0\r\n";
    $headers_user .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers_user .= "X-Mailer: PHP/" . phpversion() . "\r\n";

    // Email configuration for admins
    $to_admins = "leads@concertcircle.com";
    $subject_admins = "New User Entry - Request #$request_number";
    $message_admins = "New user entry details:\n\n"
                    . "Name: $name\n"
                    . "Email: $email\n"
                    . "Phone: $phone\n"
                    . "Discount Code: $discount_code\n"
                    . "Request Number: $request_number\n";
    $headers_admins = "From: Concert Circle <no-reply@concertcircle.com>\r\n";
    $headers_admins .= "Reply-To: no-reply@concertcircle.com\r\n";
    $headers_admins .= "MIME-Version: 1.0\r\n";
    $headers_admins .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers_admins .= "X-Mailer: PHP/" . phpversion() . "\r\n";

    // Send email to user
    $email_to_user_success = mail($to_user, $subject_user, $message_user, $headers_user);
    if (!$email_to_user_success) {
        error_log("Failed to send email to user: $to_user");
    }

    // Send email to admins
    $email_to_admins_success = mail($to_admins, $subject_admins, $message_admins, $headers_admins);
    if (!$email_to_admins_success) {
        error_log("Failed to send email to admins: $to_admins");
    }

    if ($email_to_user_success && $email_to_admins_success) {
        echo json_encode(['success' => true, 'message' => 'Data saved and emails sent successfully', 'discount_code' => $discount_code, 'request_number' => $request_number]);
    } elseif ($email_to_user_success) {
        echo json_encode(['success' => true, 'message' => 'Data saved and user email sent, but admin email failed', 'discount_code' => $discount_code, 'request_number' => $request_number]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Data saved but emails failed to send']);
    }
} else {
    error_log("Database query failed: " . $conn->error);
    echo json_encode(['success' => false, 'message' => 'Error saving data: ' . $conn->error]);
}

$conn->close();
?>