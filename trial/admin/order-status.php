<?php
session_start();
require_once('../inc/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the current status of the order
    $statement = $pdo->prepare("SELECT status FROM tbl_cart WHERE id = ?");
    $statement->execute([$id]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    $currentStatus = $result['status'];

    // Toggle the status
    $newStatus = ($currentStatus == 'Pending') ? 'Completed' : 'Pending';

    // Update the status in the database
    $statement = $pdo->prepare("UPDATE tbl_cart SET status = ? WHERE id = ?");
    $statement->execute([$newStatus, $id]);

    header('Location: vieworders.php');
    exit;
}
?>