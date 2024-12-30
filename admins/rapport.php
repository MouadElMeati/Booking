<?php session_start() ?>
<?php
require('incl/cnx.php');




try {
    $stmt = $pdo->query("SELECT * FROM contact_messages");
    $msgs = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

<?php if (!empty($msgs)): ?>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                   <th>Name</th>
                <th>Email</th>
                <th>messages</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($msgs as $msg): ?>
                <tr>
                    <td><?php echo htmlspecialchars($msg['id']); ?></td>
                    <td><?php echo htmlspecialchars($msg['name']); ?></td>
                    <td><?php echo htmlspecialchars($msg['email']); ?></td>
                    <td><?php echo htmlspecialchars($msg['message']); ?></td>
                    <td>
                       

                    <a href="deleteRapport.php?id=<?php echo $msg['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this messages?');">Delete</a>
                     
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <div class="alert alert-warning text-center">
        No messages found.
    </div>
<?php endif; ?>
            </div>
        </div>
    </div>  
    <?php require('incl/scripte.php') ?>
</body>

</html>