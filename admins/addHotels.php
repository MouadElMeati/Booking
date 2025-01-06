<?php
session_start();
require('incl/cnx.php'); // Database connection

// Fetch all cities for the dropdown
$stmt = $pdo->query("SELECT * FROM cities");
$cities = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hotel_name = $_POST['name'];
    $city_id = $_POST['city_id'];
    $rating = $_POST['rating'];

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/room/'; // Directory to store uploaded images
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Create the directory if it doesn't exist
        }

        $fileName = basename($_FILES['image']['name']);
        $uploadFilePath = $uploadDir . $fileName;

        // Move the uploaded file to the uploads directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFilePath)) {
            $image = $uploadFilePath; // Save the file path in the database
        } else {
            echo "Error uploading file.";
            exit;
        }
    } else {
        // If no image is uploaded, set a default image or handle it as needed
        $image = 'images/room/default.jpg'; // Default image path
    }

    try {
        // Insert the hotel details into the database
        $stmt = $pdo->prepare("INSERT INTO hotels (name, city_id, rating, image) VALUES (:name, :city_id, :rating, :image)");
        $stmt->execute([
            'name' => $hotel_name,
            'city_id' => $city_id,
            'rating' => $rating,
            'image' => $image
        ]);

        header('Location: hotels.php'); // Redirect after successful insertion
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
            <h2 class="card-title text-center">Add Hotel</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                <!-- Hotel Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Hotel Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>

                <!-- City Dropdown -->
                <div class="mb-3">
                    <label class="form-label">City:</label>
                    <select name="city_id" class="form-select" required>
                        <option value="">Select a City</option>
                        <?php foreach ($cities as $city): ?>
                            <option value="<?php echo $city['id']; ?>">
                                <?php echo htmlspecialchars($city['name']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Star Rating -->
                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <div class="star-rating" id="star-rating">
                        <span class="star" data-value="1">&#9733;</span>
                        <span class="star" data-value="2">&#9733;</span>
                        <span class="star" data-value="3">&#9733;</span>
                        <span class="star" data-value="4">&#9733;</span>
                        <span class="star" data-value="5">&#9733;</span>
 </div>
                    <input type="hidden" name="rating" id="rating" value="0" required>
                </div>

                <!-- Image Upload -->
                <div class="mb-3">
                    <label for="image" class="form-label">Upload Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <small class="form-text text-muted">Leave blank for default image.</small>
                </div>

                <!-- Buttons -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add Hotel</button>
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
</script>

<?php require('incl/scripte.php'); ?>
</body>
</html>