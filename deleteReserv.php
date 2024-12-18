<?php
session_start();
require('./admins/incl/cnx.php');

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: reservation.php");
    exit();
}

// Get the reservation ID from the URL
$reservation_id = $_GET['id'];

// Delete the reservation
$stmt = $pdo->prepare("DELETE FROM reservations WHERE id = ? AND user_id = ?");
if ($stmt->execute([$reservation_id, $_SESSION['user_id']])) {
    header("Location: reservation.php?deleted=1");
    exit();
} else {
    echo "Error deleting reservation.";
}
?>