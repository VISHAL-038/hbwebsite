<?php 
    require('admin/inc/db_config.php');    
    require('admin/inc/essentials.php');
?>  


<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand me-5 fw-bold fs-3" href="index.php">Hotel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active me-2" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="rooms.php">Rooms</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="facilities.php">Facilities</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link me-2" href="contact.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                </ul>
                <div class="d-flex">
                    <?php
                         if(isset($_SESSION['login'])&&  $_SESSION==true){
                            echo<<<data
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle shadow-sm" data-bs-toggle="dropdown"data-bs-display="static" aria-expanded="false">
                                        $_SESSION[uName]
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-lg-end">
                                        <li><a class="dropdown-item"href="profile.php">Profile</a></li>
                                        <li><a class="dropdown-item"href="booking.php">Bookings</a></li>
                                        <li><a class="dropdown-item"href="logout.php">Logout</a></li>
                                    </ul>
                                </div>
                            data;
                        }
                        else{
                            echo<<<data
                                <button type="button" class="btn btn-outline-primary shadow-sm me-lg-2 me-3" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                                <button type="button" class="btn btn-outline-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
                            data;
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- Signup Modal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="login-form">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-circle fs-3 me-2"></i> User Login
                        </h5>
                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Email address/Phone number</label>
                            <input type="text" class="form-control" aria-describedby="emailHelp"
                            name="email_mob" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" aria-describedby="emailHelp" name="pass" required>
                        </div>
                        <div class="mb-2">
                            <button type="submit" class="btn btn-primary float-end">Login</button>
                            <a href="javascript: void(0)" class="text-decoration-none text-secondary">Forgot Password</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of modal -->

    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form id="register-form" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title d-flex align-items-center">
                            <i class="bi bi-person-circle fs-3 me-2"></i> User Register
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span class="badge rounded-pill bg-ligt text-dark mb-3 text-wrap">
                            Note:Your details must match the information provided by your ID card or passport. The id will be required at time of checkins.
                        </span>
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="phone-number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone-number" name="phonenum" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" rows="1" placeholder="Enter your address..." name="address" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="pincode" class="form-label">PinCode</label>
                            <input type="text" class="form-control" id="pincode" name="pincode" required>
                        </div>
                        <div class="mb-3">
                            <label for="dob" class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control" id="dob" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="pass" required>
                        </div>
                        <div class="mb-3">
                            <label for="Cpassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="Cpassword" name="cpass" required>
                        </div>
                        <div class="mb-2">
                            <!-- <button type="submit" name="register" class="btn btn-primary">Register</button> -->
                            <!-- <button type="submit" name="register">Register</button> -->
                            <input type="submit" name="register" value="Register" class="btn btn-primary">

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Register Modal -->

    
