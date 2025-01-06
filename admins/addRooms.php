<?php
session_start();
require('incl/cnx.php');

try {
    $hotelStmt = $pdo->query("SELECT id, name FROM hotels");
    $hotels = $hotelStmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching hotels: " . $e->getMessage();
    $hotels = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_type = $_POST['room_type'];
    $price = $_POST['price'];
    $facilities = $_POST['facilities'];
    $features = $_POST['features'];
    $hotel_id = $_POST['hotel_id']; 
    $image = $_FILES['image']; 

    if ($image['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/room/'; 
        $uploadFile = $uploadDir . basename($image['name']);

        if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
            try {
                $stmt = $pdo->prepare("INSERT INTO rooms (room_type, price, facilities, features, hotel_id, image) VALUES (:room_type, :price, :facilities, :features, :hotel_id, :image)");
                $stmt->execute([
                    'room_type' => $room_type,
                    'price' => $price,
                    'facilities' => $facilities,
                    'features' => $features,
                    'hotel_id' => $hotel_id,
                    'image' => $uploadFile 
                ]);
                header('Location: rooms.php');
                exit;
            } catch (PDOException $e) {
                echo "Error adding room: " . $e->getMessage();
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "Error: No image uploaded or upload error.";
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
            <form action="addRooms.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="hotel_id" class="form-label">Select Hotel</label>
                    <select class="form-select" id="hotel_id" name="hotel_id" required>
                        <option value="">Select a hotel</option>
                        <?php foreach ($hotels as $hotel): ?>
                            <option value="<?php echo htmlspecialchars($hotel['id']); ?>">
                                <?php echo htmlspecialchars($hotel['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
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
                <div class="mb-3">
                    <label for="image" class="form-label">Room Image</label>
                    <input type="file" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Room</button>
            </form>
        </div>
    </div>
</div>

<?php require('incl/scripte.php'); ?>
</body>
</html>