<?php
session_start();
require('./admins/incl/cnx.php'); // Ensure this file connects to your database

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Fetch reservations for the logged-in user
$stmt = $pdo->prepare("SELECT * FROM reservations WHERE user_id = ?");
$stmt->execute([$user_id]);
$reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord-User</title>
    <?php require('include/links.php') ?>
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
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php">Goat Hotels</a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active me-2" href="user.php">Home</a></li>
                </ul>
                <div class="d-flex">
                    <a href="logout.php" class="btn btn-outline-dark shadow-none me-lg-3 me-3">Logout</a>
                    <a href="reserver.php" class="btn btn-outline-dark shadow-none me-lg-3 me-3">reserver</a>


                </div>
            </div>
        </div>
    </nav>

    </div>

    <div class="col-lg-2  bg-dark border-top border-3 border-secondary" id="dashbord-menu">
        <nav class="navbar navbar-expand-lg navbar-dark ">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#admindropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column align-items-stretch" id="admindropdown">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="reservation.php">My Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="userInfos.php">My Infos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="container-fluid" >
        <div class="row">
            <div class="container mt-5">
                <h2 class="text-center">My Reservations</h2>

                <?php if (isset($_GET['success'])): ?>
                    <div class="alert alert-success" role="alert">
                        Reservation updated successfully!
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['deleted'])): ?>
                    <div class="alert alert-success" role="alert">
                        Reservation deleted successfully!
                    </div>
                <?php endif; ?>

                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Room ID</th>
                            <th>Check-in</th>
                            <th>Check-out</th>
                            <th>Adults</th>
                            <th>Children</th>
                            <th>City ID</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($reservations) > 0): ?>
                            <?php foreach ($reservations as $reservation): ?>
                                <tr>
                                    <td><?php echo $reservation['id']; ?></td>
                                    <td><?php echo $reservation['room_id']; ?></td>
                                    <td><?php echo $reservation['check_in']; ?></td>
                                    <td><?php echo $reservation['check_out']; ?></td>
                                    <td><?php echo $reservation['adults']; ?></td>
                                    <td><?php echo $reservation['children']; ?></td>
                                    <td><?php echo $reservation['city_id']; ?></td>
                                    <td>
                                        <a href="update_reserv.php?id=<?php echo $reservation['id']; ?>" class="btn btn-warning">Update</a>
                                        <a href="deleteReserv.php?id=<?php echo $reservation['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this reservation?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8" class="text-center">No reservations found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="main/main.js"></script>
</body>

</html>