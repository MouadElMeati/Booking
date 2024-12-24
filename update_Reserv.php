<?php
session_start();
require('./admins/incl/cnx.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: dashbordUser.php");
    exit();
}

$reservation_id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM reservations WHERE id = ? AND user_id = ?");
$stmt->execute([$reservation_id, $_SESSION['user_id']]);
$reservation = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$reservation) {
    echo "Reservation not found.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_id = htmlspecialchars(trim($_POST['room_id']));
    $check_in = htmlspecialchars(trim($_POST['check_in']));
    $check_out = htmlspecialchars(trim($_POST['check_out']));
    $adults = htmlspecialchars(trim($_POST['adults']));
    $children = htmlspecialchars(trim($_POST['children']));

    $stmt = $pdo->prepare("UPDATE reservations SET room_id = ?, check_in = ?, check_out = ?, adults = ?, children = ? WHERE id = ? AND user_id = ?");
    if ($stmt->execute([$room_id, $check_in, $check_out, $adults, $children, $reservation_id, $_SESSION['user_id']])) {
        header("Location: reservation.php?success=1");
        exit();
    } else {
        echo "Error updating reservation.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Reservation</title>
    <?php require('include/links.php'); ?>
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h2 class="text-center">Update Reservation</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="room_id" class="form-label">Room ID</label>
                <input type="text" id="room_id" name="room_id" class="form-control" value="<?php echo $reservation['room_id']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="check_in" class="form-label">Check-in Date</label>
                <input type="date" id="check_in" name="check_in" class="form-control" value="<?php echo $reservation['check_in']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="check_out" class="form-label">Check-out Date</label>
                <input type="date" id="check_out" name="check_out" class="form-control" value="<?php echo $reservation['check_out']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="adults" class="form-label">Number of Adults</label>
                <input type="number" id="adults" name="adults" class="form-control" value="<?php echo $reservation['adults']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="children" class="form-label">Number of Children</label>
                <input type="number" id="children" name="children" class="form-control" value="<?php echo $reservation['children']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Reservation</button>
        </form>
    </div>

</body>
</html>