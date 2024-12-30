<?php
session_start();
require('incl/cnx.php');

if (!isset($_GET['id'])) {
    header('Location: hotels.php'); 
    exit;
}

$hotelId = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT id, name, city_id FROM hotels WHERE id = :id");
    $stmt->execute(['id' => $hotelId]);
    $hotel = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$hotel) {
        echo "Hotel not found.";
        exit;
    }
} catch (PDOException $e) {
    echo "Error fetching hotel: " . $e->getMessage();
    exit;
}

$stmt = $pdo->query("SELECT * FROM cities");
$cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hotel_name = $_POST['name'];
    $city_id = $_POST['city_id'];

    try {
        $stmt = $pdo->prepare("UPDATE hotels SET name = :name, city_id = :city_id WHERE id = :id");
        $stmt->execute(['name' => $hotel_name, 'city_id' => $city_id, 'id' => $hotelId]);

        header('Location: hotels.php');
        exit;
    } catch (PDOException $e) {
        echo "Error updating hotel: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Hotel</title>
    <?php require('incl/links.php'); ?>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title text-center">Update Hotel</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Hotel Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($hotel['name']); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Cities:</label>
                    <select name="city_id" class="form-select" required>
                        <option value="">Select a City</option>
                        <?php foreach ($cities as $city): ?>
                            <option value="<?php echo $city['id']; ?>" <?php echo ($city['id'] == $hotel['city_id']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($city['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update Hotel</button>
                <a href="hotels.php" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>

<?php require('incl/scripte.php'); ?>
</body>
</html>