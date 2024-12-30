<?php
session_start();
require('incl/cnx.php');

if (isset($_GET['id'])) {
    $reservation_id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM contact_messages WHERE id = :id");
        $stmt->execute(['id' => $reservation_id]);
        header('Location: rapport.php');
        exit;
    } catch (PDOException $e) {
        echo "Error deleting this rapport: " . $e->getMessage();
    }
} else {
    header('Location: rapport.php');
    exit;
}
?>