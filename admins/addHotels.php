<?php
session_start();
require('incl/cnx.php');
    $stmt = $pdo->query("SELECT * FROM cities");
    $cities = $stmt->fetchAll(PDO::FETCH_ASSOC);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hotel_name = $_POST['name'];
    $city = $_POST['city_id'];
    try {
        $stmt = $pdo->prepare("INSERT INTO hotels (name, city_id) VALUES (:name, :city_id)");
        $stmt->execute([
            'name' => $hotel_name,
            'city_id' => $city
        ]);
        header('Location: hotels.php');
        exit;
    } catch (PDOException $e) {
        echo "Error adding Hotel: " . $e->getMessage();
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hotels</title>
    <?php require('incl/links.php'); ?>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title text-center">Add Hotel</h2>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Hotel Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                        <label class="form-label">Cities:</label>
                        <select name="city_id" class="form-select" required>
                            <option value="">Select a City</option>
                            <?php foreach ($cities as $city): ?>
                                <option value="<?php echo $city['id']; ?>">
                                    <?php echo htmlspecialchars($city['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <button type="submit" class="btn btn-primary">Add Hotel</button>
            </form>
        </div>
    </div>
</div>

<?php require('incl/scripte.php'); ?>
</body>
</html>