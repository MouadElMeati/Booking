<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php') ?>

    <title>Goat Hotels-Rooms</title>

</head>

<body class="bg-light">
    <?php require('include/Header.php') ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold h-font text-center">Our Rooms</h2>
        <div class="h-line bg-dark"></div>
    </div>
    <div class="container ">
        <div class="row">
            <div class="col-lg-3 col-md-12 mb-4">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">FILTERS</h4>
                        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterdropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column align-items-stretch" id="filterdropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px;">CHECK AVAILABILITY</h5>
                                <label class="form-label">Check-in</label>
                                <input type="date" class="form-control shadow-none mb-3" required>
                                <label class="form-label">Check-Out</label>
                                <input type="date" class="form-control shadow-none " required>

                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px;">FACILITIES</h5>
                                <div class="mb-2">
                                    <input type="checkbox" id="f1" class="form-check-input shadow-none mb-3" required>
                                    <label class="form-check-label" for="f1">Facility One</label>

                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f2" class="form-check-input shadow-none mb-3" required>
                                    <label class="form-check-label" for="f2">Facility Two</label>

                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" id="f3" class="form-check-input shadow-none mb-3" required>
                                    <label class="form-check-label" for="f3">Facility Three</label>

                                </div>



                            </div>
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size:18px;">GUESTS</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label">ADULTS</label>
                                        <input type="number" class="form-control shadow-none mb-3" required>
                                    </div>
                                    <div>
                                        <label class="form-label">CHILDREN</label>
                                        <input type="number" class="form-control shadow-none mb-3" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class="col-lg-9 col-md-12 px-4">
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5">
                            <img src="images/room/one.png" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5">
                            <h5 class="mb-3">Sipmle Room</h5>
                            <div class="features mb-3 ">
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
                        </div>
                        <div class="col-md-2">
                          <h6 class="mb-4">$250 - $500 per night</h6>
                          <a href="reserver.php" class="btn btn-sm text-white custom-bg shadow-none px-4 mb-3">Book Now </a>
                          <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none px-3 mb-3">More Details </a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5">
                            <img src="images/room/five.png" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5">
                            <h5 class="mb-3">Sipmle Room</h5>
                            <div class="features mb-3 ">
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
                        </div>
                        <div class="col-md-2">
                          <h6 class="mb-4">$250 - $500 per night</h6>
                          <a href="reserver.php" class="btn btn-sm text-white custom-bg shadow-none px-4 mb-3">Book Now </a>
                          <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none px-3 mb-3">More Details </a>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 border-0 shadow">
                    <div class="row g-0 p-3 align-items-center">
                        <div class="col-md-5">
                            <img src="images/room/four.png" class="img-fluid rounded">
                        </div>
                        <div class="col-md-5">
                            <h5 class="mb-3">Sipmle Room</h5>
                            <div class="features mb-3 ">
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
                        </div>
                        <div class="col-md-2">
                          <h6 class="mb-4">$250 - $500 per night</h6>
                          <a href="reserver.php" class="btn btn-sm text-white custom-bg shadow-none px-4 mb-3">Book Now </a>
                          <a href="rooms.php" class="btn btn-sm btn-outline-dark shadow-none px-3 mb-3">More Details </a>
                        </div>
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>



    <?php require('include/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="main/main.js"></script>
</body>

</html>