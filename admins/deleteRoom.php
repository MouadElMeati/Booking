<?php
session_start();
require('incl/cnx.php');

if (isset($_GET['id'])) {
    $room_id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM rooms WHERE id = :id");
        $stmt->execute(['id' => $room_id]);
        header('Location: rooms.php');
        exit;
    } catch (PDOException $e) {
        echo "Error deleting room: " . $e->getMessage();
    }
} else {
    header('Location: rooms.php');
    exit;
}
?>