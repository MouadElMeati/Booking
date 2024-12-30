<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
  <title>Vacation Rental</title>
  <link crossorigin="anonymous" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" rel="stylesheet"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&amp;display=swap" rel="stylesheet"/>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
  session_start();
  define('APPURL', 'http://localhost/hotel-final/');
  require "config.php";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
  <a class="navbar-brand" href="index.php">SYSTEM <span>RESERVATION</span></a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="about.php">About</a></li> -->
        <!-- <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li> -->
        <li class="nav-item"><a class="nav-link" href="allrooms.php">Rooms</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        <?php if (!isset($_SESSION['username'])) : ?>
          <li class="nav-item"><a href="<?php echo APPURL; ?>/login.php" class="nav-link">Login</a></li>
          <li class="nav-item"><a href="<?php echo APPURL; ?>/register.php" class="nav-link">Register</a></li>
        <?php else : ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['username']; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?php echo APPURL; ?>bookings.php?id=<?php echo $_SESSION['id']; ?>">Your Bookings</a></li>
              <li><a class="dropdown-item" href="<?php echo APPURL; ?>/logout.php">Logout</a></li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>




<!-- Divider -->
<div class="container-fluid text-center">
  <h1 class="title">Payment</h1>
</div>


<div class="container">  
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <script src="https://www.paypal.com/sdk/js?client-id=Ad236iBJdFqU5sVhW9NG1n_UFPmx3xYf5EXZH4rzV58LvRkiFXmtsaE5ODF8ldda-N9elASYj5Znx-ki&currency=USD"></script>
                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: '<?php echo $_SESSION['price']; ?>' // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                          
                             window.location.href='index.php';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>
                  
                </div>
            </div>
        </div>


             <!-- Footer -->
 <footer>
        <p>&copy; 2024 System Reservation. All rights reserved.</p>
        
    </footer>