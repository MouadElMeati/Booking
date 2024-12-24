<?php session_start() ?>
<?php
require('incl/cnx.php');

if (isset($_POST['delete_id'])) {
    try {
        $deleteStmt = $pdo->prepare("DELETE FROM rooms WHERE id = :id");
        $deleteStmt->execute(['id' => $_POST['delete_id']]);
    } catch (PDOException $e) {
        echo "Error deleting user: " . $e->getMessage();
    }
}

try {
    $stmt = $pdo->query("SELECT id, room_type, price, facilities,features FROM rooms");
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching rooms: " . $e->getMessage();
    $rooms = [];
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
            <h2 class="text-center mb-4">rooms List</h2>

<?php if (!empty($rooms)): ?>
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                   <th>Room Type</th>
                <th>Price</th>
                <th>Facilitiés</th>
                <th>Features</th>
                <th>Actions</th>
            
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rooms as $room): ?>
                <tr>
                    <td><?php echo htmlspecialchars($room['id']); ?></td>
                    <td><?php echo htmlspecialchars($room['room_type']); ?></td>
                    <td><?php echo htmlspecialchars($room['price']); ?></td>
                    <td><?php echo htmlspecialchars($room['facilities']); ?></td>
                    <td><?php echo htmlspecialchars($room['features']); ?></td>

                    
                
                        <td>
                    <a href="update_reserv.php?id=<?php echo $room['id']; ?>" class="btn btn-warning">Update</a>
                    <a href="deleteReserv.php?id=<?php echo $room['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this reservation?');">Delete</a>
                
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <di class="d-flex justify-content-center mt-5">
        <button class="btn btn-primary ">Add Rooms</button>
    </div>
<?php else: ?>
    <div class="alert alert-warning text-center">
        No Rooms found.
    </div>
<?php endif; ?>
            </div>
        </div>
    </div>  
    <?php require('incl/scripte.php') ?>
</body>

</html>