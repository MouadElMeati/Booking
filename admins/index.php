<?php
session_start();
require('incl/cnx.php'); 



if (isset($_POST['login'])) {
    $username = $_POST['admin-name'];
    $password = $_POST['admin-password'];

    $stmt = $pdo->prepare("SELECT * FROM `admin_crud` WHERE `admin-name` = ? AND `admin-password` = ?");
    $stmt->execute([$username, $password]); 
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && $password === $admin['admin-password']) {
        $_SESSION['admin-name'] = $admin['admin-name'];
        $_SESSION['admin-password'] = $admin['admin-password'];
        header("Location:dashbord.php");
        exit();
    } else {
        $error = "Invalid username or password.";
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login </title>
    <?php require('incl/links.php') ?>
</head>
<body class="bg-light">
    <div class="login-form text-center rounded bg-white">
        <form method="POST">
            <h4 class="bg-primary text-white py-3 rounded shadow overflow-hidden">ADMIN LOGIN PANEL</h4>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            <div class="mb-3">
                <div>
                    <label class="form-label"></label>
                    <input name="admin-name" type="text" class="form-control shadow-none text-center" required placeholder="Admin Name">
                </div>
                <div class="mb-4">
                    <label class="form-label"></label>
                    <input name="admin-password" type="password" class="form-control shadow-none text-center" required placeholder="Password">
                </div>
                <button name="login" type="submit" class="btn btn-success text-white custom-bg shadow-none">Login</button>
            </div>
        </form>
    </div>
</body>
</html>
