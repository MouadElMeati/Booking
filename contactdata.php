<?php
require('./admins/incl/cnx.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Prepare and execute the statement
    $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    
    // Execute the statement
    if ($stmt->execute([$name, $email, $message])) {
        // Redirect with a success message
        header("Location: contact.php?success=1");
        exit();
    } else {
        echo "Error: " . $stmt->errorInfo()[2]; // Display error message
    }
}
?>