<?php
session_start();
require('incl/cnx.php'); 

if (!isset($_GET['id'])) {
    header('Location: hotels.php'); 
    exit;
}

$hotelId = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT id, name, city_id, image, rating FROM hotels WHERE id = :id");
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
    $rating = $_POST['rating'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/hotels/'; 
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $fileName = basename($_FILES['image']['name']);
        $uploadFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFilePath)) {
            $image = $uploadFilePath; 
        } else {
            echo "Error uploading file.";
            exit;
        }
    } else {
        $image = $hotel['image'];
    }

    try {
        $stmt = $pdo->prepare("UPDATE hotels SET name = :name, city_id = :city_id, rating = :rating, image = :image WHERE id = :id");
        $stmt->execute([
            'name' => $hotel_name,
            'city_id' => $city_id,
            'rating' => $rating,
            'image' => $image,
            'id' => $hotelId
        ]);

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
    <style>
        .star-rating {
            display: flex;
            justify-content: center;
            font-size: 24px;
            cursor: pointer;
        }
        .star-rating .star {
            color: #ccc;
            transition: color 0.2s;
        }
        .star-rating .star.selected {
            color: #ffcc00;
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title text-center">Update Hotel</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Hotel Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($hotel['name']); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">City:</label>
                    <select name="city_id" class="form-select" required>
                        <option value="">Select a City</option>
                        <?php foreach ($cities as $city): ?>
                            <option value="<?php echo $city['id']; ?>" <?php echo ($city['id'] == $hotel['city_id']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($city['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <div class="star-rating" id="star-rating">
                        <span class="star" data-value="1">&#9733;</span>
                        <span class="star" data-value="2">&#9733;</span>
                        <span class="star" data-value="3">&#9733;</span>
                        <span class="star" data-value="4">&#9733;</span>
                        <span class="star" data-value="5">&#9733;</span>
                    </div>
                    <input type="hidden" name="rating" id="rating" value="<?php echo htmlspecialchars($hotel['rating']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <small class="form-text text-muted">Leave blank to keep the current image.</small>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Update Hotel</button>
                    <a href="hotels.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    const stars = document.querySelectorAll('.star');
    const ratingInput = document.getElementById('rating');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const rating = star.getAttribute('data-value');
            ratingInput.value = rating;

            stars.forEach(s => {
                s.classList.remove('selected');
            });

            for (let i = 0; i < rating; i++) {
                stars[i].classList.add('selected');
            }
        });
    });

    const initialRating = ratingInput.value;
    if (initialRating) {
        stars.forEach(star => {
            if (star.getAttribute('data-value') <= initialRating) {
                star.classList.add('selected');
            }
        });
    }
</script>

<?php require('incl/scripte.php'); ?>
</body>
</html>