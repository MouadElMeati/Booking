<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashbord-User</title>
    <?php require('include/links.php') ?>
    <style>
       
       #dashbord-menu {
           position: fixed;
           height: 100%;
           
       }
       
       @media screen and (max-width:991px) {
           #dashbord-menu {
               height: auto;
               width: 100%;
           }
           #main-content {
               margin-top: 60px;
           }

       }
   </style>
</head>
<body class="bg-light">
    <?php require('include/navUser.php') ?>

    <div class="container" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h2 class="text-center text-primary">Welcome Mr <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></h2>            </div>
        </div>
    </div>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="main/main.js"></script></body>
</html>