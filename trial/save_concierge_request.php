<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Database configuration
$servername = "193.203.184.230";
$username = "u991936209_first";
$password = "Concertcircle1705";
$dbname = "u991936209_Concert_Circle";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Database connection failed: ' . $conn->connect_error
    ]);
    exit();
}

// Get JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    http_response_code(400);
    echo json_encode([
        'success' => false, 
        'message' => 'Invalid JSON data'
    ]);
    exit();
}

// Required fields
$required_fields = ['fullName', 'email', 'mobile', 'city', 'concert', 'attendees', 'consent'];
foreach ($required_fields as $field) {
    if (empty($data[$field])) {
        http_response_code(400);
        echo json_encode([
            'success' => false, 
            'message' => "Missing required field: $field"
        ]);
        exit();
    }
}

// Helper: Safe field access
function get($data, $key) {
    return isset($data[$key]) ? $data[$key] : null;
}

// Prepare SQL
$sql = "INSERT INTO concierge_requests (
    full_name, email, mobile, city, concert, concert_date, 
    custom_concert_name, custom_concert_date, custom_concert_venue, 
    attendees, attending_with, services, accommodation_pref, travel_pref, 
    notes, consent, submitted_at, created_at
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Prepare failed: ' . $conn->error
    ]);
    exit();
}

$services_json = json_encode(get($data, 'services') ?: []);
$consent = !empty($data['consent']) ? 1 : 0;

$stmt->bind_param(
    "sssssssssisssssis",
    $data['fullName'],
    $data['email'],
    $data['mobile'],
    $data['city'],
    $data['concert'],
    get($data, 'concertDate'),
    get($data, 'customConcertName'),
    get($data, 'customConcertDate'),
    get($data, 'customConcertVenue'),
    $data['attendees'],
    get($data, 'attendingWith'),
    $services_json,
    get($data, 'accommodationPref'),
    get($data, 'travelPref'),
    get($data, 'notes'),
    $consent,
    get($data, 'submittedAt')
);

// Execute and send email
if ($stmt->execute()) {
    $request_id = $conn->insert_id;
    sendNotificationEmail($data, $request_id);
    echo json_encode([
        'success' => true, 
        'message' => 'Request submitted successfully',
        'request_id' => $request_id
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        'success' => false, 
        'message' => 'Execute failed: ' . $stmt->error
    ]);
}
$stmt->close();
$conn->close();

// ------------------- EMAIL FUNCTION -------------------

function sendNotificationEmail($data, $request_id) {
    // Send to multiple team members
    $to = "atripatel@concertcircle.com, panthmaheshwari@concertcircle.com";
    $subject = "New Concert Concierge Request - #" . $request_id;

    $message = "New concert concierge request received:\n\n";
    $message .= "Request ID: " . $request_id . "\n";
    $message .= "Name: " . $data['fullName'] . "\n";
    $message .= "Email: " . $data['email'] . "\n";
    $message .= "Mobile: " . $data['mobile'] . "\n";
    $message .= "City: " . $data['city'] . "\n";
    $message .= "Concert: " . $data['concert'] . "\n";

    if (!empty($data['customConcertName'])) {
        $message .= "Custom Concert: " . $data['customConcertName'] . "\n";
        $message .= "Custom Date: " . $data['customConcertDate'] . "\n";
        $message .= "Custom Venue: " . $data['customConcertVenue'] . "\n";
    }

    $message .= "Attendees: " . $data['attendees'] . "\n";
    $message .= "Services: " . implode(', ', $data['services'] ?? []) . "\n";
    $message .= "Notes: " . ($data['notes'] ?? 'None') . "\n";
    $message .= "Submitted: " . $data['submittedAt'] . "\n";

    $user_headers = "From: noreply@concertcircle.com\r\n";
    $user_headers .= "MIME-Version: 1.0\r\n";
    $user_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    $headers .= "User-Email" . $data['email'] . "\r\n";

    // Send email to team
    mail($to, $subject, $message, $headers);

    // Send confirmation email to user
$user_subject = "🎉 We've Got Your Request – Your Concert Itinerary Is on the Way!";
$user_message = "Hi " . $data['fullName'] . ",\n\n";
$user_message .= "Thanks for filling out the Concert Circle concierge form! 🎟️\n\n";
$user_message .= "We've received your request and our team is already on it.\n\n";
$user_message .= "Hang tight — within the next 24 hours, you'll receive a personalized itinerary crafted to make your concert experience smooth, fun, and totally unforgettable. ✨\n\n";
$user_message .= "In the meantime, if you have any questions or want to share more details, feel free to reach out:\n";
$user_message .= "📧 info@concertcircle.com\n";
$user_message .= "📞 +91-8200297228\n\n";
$user_message .= "Can't wait to help you vibe better, travel smarter, and experience concerts the Concert Circle way. 🎶\n\n";
$user_message .= "Warm regards,\n";
$user_message .= "Team Concert Circle";

$user_headers = "From: concierge@concertcircle.com\r\n";
$user_headers .= "MIME-Version: 1.0\r\n";
$user_headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

mail($data['email'], $user_subject, $user_message, $user_headers);
}