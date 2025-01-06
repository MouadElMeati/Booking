<?php require('include/LoginRegister.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php') ?>

    <title>Goat Hotels-About Us</title>

</head>

<body class="bg-light">
    <?php require('include/header.php') ?>
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

        <div class="my-5 px-4">
            <h2 class="fw-bold h-font text-center">About Us</h2>
            <div class="h-line bg-dark"></div>
                <p class="text-center mt-3">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>Quam aspernatur earum, accusantium illo n
                    eque commodi a vero nisi modi eaque enim  <br>expedita ipsum laboriosam ipsam! Soluta dolor maiores adipisci excepturi?
                </p>
        </div>
        <div class="container">
            <div class="row bg-white rounded shadow p-4 border-top border-4 text-center">
                <div class="col-lg-6 col-md-6 mb-5 px-4">
                    
                    <h5>Something About Us</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi 
                    orem ipsum dolor sit amet consectetur adipisicing elit. Eligendi 
                        
                        am est inventore debitis nesciunt ratione porro eos 
                        am est inventore debitis nesciunt ratione porro eos.</p>
                        <h5>Something About Us</h5>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi 
                    orem ipsum dolor sit amet consectetur adipisicing elit. Eligendi 
                        
                        am est inventore debitis nesciunt ratione porro eos 
                        am est inventore debitis nesciunt ratione porro eos.</p>
                    
                </div>
                <div class="col-lg-6 col-md-6 mb-5 px-4">
                    
                    
                  <img src="images/about/about.jpg" class="w-100">
                    
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row d-flex justify-content-evenly px-lg-0 px-md-0 px-5">
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/about/customers.svg" width="80px">
                    <h5 class="mt-4">+200 Customers</h5>
                </div>
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/about/hotel.svg" width="80px">
                    <h5 class="mt-4">+300 Rooms</h5>
                </div>
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/about/rating.svg" width="80px">
                    <h5 class="mt-4"> +150 Reviews</h5>
                </div>
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/about/staff.svg" width="80px">
                    <h5 class="mt-4">+200 Staffs</h5>
                </div>
                
            </div>
        </div>
        <?php require('include/footer.php') ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="main/main.js"></script>
</body>

</html>
