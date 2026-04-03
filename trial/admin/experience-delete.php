<?php require_once('header.php'); ?>

<?php
if (!isset($_REQUEST['id'])) {
    header('location: experience.php');
    exit;
} else {
    // Check if the ID is valid
    $statement = $pdo->prepare("SELECT * FROM experience_blocks WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $total = $statement->rowCount();
    if ($total == 0) {
        header('location: experience.php');
        exit;
    }
}

// Get the image URL to unlink from the folder
$statement = $pdo->prepare("SELECT image_url FROM experience_blocks WHERE id=?");
$statement->execute([$_REQUEST['id']]);
$result = $statement->fetch(PDO::FETCH_ASSOC);
$image_url = $result['image_url'];

// Unlink the image if it exists
if (!empty($image_url) && file_exists('../uploads/experience/' . $image_url)) {
    unlink('../uploads/experience/' . $image_url);
}

// Delete the record from the database
$statement = $pdo->prepare("DELETE FROM experience_blocks WHERE id=?");
$statement->execute([$_REQUEST['id']]);

header('location: experience.php');
exit;
?>