<?php
session_start();
require('incl/cnx.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $facilities = $_POST['facilities'];
    $features = $_POST['features'];

    try {
        $stmt = $pdo->prepare("INSERT INTO rooms (room_type, price, facilities, features) VALUES (:room_type, :price, :facilities, :features)");
        $stmt->execute([
            'room_type' => $room_type,
            'price' => $price,
            'facilities' => $facilities,
            'features' => $features
        ]);
        header('Location: rooms.php');
        exit;
    } catch (PDOException $e) {
        echo "Error adding room: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room</title>
    <?php require('incl/links.php'); ?>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title text-center">Add Room</h2>
            <form action="addRooms.php" method="POST">
                <div class="mb-3">
                    <label for="room_type" class="form-label">Room Type</label>
                    <input type="text" class="form-control" id="room_type" name="room_type" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="mb-3">
                    <label for="facilities" class="form-label">Facilities</label>
                    <input type="text" class="form-control" id="facilities" name="facilities" required>
                </div>
                <div class="mb-3">
                    <label for="features" class="form-label">Features</label>
                    <input type="text" class="form-control" id="features" name="features" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Room</button>
            </form>
        </div>
    </div>
</div>

<?php require('incl/scripte.php'); ?>
</body>
</html>