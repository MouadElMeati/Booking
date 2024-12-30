<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('include/links.php') ?>

    <title>Goat Hotels - Contact</title>

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


    <div class="container mt-5">
        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color: #d4edda; color: #155724;">
                Your message has been sent successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="my-5 px-4">
            <h2 class="fw-bold h-font text-center">Contact Us</h2>
            <div class="h-line bg-dark"></div>
            <p class="text-center mt-3">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>Quam aspernatur earum, accusantium illo n
                eque commodi a vero nisi modi eaque enim <br>expedita ipsum laboriosam ipsam! Soluta dolor maiores adipisci excepturi?
            </p>
        </div>

        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Contact Us</h5>
                <form action="contactdata.php" method="POST">
                    <div class="row">
                        <div class="col-lg-6">
                            <label for="name" class="form-label" style="font-weight: 500;">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="email" class="form-label" style="font-weight: 500;">Email Address</label>
                            <input type="email" id="email" name="email" class="form-control shadow-none" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12">
                            <label for="message" class="form-label" style="font-weight: 500;">Your Message</label>
                            <textarea id="message" name="message" class="form-control shadow-none" rows="4" required></textarea>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12 text-center">
                            <button type="submit" class="btn btn-primary text-white shadow-none custom-bg">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require('include/footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="main/main.js"></script>
</body>

</html>