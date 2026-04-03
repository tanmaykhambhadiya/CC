<?php
require_once('header.php');

if (!isset($_REQUEST['id'])) {
    header('location: communities.php');
    exit;
} else {
    // Check if the ID is valid
    $statement = $pdo->prepare("SELECT * FROM communities WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $total = $statement->rowCount();
    if ($total == 0) {
        header('location: communities.php');
        exit;
    }
}

// Get the banner image URL to unlink from the folder
$statement = $pdo->prepare("SELECT banner_image_url FROM communities WHERE id=?");
$statement->execute([$_REQUEST['id']]);
$result = $statement->fetch(PDO::FETCH_ASSOC);
$banner_image_url = $result['banner_image_url'];

// Unlink the banner image if it exists
if (!empty($banner_image_url) && file_exists('../uploads/communities/' . $banner_image_url)) {
    unlink('../uploads/communities/' . $banner_image_url);
}

// Delete the record from the database
$statement = $pdo->prepare("DELETE FROM communities WHERE id=?");
$statement->execute([$_REQUEST['id']]);

header('location: communities.php');
exit;
?>