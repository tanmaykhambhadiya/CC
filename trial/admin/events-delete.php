<?php
require_once('header.php');

if (!isset($_REQUEST['id'])) {
    header('location: events.php');
    exit;
} else {
    // Check if the ID is valid
    $statement = $pdo->prepare("SELECT * FROM events WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $total = $statement->rowCount();
    if ($total == 0) {
        header('location: events.php');
        exit;
    }
}

// Get the image URL to unlink from the folder
$statement = $pdo->prepare("SELECT image_url FROM events WHERE id=?");
$statement->execute([$_REQUEST['id']]);
$result = $statement->fetch(PDO::FETCH_ASSOC);
$image_url = $result['image_url'];

// Unlink the image if it exists
if (!empty($image_url) && file_exists('../uploads/events/' . $image_url)) {
    unlink('../uploads/events/' . $image_url);
}

// Delete the record from the database
$statement = $pdo->prepare("DELETE FROM events WHERE id=?");
$statement->execute([$_REQUEST['id']]);

header('location: events.php');
exit;
?>