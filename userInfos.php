<?php
session_start();
require('./admins/incl/cnx.php'); 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); 
    exit();
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$user) {
    echo "User  not found!";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $birthday = $_POST['birthday'];

    if (empty($name) || empty($email) || empty($phone) || empty($address) || empty($pincode) || empty($birthday)) {
        echo "All fields are required!";
        exit();
    }

    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, phone = ?, address = ?, pincode = ?, birthday = ? WHERE id = ?");
    $stmt->execute([$name, $email, $phone, $address, $pincode, $birthday, $user_id]);

    if ($stmt->rowCount() > 0) {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['success'] = "Information updated successfully!";
        header("Location: userInfos.php");
        exit();
    } else {
        echo "Failed to update user information.";
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard-User </title>
    <?php require('include/links.php') ?>
    <style>
       #dashboard-menu {
           position: fixed;
           height: 100%;
       }
       
       @media screen and (max-width:991px) {
           #dashboard-menu {
               height: auto;
               width: 100%;
           }
           #main-content {
               margin-top: 60px;
           }
       }
       .profile-picture {
           width: 150px;
           height: 150px;
           border-radius: 50%;
           object-fit: cover;
           margin: 0 auto;
           display: block;
       }
   </style>
</head>
<body class="bg-light">
       <?php require('include/navUser.php') ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success w-25 d-flex justify-content-center m-auto" role="alert">
        <?php echo $_SESSION['success']; ?>
    </div>
    <?php unset($_SESSION['success']); // Clear the success message after displaying ?>
<?php endif; ?>

<div class="container">
    <div class="row">
        <div class="container mt-5">
            <h1 class="text-center"><?php echo htmlspecialchars($_SESSION['user_name']); ?></h1>

            <form action="" method="POST" class="mt-4">
                <div class="mb-3">
                    <label for="name" class="form-label">User  Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['name']; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
 <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $user['phone']; ?>">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo $user['address']; ?>">
                </div>
                <div class="mb-3">
                    <label for="pincode" class="form-label">Pincode</label>
                    <input type="text" class="form-control" id="pincode" name="pincode" value="<?php echo $user['pincode']; ?>">
                </div>
                <div class="mb-3">
                    <label for="birthday" class="form-label">Birthday</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" value="<?php echo $user['birthday']; ?>">
                </div>
                <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
</div>  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="main/main.js"></script>
</body>
</html>