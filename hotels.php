<?php
require('include/LoginRegister.php');
require('admins/incl/cnx.php'); 

$cities_stmt = $pdo->query("SELECT * FROM cities");
$cities = $cities_stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $city_id = $_POST['city_id'];

    $hotels_stmt = $pdo->prepare("
        SELECT hotels.*, cities.name AS city_name 
        FROM hotels 
        JOIN cities ON hotels.city_id = cities.id
        WHERE hotels.city_id = :city_id
    ");
    $hotels_stmt->execute(['city_id' => $city_id]);
    $hotels = $hotels_stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $hotels_stmt = $pdo->prepare("
        SELECT hotels.*, cities.name AS city_name 
        FROM hotels 
        JOIN cities ON hotels.city_id = cities.id
    ");
    $hotels_stmt->execute();
    $hotels = $hotels_stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php') ?>

    <title>Goat Hotels - Hotels</title>
    <style>
        .star-rating {
            display: inline-block;
            font-size: 24px;
            color: #ffcc00; 
        }
        .star-rating .star {
            display: inline-block;
        }
        .star-rating .star.empty {
            color: #ccc; 
        }
    </style>
</head>

<body class="bg-light">
    <?php
    require('include/Header.php') ?>
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="images/carousel/carouselOne.png" class="w-100 d-block"/></div>
                <div class="swiper-slide"><img src="images/carousel/carouselTwo.png" class="w-100 d-block"/></div>
                <div class="swiper-slide"><img src="images/carousel/carouselThree.png" class="w-100 d-block"/></div>
                <div class="swiper-slide"><img src="images/carousel/carouselFour.png" class="w-100 d-block"/></div>
                <div class="swiper-slide"><img src="images/carousel/carouselFive.png" class="w-100 d-block"/></div>
                <div class="swiper-slide"><img src="images/carousel/carouselSix.png" class="w-100 d-block"/></div>
            </div>
          
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Our Hotels</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Search by City:</label>
                        <select name="city_id" class="form-select" required>
                            <option value="">Select a City</option>
                            <?php foreach ($cities as $city): ?>
                                <option value="<?php echo $city['id']; ?>">
                                    <?php echo htmlspecialchars($city['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
            <?php foreach ($hotels as $hotel): ?>
                <div class="col-lg-4 col-md-6 mb-4"> 
                    <div class="card border-0 shadow">
                        <div class="p-3">
                            <div class="mb-3">
                                <?php if ($hotel['image'] !== NULL): ?>
                                    <img src="<?php echo $hotel['image']; ?>" class="img-fluid rounded">
                                <?php else: ?>
                                    <img src="default-image.jpg" class="img-fluid rounded">
                                <?php endif; ?>
                            </div>
                            <h5 class="mb-3"><?php echo $hotel['name']; ?></h5>
                            <div class="features mb-3">
                                <h6>City</h6>
                                <span class="badge rounded-pill bg-light text-dark text-wrap">
                                    <?php echo $hotel['city_name']; ?>
                                </span>
                            </div>
                            <div class="facilities mb-4">
                                <h6>Rating</h6>
                                <div class="star-rating">
                                    <?php
                                    $rating = $hotel['rating'];
                                    for ($i = 1; $i <= 5; $i++) {
                                        if ($i <= $rating) {
                                            echo '<span class="star">&#9733;</span>'; // Filled star
                                        } else {
                                            echo '<span class="star empty">&#9733;</span>'; // Empty star
                                        }
 }
                                    ?>
                                </div>
                            </div>
                            <a href="reserver.php" class="btn btn-sm text-white custom-bg shadow-none px- 4 mb-3">Book Now</a>
                            <a href="hotel-details.php?id=<?php echo $hotel['id']; ?>" class="btn btn-sm btn-outline-dark shadow-none px-3 mb-3">More Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php require('include/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="main/main.js"></script></body>
</html>