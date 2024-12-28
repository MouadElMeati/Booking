<?php
session_start();
require('incl/cnx.php');

if (isset($_GET['id'])) {
    $hotel_id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM hotels WHERE id = :id");
        $stmt->execute(['id' => $hotel_id]);
        header('Location: hotels.php');
        exit;
    } catch (PDOException $e) {
        echo "Error deleting this hotel: " . $e->getMessage();
    }
} else {
    header('Location: hotels.php');
    exit;
}
?>