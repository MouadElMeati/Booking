<?php
require('./admins/incl/cnx.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    
    if ($stmt->execute([$name, $email, $message])) {
        header("Location: contact.php?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2]; 
    }
}
?>