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
    if (isset($_POST['room_type'], $_POST['price'], $_POST['facilities'], $_POST['features'], $_POST['hotel_id'])) {
        $room_type = $_POST['room_type'];
        $price = $_POST['price'];
        $facilities = $_POST['facilities'];
        $features = $_POST['features'];
        $hotel_id = $_POST['hotel_id'];
        $image = $_FILES['image']; 

        if ($image['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'images/room/';

            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true); 
            }

            $uploadFile = $uploadDir . basename($image['name']);

            if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
                try {
                    $updateStmt = $pdo->prepare("UPDATE rooms SET room_type = :room_type, price = :price, facilities = :facilities, features = :features, hotel_id = :hotel_id, image = :image WHERE id = :id");
                    $updateStmt->execute([
                        'room_type' => $room_type,
                        'price' => $price,
                        'facilities' => $facilities,
                        'features' => $features,
                        'hotel_id' => $hotel_id,
                        'image' => $uploadFile,
                        'id' => $id
                    ]);

                    echo "<script>alert('Room updated successfully!'); window.location.href = 'rooms.php';</script>";
                } catch (PDOException $e) {
                    echo "Error updating room: " . $e->getMessage();
                }
            } else {
                echo "Error uploading image.";
            }
        } else {
            try {
                $updateStmt = $pdo->prepare("UPDATE rooms SET room_type = :room_type, price = :price, facilities = :facilities, features = :features, hotel_id = :hotel_id WHERE id = :id");
                $updateStmt->execute([
                    'room_type' => $room_type,
                    'price' => $price,
                    'facilities' => $facilities,
                    'features' => $features,
                    'hotel_id' => $hotel_id,
                    'id' => $id
                ]);

                echo "<script>alert('Room updated successfully!'); window.location.href = 'rooms.php';</script>";
            } catch (PDOException $e) {
                echo "Error updating room: " . $e->getMessage();
            }
        }
    } else {
        echo "All form fields are required!";
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

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="hot el_id">Hotel</label>
            <select name="hotel_id" id="hotel_id" class="form-control" required>
                <?php foreach ($hotels as $hotel): ?>
                    <option value="<?= $hotel['id'] ?>" <?= $hotel['id'] == $room['hotel_id'] ? 'selected' : '' ?>><?= $hotel['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="room_type">Room Type</label>
            <input type="text" name="room_type" id="room_type" class="form-control" value="<?= htmlspecialchars($room['room_type']) ?>" required>
        </div>

        <div class="form-group mb-3">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="<?= htmlspecialchars($room['price']) ?>" required>
        </div>

        <div class="form-group mb-3">
            <label for="facilities">Facilities</label>
            <textarea name="facilities" id="facilities" class="form-control" required><?= htmlspecialchars($room['facilities']) ?></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="features">Features</label>
            <textarea name="features" id="features" class="form-control" required><?= htmlspecialchars($room['features']) ?></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="image">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Room</button>
    </form>
</div>
</body>
</html>