<?php
session_start();
require('./admins/incl/cnx.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: reservation.php");
    exit();
}

$reservation_id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM reservations WHERE id = ? AND user_id = ?");
if ($stmt->execute([$reservation_id, $_SESSION['user_id']])) {
    header("Location: reservation.php?deleted=1");
    exit();
} else {
    echo "Error deleting reservation.";
}
?>