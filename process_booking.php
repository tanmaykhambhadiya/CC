<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Enable CORS
header('Access-Control-Allow-Origin: https://concertcircle.com'); // Adjust for your domain
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Database configuration
$servername = getenv('DB_HOST') ?: 'db';
$username = getenv('DB_USER') ?: 'concertcircle';
$password = getenv('DB_PASSWORD') ?: 'change_me';
$dbname = getenv('DB_NAME') ?: 'concertcircle';

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]);
    exit;
}

// Sanitize and validate input
function sanitize($data) {
    return htmlspecialchars(strip_tags(trim($data)));
}

$response = ['success' => false, 'message' => ''];

try {
    // Collect form data
    $firstName = sanitize($_POST['firstName'] ?? '');
    $lastName = sanitize($_POST['lastName'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $phone = sanitize($_POST['phone'] ?? '');
    $sourceDestination = sanitize($_POST['sourceDestination'] ?? '');
    $groupSize = sanitize($_POST['groupSize'] ?? '');
    $stayDuration = sanitize($_POST['stayDuration'] ?? '');
    $tripType = sanitize($_POST['tripType'] ?? '');
    $packageType = sanitize($_POST['packageType'] ?? '');
    $travelType = sanitize($_POST['travelType'] ?? '');
    $cityPlaces = isset($_POST['cityPlaces']) ? implode(', ', array_map('sanitize', $_POST['cityPlaces'])) : '';
    $additionalRequirements = sanitize($_POST['additionalRequirements'] ?? '');
    $discountCode = sanitize($_POST['discountCode'] ?? '');
    $bookingDate = date('Y-m-d H:i:s');

    // Validate required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || 
        empty($sourceDestination) || empty($groupSize) || empty($stayDuration) || 
        empty($tripType) || empty($packageType)) {
        throw new Exception('All required fields must be filled');
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email format');
    }

    // Validate group size
    if (!is_numeric($groupSize) || $groupSize < 1) {
        throw new Exception('Invalid group size');
    }

    // Validate package-specific group size
    $valid_packages = ['fly-to-the-rage', 'utopia-circle', 'astro-deluxe-drop'];
    if (!in_array($packageType, $valid_packages)) {
        throw new Exception('Invalid package selected');
    }
    if ($packageType === 'fly-to-the-rage' && $groupSize > 1) {
        throw new Exception('Fly to the RAGE package is for solo travelers only');
    }
    if ($packageType === 'utopia-circle' && $groupSize < 3) {
        throw new Exception('UTOPIA Circle package requires a group of 3 or more');
    }

    // Validate stay duration
    if (!is_numeric($stayDuration) || $stayDuration < 1) {
        throw new Exception('Stay duration must be at least 1 night');
    }

    // Prepare SQL statement
    $sql = "INSERT INTO bookings (
        first_name, last_name, email, phone, source_destination, group_size, stay_duration,
        trip_type, package_type, travel_type, city_places,
        additional_requirements, discount_code, booking_date
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        throw new Exception('Failed to prepare SQL statement: ' . $conn->error);
    }

    $stmt->bind_param(
        "sssssissssssss",
        $firstName, $lastName, $email, $phone, $sourceDestination, $groupSize, $stayDuration,
        $tripType, $packageType, $travelType, $cityPlaces,
        $additionalRequirements, $discountCode, $bookingDate
    );

    // Execute statement
    if (!$stmt->execute()) {
        throw new Exception('Failed to save booking: ' . $stmt->error);
    }

    // Email configuration
    $adminEmail = "bookings@concertcircle.com"; // Replace with your admin email
    $fromEmail = "no-reply@concertcircle.com"; // Replace with your domain email
    $headers = "From: $fromEmail\r\n";
    $headers .= "Reply-To: $fromEmail\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // Prepare package details
    $packageName = '';
    $packagePrice = '';
    $inclusions = '';
    switch ($packageType) {
        case 'fly-to-the-rage':
            $packageName = 'Ride to the RAGE';
            $packagePrice = '₹7,499 per head';
            $inclusions = '<li>3-Star Hotel & Homestays</li>
                           <li>Airport Pick-up & Drop</li>
                           <li>Complimentary Breakfast</li>
                           <li>Experience Manager Assistance</li>';
            break;
        case 'utopia-circle':
            $packageName = 'UTOPIA Circle';
            $packagePrice = '₹9,999 per head';
            $inclusions = '<li>4-Star Hotel & Villa Stays</li>
                           <li>Airport Pick-up & Drop</li>
                           <li>Cab Transfers Throughout the Trip</li>
                           <li>Complimentary Breakfast</li>
                           <li>Private Concierge Support via WhatsApp</li>
                           <li>Early Access to Merch Drops with Discounts</li>';
            break;
        case 'astro-deluxe-drop':
            $packageName = 'Astro Deluxe Drop';
            $packagePrice = '₹19,999 per head';
            $inclusions = '<li>4.5–5 Star Luxury Hotel or Villa Stay</li>
                           <li>Private Airport Pick-up & Drop-off</li>
                           <li>Curated Local Experience</li>
                           <li>Exclusive Pre-launch Travis Scott Merch Drops</li>
                           <li>Complimentary Breakfast</li>
                           <li>All Cab Transfers</li>
                           <li>Dedicated Personal Concierge</li>
                           <li>Early Check-in + Late Checkout (subject to availability)</li>';
            break;
    }

    // Prepare email content for user
    $userSubject = "We’ve Got Your Request — Your Travis Scott Experience Awaits 🚀";
    $userMessage = "
    <html>
    <head>
        <style>
            body { font-family: 'Arial', sans-serif; color: #333; line-height: 1.6; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(45deg, #9b59b6, #e91e63); color: #fff; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
            .content { background: #f9f9f9; padding: 20px; border-radius: 0 0 8px 8px; }
            .footer { text-align: center; margin-top: 20px; color: #777; font-size: 0.9em; }
            ul { list-style-type: none; padding: 0; }
            li { margin: 10px 0; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>Concert Circle Call-Booking Confirmation</h2>
            </div>
            <div class='content'>
                <p>Yo $firstName,</p>
                <p>We’ve received your request and your vibe check is locked in. 🔒✨ Our team is already gearing up to take your Travis Scott concert experience to the next level.</p>
                <p>Within the next 24 hours, one of our curators will reach out personally to design an itinerary and package that matches your style — from travel and stays to every last detail that makes the night unforgettable.</p>
                <h3>Booking Details</h3>
                <p><strong>Selected Package:</strong> $packageName ($packagePrice)</p>
                <p><strong>Inclusions:</strong></p>
                <ul>$inclusions</ul>
                <p><strong>Name:</strong> $firstName $lastName</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Source Destination:</strong> $sourceDestination</p>
                <p><strong>Group Size:</strong> $groupSize</p>
                <p><strong>Stay Duration:</strong> $stayDuration nights</p>
                <p><strong>Trip Type:</strong> $tripType</p>
                <p><strong>Travel Type:</strong> $travelType</p>
                <p><strong>City Places:</strong> $cityPlaces</p>
                <p><strong>Special Requests:</strong> $additionalRequirements</p>
                <p><strong>Discount Code:</strong> $discountCode</p>
                <p>If you’ve got any questions before then, feel free to hit us up at <a href='tel:+91-8401089266'>+91-8401089266</a>.</p>
                <p>Get ready, your ultimate concert journey starts here. 🎶🔥</p>
                <p>— Team Concert Circle</p>
            </div>
            <div class='footer'>
                <p>&copy; 2025 Concert Circle. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>";

    // Send user email
    if (!mail($email, $userSubject, $userMessage, $headers)) {
        error_log('Failed to send user email to: ' . $email);
        throw new Exception('Failed to send confirmation email to user');
    }

    // Prepare email content for admin
    $adminSubject = "New Travis Scott Concert Booking - $packageName";
    $adminMessage = "
    <html>
    <head>
        <style>
            body { font-family: 'Arial', sans-serif; color: #333; line-height: 1.6; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(45deg, #9b59b6, #e91e63); color: #fff; padding: 20px; text-align: center; border-radius: 8px 8px 0 0; }
            .content { background: #f9f9f9; padding: 20px; border-radius: 0 0 8px 8px; }
            ul { list-style-type: none; padding: 0; }
            li { margin: 10px 0; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h2>New Booking Notification</h2>
            </div>
            <div class='content'>
                <p>New booking received for the Travis Scott Concert in Delhi:</p>
                <h3>Booking Details</h3>
                <p><strong>Selected Package:</strong> $packageName ($packagePrice)</p>
                <p><strong>Inclusions:</strong></p>
                <ul>$inclusions</ul>
                <p><strong>Name:</strong> $firstName $lastName</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Source Destination:</strong> $sourceDestination</p>
                <p><strong>Group Size:</strong> $groupSize</p>
                <p><strong>Stay Duration:</strong> $stayDuration nights</p>
                <p><strong>Trip Type:</strong> $tripType</p>
                <p><strong>Travel Type:</strong> $travelType</p>
                <p><strong>City Places:</strong> $cityPlaces</p>
                <p><strong>Special Requests:</strong> $additionalRequirements</p>
                <p><strong>Discount Code:</strong> $discountCode</p>
                <p><strong>Booking Date:</strong> $bookingDate</p>
            </div>
        </div>
    </body>
    </html>";

    // Send admin email
    if (!mail($adminEmail, $adminSubject, $adminMessage, $headers)) {
        error_log('Failed to send admin email to: ' . $adminEmail);
        throw new Exception('Failed to send notification email to admin');
    }

    $response['success'] = true;
    $response['message'] = 'Booking submitted successfully';

} catch (Exception $e) {
    error_log('Booking error: ' . $e->getMessage());
    $response['message'] = $e->getMessage();
}

$conn->close();
echo json_encode($response);
?>