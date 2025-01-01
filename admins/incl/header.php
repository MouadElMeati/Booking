<div class="container-fluid bg-white text-primary p-3 d-flex align-items-center justify-content-between " >
    <h3 class=" mb-0 ">ADMIN PANEL</h3>
    <a href="logout.php" class="btn btn-outline btn text-primary btn-sm">LOG OUT</a>
</div>

<div class="col-lg-2  bg-white border-top border-3  " id="dashbord-menu">
    <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container-fluid flex-lg-column align-items-stretch">
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#admindropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch" id="admindropdown">
                <ul class="nav nav-pills flex-column text-primary">
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="rooms.php">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="hotels.php">hotels</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href='userList.php'>Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="ctrl_reservation.php">reservation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="rapport.php">messages</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>