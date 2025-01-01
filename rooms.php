<?php
require('admins/incl/cnx.php'); // Database connection

// Fetch rooms from the database
$rooms_stmt = $pdo->prepare("SELECT * FROM rooms");
$rooms_stmt->execute();
$rooms = $rooms_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php') ?>

    <title>Goat Hotels-Rooms</title>

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
                    <li class="nav-item"><a class="nav-link active me-2" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link me-2" href="rooms.php">Rooms</a></li>
                    <li class="nav-item"><a class="nav-link me-2" href="facilities.php">Facilities</a></li>
                    <li class="nav-item"><a class="nav-link me-2" href="Contact.php">Contact us</a></li>
                    <li class="nav-item"><a class="nav-link me-2" href="about.php">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Our Rooms</h2>
        <div class="h-line bg-dark"></div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($rooms as $room): ?>
                <div class="col-lg-4 col-md-6 mb-4"> <!-- 3 rooms per line on desktop, 2 on tablets, 1 on mobile -->
                    <div class="card border-0 shadow">
                        <div class="p-3">
                            <div class="mb-3">
                                <?php if ($room['image'] !== NULL): ?>
                                    <img src="<?php echo $room['image']; ?>" class="img-fluid rounded">
                                <?php else: ?>
                                    <img src="default-image.jpg" class="img-fluid rounded">
                                <?php endif; ?>
                            </div>
                            <h5 class="mb-3"><?php echo $room['room_type']; ?></h5>
                            <div class="features mb-3">
                                <h6>Features</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    <?php echo $room['features']; ?>
                                </span>
                            </div>
                            <div class="facilities mb-4">
                                <h6>Facilities</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    <?php echo $room['facilities']; ?>
                                </span>
                            </div>
                            <h6 class="mb-4">$<?php echo $room['price']; ?> per night</h6>
                            <a href="reserver.php" class="btn btn-sm text-white custom-bg shadow-none px-4 mb-3">Book Now</a>
                            <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none px-3 mb-3">More Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php require('include/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+Nt