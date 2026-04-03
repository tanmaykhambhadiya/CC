<?php
// Set headers to allow AJAX requests
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); // Consider restricting this to your domain in production
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Connect to database
$db_config = include 'db_config.php'; // Include your database configuration

try {
    $pdo = new PDO(
        "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset=utf8mb4",
        $db_config['username'],
        $db_config['password'],
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
    
    // Begin transaction for data integrity
    $pdo->beginTransaction();
    
    // Get the current count
    $stmt = $pdo->query("SELECT value FROM counters WHERE name = 'registrations'");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($row) {
        // Update existing counter
        $stmt = $pdo->prepare("UPDATE counters SET value = value + 1 WHERE name = 'registrations'");
        $stmt->execute();
    } else {
        // Create counter if it doesn't exist
        $stmt = $pdo->prepare("INSERT INTO counters (name, value) VALUES ('registrations', 1)");
        $stmt->execute();
    }
    
    // Commit the transaction
    $pdo->commit();
    
    // Return success response
    echo json_encode(['success' => true]);
    
} catch (PDOException $e) {
    // Roll back the transaction if something failed
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    
    // Log the error (to a file, not to the response)
    error_log("Database error: " . $e->getMessage());
    
    // Return error response (don't expose detailed error in production)
    echo json_encode(['success' => false, 'message' => 'Database error occurred']);
}
?>