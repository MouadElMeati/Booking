<?php
session_start();
require('incl/cnx.php'); 

if (isset($_POST['login'])) {
    $username = $_POST['admin-name'];
    $password = $_POST['admin-password'];

    $stmt = $pdo->prepare("SELECT * FROM admin_crud WHERE `admin-name` = :admin_name");
    $stmt->execute(['admin_name' => $username]); 
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($password, $admin['admin-password'])) {
        $_SESSION['admin-id'] = $admin['id'];
        $_SESSION['admin-name'] = $admin['admin-name'];
        header("Location:FFFF.php"); 
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>