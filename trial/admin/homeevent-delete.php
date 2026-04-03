<?php require_once('header.php'); ?>

<?php
        if (!isset($_REQUEST['id'])) {
    header('location: homeevent.php');
    exit;
} else {
    // Check if the ID is valid
    $statement = $pdo->prepare("SELECT * FROM homeevent WHERE id=?");
    $statement->execute([$_REQUEST['id']]);
    $total = $statement->rowCount();
    if ($total == 0) {
        header('location: homeevent.php');
        exit;
    }
}

// Get the image URL to unlink from the folder
$statement = $pdo->prepare("SELECT image_url FROM homeevent WHERE id=?");
$statement->execute([$_REQUEST['id']]);
$result = $statement->fetch(PDO::FETCH_ASSOC);
$image_url = $result['image_url'];

// Unlink the image if it exists
if (!empty($image_url) && file_exists('../uploads/homeevent/' . $image_url)) {
    unlink('../uploads/homeevent/' . $image_url);
}

// Delete the record from the database
$statement = $pdo->prepare("DELETE FROM homeevent WHERE id=?");
$statement->execute([$_REQUEST['id']]);

header('location: homeevent.php');
exit;
?>