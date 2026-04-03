<?php
require_once('header.php');

if(!isset($_REQUEST['id'])) {
    header('location: logout.php');
    exit;
} else {
    $statement = $pdo->prepare("SELECT * FROM tbl_featured_products WHERE id=?");
    $statement->execute(array($_REQUEST['id']));
    $total = $statement->rowCount();
    if($total == 0) {
        header('location: logout.php');
        exit;
    }
}

$statement = $pdo->prepare("SELECT * FROM tbl_featured_products WHERE id=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $image1 = $row['image1'];
    $image2 = $row['image2'];
    unlink('../assets/uploads/products/'.$image1);
    if($image2 != '') {
        unlink('../assets/uploads/products/'.$image2);
    }
}

$statement = $pdo->prepare("DELETE FROM tbl_featured_products WHERE id=?");
$statement->execute(array($_REQUEST['id']));

header('location: featured-products.php');
?>