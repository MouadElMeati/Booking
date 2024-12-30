<?php
session_start();
require('admins/incl/cnx.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$stmt = $pdo->query("SELECT * FROM cities");
$cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

$hotels = [];
$rooms = [];
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['reserve'])) {
    try {
        $user_id = $_SESSION['user_id'];
        $room_id = $_POST['room_id'];
        $check_in = $_POST['check_in'];
        $check_out = $_POST['check_out'];
        $adults = $_POST['adults'];
        $children = $_POST['children'];
        $city_id = $_POST['city_id'];
        $hotel_id = $_POST['hotel_id'];

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM reservations WHERE room_id = ? AND 
            ((check_in <= ? AND check_out > ?) OR (check_in < ? AND check_out >= ?))");
        $stmt->execute([$room_id, $check_out, $check_in, $check_in, $check_in]);

        if ($stmt->fetchColumn() > 0) {
            throw new Exception("The room is not available for the selected dates.");
        }

        $stmt = $pdo->prepare("SELECT COUNT(*) FROM rooms WHERE id = ? AND hotel_id = ?");
        $stmt->execute([$room_id, $hotel_id]);
        if ($stmt->fetchColumn() == 0) {
            throw new Exception("Invalid room selection.");
        }

        $stmt = $pdo->prepare("INSERT INTO reservations (user_id, room_id, hotel_id, check_in, check_out, adults, children, city_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$user_id, $room_id, $hotel_id, $check_in, $check_out, $adults, $children, $city_id])) {
            header("Location: confirmation.php");
            exit();
        } else {
            throw new Exception("An error occurred while processing your reservation.");
        }
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}

if (isset($_POST['city_id'])) {
    $city_id = $_POST['city_id'];
    $stmt = $pdo->prepare("SELECT * FROM hotels WHERE city_id = ?");
    $stmt->execute([$city_id]);
    $hotels = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if (isset($_POST['hotel_id'])) {
    $hotel_id = $_POST['hotel_id'];
    $stmt = $pdo->prepare("SELECT * FROM rooms WHERE hotel_id = ? AND is_available = 1");
    $stmt->execute([$hotel_id]);
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Make a Reservation</h2>

        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($error_message); ?>
            </div>
        <?php endif; ?>

        <div class="card shadow">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label class="form-label">City:</label>
                        <select name="city_id" class="form-select" id="citySelect" required onchange="this.form.submit()">
                            <option value="">Select a city</option>
                            <?php foreach ($cities as $city): ?>
                                <option value="<?php echo $city['id']; ?>" <?php echo (isset($city_id) && $city_id == $city['id']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($city['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hotel:</label>
                        <select name="hotel_id" class="form-select" id="hotelSelect" required onchange="this.form.submit()">
                            <option value="">Select a hotel</option>
                            <?php foreach ($hotels as $hotel): ?>
                                <option value="<?php echo htmlspecialchars($hotel['id']); ?>" <?php echo (isset($hotel_id) && $hotel_id == $hotel['id']) ? 'selected' : ''; ?>>
                                    <?php echo htmlspecialchars($hotel['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Room:</label>
                        <select name="room_id" class="form-select" required>
                            <option value="">Select a room</option>
                            <?php foreach ($rooms as $room): ?>
                                <option value="<?php echo $room['id']; ?>">
                                    <?php echo htmlspecialchars($room['room_type']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <?php
                    
                    $today = date('Y-m-d');
                    ?>

                    <div class="mb-3">
                        <label class="form-label">Check-in Date:</label>
                        <input type="date" name="check_in" class="form-control" required min="<?php echo $today; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Check-out Date:</label>
                        <input type="date" name="check_out" class="form-control" required min="<?php echo $today; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Adults:</label>
                        <input type="number" name="adults" class="form-control" min="1" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Children:</label>
                        <input type="number" name="children" class="form-control" min="0" required>
                    </div>
                    <button type="submit" name="reserve" class="btn btn-primary">Reserve Now</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>