



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
    <?php require('include/UserNav.php') ?>


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
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="col-lg-2">
                            <label class="form-label" style="font-weight: 500;">Children</label>
                            <select class="form-select shadow-none" aria-label="Default select example">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="main/main.js"></script>
</body>

</html>