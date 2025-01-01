<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Payment</title>
    <?php require('include/links.php');

    ?>
</head>

<body>
    <?php
    session_start();
    $_SESSION['price'] = 100;
    require "./admins/incl/cnx.php";
    ?>

    <div class="container-fluid text-center">
        <h1 class="title">Payment</h1>
    </div>

    <div class="container">
        <script src="https://www.paypal.com/sdk/js?client-id=AYWeL-JQ_jnoMlrCylwpUwyVMyrRDFs9H59t-e0fo-W0_KY7FPayMyj1Brvo8hJZDlsioWUDVhoGMGG2"></script>
        <div id="paypal-button-container"></div>
        <script>
            paypal.Buttons({
                createOrder: (data, actions) => {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '<?php echo $_SESSION['price']; ?>'
                            }
                        }]
                    });
                },
                onApprove: (data, actions) => {
                    return actions.order.capture().then(function(orderData) {
                        window.location.href = 'user.php';
                    });
                }
            }).render('#paypal-button-container');
        </script>
    </div>



</body>

</html>