<?php session_start() ?>
<?php
require('incl/cnx.php');

try {
    $stmt = $pdo->query("SELECT id, name, city_id FROM hotels");
    $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching hotels: " . $e->getMessage();
    $hotels = [];
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
            <h2 class="text-center mb-4">hotels List</h2>

<?php if (!empty($hotels)): ?>
    <table class="table table-bordered table-striped text-center">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                   <th>hotel Name</th>
                <th>city</th>
                <th>Actions</th>
            
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hotels as $hotel): ?>
                <tr>
                    <td><?php echo htmlspecialchars($hotel['id']); ?></td>
                    <td><?php echo htmlspecialchars($hotel['name']); ?></td>
                    <td><?php echo htmlspecialchars($hotel['city_id']); ?></td>
                   

                    
                
                        <td class="d-flex-center gap-2">
                    <a href="updateHotel.php?id=<?php echo $hotel['id']; ?>" class="btn btn-warning ">Update</a>
                    <a href="deleteHotel.php?id=<?php echo $hotel['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this hotel?');">Delete</a>
                
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <di class="d-flex justify-content-center mt-5">
        <a href="addHotels.php" class="btn btn-primary ">Add Hotels</a>
    </div>
<?php else: ?>
    <div class="alert alert-warning text-center">
        No Hotels found.
    </div>
<?php endif; ?>
            </div>
        </div>
    </div>  
    <?php require('incl/scripte.php') ?>
</body>

</html>