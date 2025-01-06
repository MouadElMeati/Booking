<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require('admins/incl/cnx.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['tel'];
    $password = $_POST['password'];
    $confirm_password = $_POST['Cpassword'];
    $address = $_POST['adress'];
    $pin_code = $_POST['pincode'];
    $birthday = $_POST['birthday'];

    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

       
        $stmt = $pdo->prepare("INSERT INTO users (name, email, phone, password, address, pincode, birthday) VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        
        if ($stmt->execute([$name, $email, $phone_number, $hashed_password, $address, $pin_code, $birthday])) {
          
            header("Location: index.php"); 
            exit();
        } else {
            $error = "Error: " . $stmt->errorInfo()[2]; 
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_email'] = $user['email'];

        header("Location: user.php");
        exit();
    } else {
        $login_error = "Invalid email or password";
    }
}
?>