<?php session_start() ?>
<?php
require('incl/cnx.php');


if (isset($_POST['delete_id'])) {
    try {
        $deleteStmt = $pdo->prepare("DELETE FROM users WHERE id = :id");
        $deleteStmt->execute(['id' => $_POST['delete_id']]);
    } catch (PDOException $e) {
        echo "Error deleting user: " . $e->getMessage();
    }
}

try {
    $stmt = $pdo->query("SELECT id, name, email, phone, address, pincode, birthday, password FROM users");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching users: " . $e->getMessage();
    $users = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-Dashbord</title>
    <?php require('incl/links.php');
    
     ?>
     <style>
       
        #dashbord-menu {
            position: fixed;
            height: 100%;
            
        }
        
        @media screen and (max-width:991px) {
            #dashbord-menu {
                height: auto;
                width: 100%;
            }
            #main-content {
                margin-top: 60px;
            }

        }
    </style>
</head>

<body class="bg-light">
<?php require('incl/header.php') ?>
  
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
            <h2 class="text-center mb-4">User List</h2>

<?php if (!empty($users)): ?>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                   <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Pincode</th>
                <th>Birthday</th>
                <th>Password</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['phone']); ?></td>
                    <td><?php echo htmlspecialchars($user['address']); ?></td>
                    <td><?php echo htmlspecialchars($user['pincode']); ?></td>
                    <td><?php echo htmlspecialchars($user['birthday']); ?></td>
                    <td>******</td>
                    <td>
                       
                        <form action="" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            <input type="hidden" name="delete_id" value="<?php echo $user['id']; ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="alert alert-warning text-center">
        No users found.
    </div>
<?php endif; ?>
            </div>
        </div>
    </div>  
    <?php require('incl/scripte.php') ?>
</body>

</html>