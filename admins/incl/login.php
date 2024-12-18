<?php
session_start();
require('incl/cnx.php'); // Include the database connection

if (isset($_POST['login'])) {
    $username = $_POST['admin-name'];
    $password = $_POST['admin-password'];

    // Prepare and execute the query
    $stmt = $pdo->prepare("SELECT * FROM admin_crud WHERE `admin-name` = :admin_name");
    $stmt->execute(['admin_name' => $username]); // Use the correct parameter name
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verify password
    if ($admin && password_verify($password, $admin['admin-password'])) {
        $_SESSION['admin-id'] = $admin['id'];
        $_SESSION['admin-name'] = $admin['admin-name'];
        header("Location:FFFF.php"); // Redirect to the dashboard
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>