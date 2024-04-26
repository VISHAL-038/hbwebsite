<div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between sticky-top">
        <h3 class="mb-0">HB Website</h3>
        <a href="logout.php" class="btn btn-light btn-sm">LOG OUT</a>
    </div>

    <div class="col-lg-2 bg-dark border-top border-3 border-secondary" id="dashboard-menu">
        <nav class="navbar navbar-expand-lg navbar-dark shadow">
            <div class="container-fluid flex-lg-column align-items-stretch">
                <h4 class="mt-2 text-light">ADMIN PANEL</h4>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse flex-column mt-2 align-items-stretch" id="adminDropdown">
                    <ul class="nav nav-pills flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="dashboard.php">Dashborad</a>
                        </li>
                        <li class="nav-item text-white">
                            <a class="nav-link" href="rooms.php">Rooms</a>
                        </li>
                        <li class="nav-item text-white">
                            <a class="nav-link" href="users.php">Users</a>
                        </li>
                        <li class="nav-item text-white">
                            <a class="nav-link" href="settings.php">Settings</a>
                        </li>
                        <!-- <li class="nav-item text-white">
                            <a class="nav-link" href="settings.php">Contact</a>
                        </li> -->
                        <li class="nav-item text-white">
                            <a class="nav-link" href="message.php">Message/Review</a>
                        </li>
                        <li class="nav-item text-white">
                            <a class="nav-link" href="bookings.php">Booking</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>