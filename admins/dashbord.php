<?php 
require('incl/secureOne.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel-Dashbord</title>
    <?php require('incl/links.php');
    
     ?>
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
<?php require('incl/header.php') ?>
  
    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
             <h2 class="text-center text-primary">Welcome Mr <strong><?php echo htmlspecialchars($_SESSION['admin-name']); ?></h2>
            </div>
        </div>
    </div>  
    <?php require('incl/scripte.php') ?>
</body>

</html>