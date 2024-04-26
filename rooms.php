<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Rooms</title>
    <?php require('inc/links.php'); ?>
    <style>
    </style>
</head>
<body class="bg-light">
    <!-- Header file is required -->
    <?php require('inc/header.php'); ?>
    <!-- Header file require end-->

    <div class="my-5 px-4">
        <h2 class="fw-bold text-center">Rooms</h2>
        <div class="h-line bg-dark"></div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Filter Section -->
            <!-- <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Filters</h4>
                        

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropdown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse flex-column mt-2 align-items-stretch" id="filterDropdown">
                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Check Availability</h5>
                                <label for="check-in" class="form-label">Check-in</label>
                                <input type="date" class="form-control mb-3" id="check-in" required>
                                <label for="check-out" class="form-label">Check-out</label>
                                <input type="date" class="form-control" id="check-out" required>
                            </div>

                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Facilities</h5>
                                <div class="mb-2">
                                    <input type="checkbox" class="form-check-input" id="f1" required>
                                    <label class="form-check-label" for="f1">Facility one</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" class="form-check-input" id="f2" required>
                                    <label class="form-check-label" for="f2">Facility two</label>
                                </div>
                                <div class="mb-2">
                                    <input type="checkbox" class="form-check-input" id="f3" required>
                                    <label class="form-check-label" for="f3">Facility three</label>
                                </div>
                            </div>

                            <div class="border bg-light p-3 rounded mb-3">
                                <h5 class="mb-3" style="font-size: 18px;">Guests</h5>
                                <div class="d-flex">
                                    <div class="me-3">
                                        <label class="form-label">Adults</label>
                                        <input type="number" class="form-control">
                                    </div>
                                    <div>
                                        <label class="form-label">Children</label>
                                        <input type="number" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </nav>
            </div> -->
            <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
                <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
                    <div class="container-fluid flex-lg-column align-items-stretch">
                        <h4 class="mt-2">Availabe Room are</h4>
                    </div>
                </nav>
            </div>
            <!-- Filter Section End -->

            <div class="col-lg-9 col-md-12 px-4">

                <?php 
                    $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND `removed`=?", [1, 0], 'ii');
                    while ($room_data = mysqli_fetch_assoc($room_res)) {
                        $room_thumb = ROOM_IMG_PATH . "thumbnail.jpg";
                        
                        // Use prepared statement to prevent SQL injection
                        $thumb_q = select("SELECT * FROM `room_image` WHERE `room_id`=? AND `thumb`='1'", [$room_data['id']], 'i');
                        
                        if ($thumb_q->num_rows > 0) {
                            $thumb_res = mysqli_fetch_assoc($thumb_q);
                            $room_thumb = ROOM_IMG_PATH . $thumb_res['image'];       
                        }
                        
                        // echo "Room ID: " . $room_data['id'] . "<br>";
                        // echo "Room Name: " . $room_data['name'] . "<br>";
                        // echo "Thumbnail Image: " . $room_thumb . "<br><br>";
                        if(isset($_SESSION["login"]) && $_SESSION['login'] == true) {
                            $login = 1;
                        }
                ?>
                        <!-- Room Record -->
                        <div class="card mb-4 border-0 shadow">
                            <div class="row g-0 p-3 align-items-center">
                                <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
                                    <img src="<?php echo $room_thumb; ?>" class="img-fluid rounded" alt="Room Thumbnail">
                                </div>
                                <div class="col-md-5 px-lg-3 px-md-3 px-0">
                                    <h5 class="mb-3"><?php echo $room_data['name']; ?></h5>
                                    <div class="features mb-3">
                                        <h6 class="mb-1">Features</h6>
                                        <?php 
                                            $features = explode(',', $room_data['features']);
                                            foreach ($features as $feature) {
                                                echo "<span class='badge rounded-pill bg-light text-dark me-2'>$feature</span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="facilities mb-3">
                                        <h6 class="mb-1">Facilities</h6>
                                        <?php 
                                            $facilities = explode(',', $room_data['facilities']);
                                            foreach ($facilities as $facility) {
                                                echo "<span class='badge rounded-pill bg-light text-dark me-2'>$facility</span>";
                                            }
                                        ?>
                                    </div>
                                    <div class="guests">
                                        <h6 class="mb-1">Guests</h6>
                                        <h6 class="mb-1">Guests</h6>
                                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap"><?php echo $room_data['adult']; ?> Adults</span>
                                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap"><?php echo $room_data['children']; ?> Children</span>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
                                    <h6 class="mb-4">₹ <?php echo $room_data['price']; ?> per night</h6>
                                    <a href="#" onclick="checkLoginToBook('<?php echo $login; ?>', <?php echo $room_data['id']; ?>)" class="btn btn-sm text-white custom-bg shadow mb-3">Book Now</a>

                                    <a href="room_details.php?id=<?php echo $room_data['id']; ?>" class="btn btn-sm  btn-outline-primary shadow">More Details</a>

                                </div>
                            </div>
                        </div>
                <?php 
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require('inc/footer.php'); ?>
    <!-- Footer end -->
</body>
</html>
