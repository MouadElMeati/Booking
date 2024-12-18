



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php') ?>
    
    <title>Goat Hotels-Home</title>

    <!-- <style>
        body {
            background-color: red;
        
        }
        button {
            background-color: red;
        }
    </style> -->
</head>

<body class="bg-light">
    <!-- Navigation bar -->
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
                <div class="d-flex">
                <a href="dashbordUser.php" class="btn btn-outline-dark shadow-none me-lg-3 me-3" >Dashbord</a>
                    <a href="logout.php" class="btn btn-outline-dark shadow-none me-lg-3 me-3" >Logout</a>
                    <a href="reserver.php" class="btn btn-outline-dark shadow-none me-lg-3 me-3" >reserver</a>


                </div>
            </div>
        </div>
    </nav>

<!-- Login Modal -->
<div class="modal fade" id="LoginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST"> <!-- Ensure method is POST -->
                <div class="modal-header">
                    <h5 class="modal-title d-flex align-items-center"><i class="bi bi-person-circle fs-3 me-2"></i>User Login</h5>
                    <button type="reset" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php 
                    // Display login error if exists
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
 <!-- Register Modal -->
<div class="modal fade" id="RegisterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST"> <!-- Ensure method is POST -->
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
                            <div class="col-md-6 ps-0 mb-3"><label class="form-label">Picture:</label><input type="file" accept=".jpg, .png, .jpeg" class="form-control shadow-none"></div>
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

    <!-- Swiper section -->
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
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- check form -->
    <div class="container Availability-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Reservation</h5>
                <form>
                    <div class="row align-items-end">
                    <div class="col-lg-2">
                            <label class="form-label" style="font-weight: 500;">City</label>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">Kenitra</option>
                                <option value="2">Rabat</option>
                                <option value="3">Tanger</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label" style="font-weight: 500;">Check-in</label>
                            <input type="date" class="form-control shadow-none" required>
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label" style="font-weight: 500;">Check-out</label>
                            <input type="date" class="form-control shadow-none" required>
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label" style="font-weight: 500;">Adults</label>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label" style="font-weight: 500;">Children</label>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2  mt-2">
                            <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Our Rooms -->   

        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Rooms</h2>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card border-0 shadow" style="max-width: 350pxrem;margin: auto;">
                        <img src="images/room/one.png" class="card-img-top" >
                        <div class="card-body">
                          <h5 >Luxury Suite</h5>
                          <h6 class="mb-4">$250 - $500 per night</h6>
                          <div class="features mb-4">
                            <h6>Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                2 Rooms
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                2 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                1 Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                3 Sofa
                            </span>
                          </div>
                          <div class="facilities mb-4">
                            <h6>Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                Screen TV
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                Wi-Fi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                In-Room Safe
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                Front Desk
                            </span>
                          </div>
                          <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                          </div>
                          <div class="d-flex justify-content-evenly mb-4">
                                    <a href="reserver.php" class="btn btn-sm text-white custom-bg shadow-none">Book Now </a>
                                    <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none">More Details </a>


                          </div>
                        </div>
                      </div>
                </div> 
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card border-0 shadow" style="max-width: 350pxrem;margin: auto;">
                        <img src="images/room/four.png" class="card-img-top" >
                        <div class="card-body">
                          <h5 >Luxury Suite</h5>
                          <h6 class="mb-4">$250 - $500 per night</h6>
                          <div class="features mb-4">
                            <h6>Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                2 Rooms
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                2 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                1 Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                3 Sofa
                            </span>
                          </div>
                          <div class="facilities mb-4">
                            <h6>Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                Screen TV
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                Wi-Fi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                In-Room Safe
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                Front Desk
                            </span>
                          </div>
                          <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                          </div>
                          <div class="d-flex justify-content-evenly mb-4">
                          <a href="reserver.php" class="btn btn-sm text-white custom-bg shadow-none">Book Now </a>
                          <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none">More Details </a>


                          </div>
                        </div>
                      </div>
                </div>  
                <div class="col-lg-4 col-md-6 my-3">
                    <div class="card border-0 shadow" style="max-width: 350pxrem;margin: auto;">
                        <img src="images/room/three.png" class="card-img-top" >
                        <div class="card-body">
                          <h5 >Luxury Suite</h5>
                          <h6 class="mb-4">$250 - $500 per night</h6>
                          <div class="features mb-4">
                            <h6>Features</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                2 Rooms
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                2 Bathroom
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                1 Balcony
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                3 Sofa
                            </span>
                          </div>
                          <div class="facilities mb-4">
                            <h6>Facilities</h6>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                Screen TV
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                Wi-Fi
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                In-Room Safe
                            </span>
                            <span class="badge rounded-pill bg-light text-dark text-wrap ">
                                Front Desk
                            </span>
                          </div>
                          <div class="rating mb-4">
                            <h6 class="mb-1">Rating</h6>
                            <span class="badge rounded-pill bg-light">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </span>
                          </div>
                          <div class="d-flex justify-content-evenly mb-4">
                          <a href="reserver.php" class="btn btn-sm text-white custom-bg shadow-none">Book Now </a>
                          <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none">More Details </a>


                          </div>
                        </div>
                      </div>
                </div>  
                <div class="col-lg-12 text-center mt-5">
                    <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms</a>

                </div>
            </div>
            
        </div>

        <br><br><br>
        <br><br><br>
        <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Facilities</h2>
        <div class="container">
            <div class="row d-flex justify-content-evenly px-lg-0 px-md-0 px-5">
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/Facilities/six.svg" width="80px">
                    <h5 class="mt-4">Wifi</h5>
                </div>
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/Facilities/four.svg" width="80px">
                    <h5 class="mt-4">Climatisation</h5>
                </div>
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/Facilities/two.svg" width="80px">
                    <h5 class="mt-4">TV</h5>
                </div>
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/Facilities/four.svg" width="80px">
                    <h5 class="mt-4">Climatisation</h5>
                </div>
                <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
                    <img src="images/Facilities/six.svg" width="80px">
                    <h5 class="mt-4">Wifi</h5>
                </div>
                <div class="col-lg-12 text-center mt-5">
                    <a href="#" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities</a>

                </div>
            </div>
        </div>
        <?php require('include/footer.php') ?>
        <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="main/main.js"></script>
</body>

</html>