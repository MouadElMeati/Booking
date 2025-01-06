<?php session_start(); ?>
<?php
require('incl/cnx.php'); // Include your database connection

// Handle room deletion
if (isset($_POST['delete_id'])) {
    try {
        $deleteStmt = $pdo->prepare("DELETE FROM rooms WHERE id = :id");
        $deleteStmt->execute(['id' => $_POST['delete_id']]);
    } catch (PDOException $e) {
        echo "Error deleting room: " . $e->getMessage();
    }
}

// Fetch rooms with hotel names
try {
    $stmt = $pdo->query("
        SELECT r.id, r.room_type, r.price, r.facilities, r.features, h.name AS hotel_name 
        FROM rooms r
        JOIN hotels h ON r.hotel_id = h.id
    ");
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
    <title>Admin Panel - Dashboard</title>
    <?php require('incl/links.php'); ?>
    <style>
        #dashbord-menu {
            position: fixed;
            height: 100%;
        }

        @media screen and (max-width: 991px) {
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
    <?php require('incl/header.php'); ?>

    <div class="container-fluid" id="main-content" >
        <div class="row">
            <div class="col-lg-12 ms-auto p-4 overflow-hidden">
                <h2 class="text-center mb-4">Rooms List</h2>

                <?php if (!empty($rooms)): ?>
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Room Type</th>
                                <th>Price</th>
                                <th>Facilities</th>
                                <th>Features</th>
                                <th>Hotel Name</th>
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
                                    <td><?php echo htmlspecialchars($room['hotel_name']); ?></td> <!-- Display hotel name -->
                                    <td class="d-flex gap-2">
                                        <a href="updateRooms.php?id=<?php echo $room['id']; ?>" class="btn btn-warning">Update</a>
                                        <form method="POST" action="rooms.php" style="display:inline;">
                                            <input type="hidden" name="delete_id" value="<?php echo $room['id']; ?>">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this room?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-5">
                        <a href="addRooms.php" class="btn btn-primary">Add Rooms</a>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning text-center">
                        No Rooms found.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php require('incl/scripte.php'); ?>
</body>

</html>