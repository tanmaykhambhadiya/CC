<?php
require_once('header.php');

if (!isset($_REQUEST['id'])) {
    header('location: blogs.php');
    exit;
} else {
    // Check if the ID is valid
    $statement = $pdo->prepare("SELECT * FROM blogs WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $total = $statement->rowCount();
    if ($total == 0) {
        header('location: blogs.php');
        exit;
    }
}

// Get the image to unlink from the folder
$statement = $pdo->prepare("SELECT image FROM blogs WHERE id=?");
$statement->execute([$_REQUEST['id']]);
$result = $statement->fetch(PDO::FETCH_ASSOC);
$image = $result['image'];

// Unlink the image if it exists
if (!empty($image) && file_exists('../uploads/blogs/' . $image)) {
    unlink('../uploads/blogs/' . $image);
}

// Delete the record from the database
$statement = $pdo->prepare("DELETE FROM blogs WHERE id=?");
$statement->execute([$_REQUEST['id']]);

header('location: blogs.php');
exit;
?>