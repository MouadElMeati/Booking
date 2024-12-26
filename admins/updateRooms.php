<?php
session_start();
require('incl/cnx.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    try {
        $stmt = $pdo->prepare("SELECT * FROM rooms WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $room = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$room) {
            echo "Room not found!";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error fetching room details: " . $e->getMessage();
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $facilities = $_POST['facilities'];
    $features = $_POST['features'];

    try {
        $updateStmt = $pdo->prepare("UPDATE rooms SET room_type = :room_type, price = :price, facilities = :facilities, features = :features WHERE id = :id");
        $updateStmt->execute([
            'room_type' => $room_type,
            'price' => $price,
            'facilities' => $facilities,
            'features' => $features,
            'id' => $id
        ]);

        echo "<script>alert('Room updated successfully!'); window.location.href = 'rooms.php';</script>";
    } catch (PDOException $e) {
        echo "Error updating room: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Room</title>
    <?php require('incl/links.php'); ?>
</head>

<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center mb-4">Update Room</h2>

    <form method="POST">
        <div class="form-group mb-3">
            <label for="room_type">Room Type</label>
            <input type="text" name="room_type" id="room_type" class="form-control" value="<?php echo htmlspecialchars($room['room_type']); ?>" required>
        </div>

        <div class="form-group mb-3">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="<?php echo htmlspecialchars($room['price']); ?>" required>
        </div>

        <div class="form-group mb-3">
            <label for="facilities">Facilities</label>
            <textarea name="facilities" id="facilities" class="form-control" required><?php echo htmlspecialchars($room['facilities']); ?></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="features">Features</label>
            <textarea name="features" id="features" class="form-control" required><?php echo htmlspecialchars($room['features']); ?></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-success">Update Room</button>
            <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>

<?php require('incl/scripte.php'); ?>
</body>

</html>
