<?php 
    
    $stmt = $pdo->prepare("SELECT hotelName FROM hotelinfo WHERE id = 1"); 
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $hotelName = $result['hotelName'] ?? 'Default Hotel Name'; 

 ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3 h-font" href="index.php"><?php echo htmlspecialchars($hotelName); ?></a>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active me-2" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link me-2" href="rooms.php">Rooms</a></li>
                    <li class="nav-item"><a class="nav-link me-2" href="hotels.php">Hotels</a></li>
                    <li class="nav-item"><a class="nav-link me-2" href="Contact.php">Contact us</a></li>
                    <li class="nav-item"><a class="nav-link me-2" href="about.php">About Us</a></li>
                </ul>
                <div class="d-flex">
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-2" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</button>
                    <button type="button" class="btn btn-outline-dark shadow-none me-lg-3 me-3" data-bs-toggle="modal" data-bs-target="#RegisterModal">Register</button>
                </div>
            </div>
        </div>
    </nav>

<div class="modal fade" id="LoginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle fs-3 me-2"></i>User Login</h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php 
                   
                    if (isset($login_error)) {
                        echo "<div class='alert alert-danger'>$login_error</div>";
                    }
                    ?>
                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control shadow-none" required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control shadow-none" required>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <button type="submit" name="login" class="btn btn-dark shadow-none">Login</button>
                        <a href="javascript: void(0)" class="text-secondary text-decoration-none">Forgot password?</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="RegisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-lines-fill fs-3 me-2"></i>User Registration</h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span class="badge bg-light text-dark mb-3 text-wrap lh-base">
                        Your details must match with your ID (e.g., CIN, passport, driving license) required during check-in.
                    </span>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 ps-0 mb-3"><label class="form-label">Name:</label><input name="name" type="text" class="form-control shadow-none" required></div>
                            <div class="col-md-6 ps-0 mb-3"><label class="form-label">Email:</label><input name="email" type="email" class="form-control shadow-none" required></div>
                            <div class="col-md-6 ps-0 mb-3"><label class="form-label">Phone Number:</label><input name="tel" type="tel" class="form-control shadow-none" required></div>
                            <div class="col-md-6 ps-0 mb-3"><label class="form-label">Address:</label><textarea name="adress" class="form-control shadow-none" rows="1" required></textarea></div>
                            <div class="col-md-6 ps-0 mb-3"><label class="form-label">Pin Code:</label><input name="pincode" type="text" class="form-control shadow-none" required></div>
                            <div class="col-md-6 ps-0 mb-3"><label class="form-label">Your Birthday:</label><input name="birthday" type="date" class="form-control shadow-none" required></div>
                            <div class="col-md-6 ps-0 mb-3"><label class="form-label">Password:</label><input name="password" type="password" class="form-control shadow-none" required></div>
                            <div class="col-md-6 ps-0 mb-3"><label class="form-label">Confirm Password:</label><input name="Cpassword" type="password" class="form-control shadow-none" required></div>
                        </div>
                    </div>
                    <div class="text-center my-1">
                        <button type="submit" class="btn btn-dark shadow-none">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>