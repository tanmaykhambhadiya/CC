<?php
session_start();
require_once('../inc/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete the order from the database
    $statement = $pdo->prepare("DELETE FROM tbl_cart WHERE id = ?");
    $statement->execute([$id]);

    header('Location: vieworders.php');
    exit;
}
?>