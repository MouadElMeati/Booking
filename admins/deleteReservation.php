<?php
session_start();
require('incl/cnx.php');

if (isset($_GET['id'])) {
    $reservation_id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM reservations WHERE id = :id");
        $stmt->execute(['id' => $reservation_id]);
        header('Location: ctrl_reservation.php');
        exit;
    } catch (PDOException $e) {
        echo "Error deleting this hotel: " . $e->getMessage();
    }
} else {
    header('Location: ctrl_reservation.php');
    exit;
}
?>