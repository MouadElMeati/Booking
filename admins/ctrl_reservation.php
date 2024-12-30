<?php session_start(); ?>
<?php
require('incl/cnx.php');

try {
    $stmt = $pdo->query("
        SELECT r.id AS reservation_id, u.name AS user_name, u.email, u.phone, 
               rm.room_type, r.check_in, r.check_out, r.adults, r.children
        FROM reservations r
        JOIN users u ON r.user_id = u.id
        JOIN rooms rm ON r.room_id = rm.id
    ");
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error fetching reservations: " . $e->getMessage();
    $reservations = [];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Dashboard</title>
    <?php require('incl/links.php'); ?>
    <style>
        #dashbord-menu {
            position: fixed;
            height: 100%;
        }

        @media screen and (max-width: 991px) {
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
    <?php require('incl/header.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h2 class="text-center mb-4">Reservations List</h2>

                <?php if (!empty($reservations)): ?>
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Reservation ID</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Room Type</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Adults</th>
                                <th>Children</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($reservations as $reservation): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($reservation['reservation_id']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['user_name']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['email']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['phone']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['room_type']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['check_in']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['check_out']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['adults']); ?></td>
                                    <td><?php echo htmlspecialchars($reservation['children']); ?></td>
                                    <td>
                                    <a href="deleteReservation.php?id=<?php echo $reservation['reservation_id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this reservation?');">Delete</a>

                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <div class="alert alert-warning text-center">
                        No reservations found.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php require('incl/scripte.php'); ?>
</body>

</html>