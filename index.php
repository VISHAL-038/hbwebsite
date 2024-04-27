<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require('inc/links.php'); ?>
    <title>Hotel-Home</title>
    
    <style>
        .avaibalityy-form{
            margin-top: -70px;
            z-index: 2;
            position: relative;
        }
        @media screen and (max-width:575px){
            .avaibalityy-form{
                margin-top: 25px;
                padding: 0 35px;
            }
        }
    </style>
</head>
<body class="bg-light">
    
    <!-- header file is require -->
    <?php require('inc/header.php'); ?>
    <!-- header file require end-->

    <!-- Swiper -->
    <div class="container-fluid px-lg-4 mt-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="./images/swipper/1.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="./images/swipper/2.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="./images/swipper/3.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="./images/swipper/4.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="./images/swipper/5.png" class="w-100 d-block" />
                </div>
                <div class="swiper-slide">
                    <img src="./images/swipper/6.png" class="w-100 d-block" />
                </div>
            </div>
        </div>
    </div>
    <!-- Swiper ends -->

    <!-- check avaibalityy form -->
    <div class="container avaibalityy-form">
        <div class="row">
            <div class="col-lg-12 bg-white shadow p-4 rounded">
                <h5 class="mb-4">Check Booking Availability</h5>
                <form action="">
                    <div class="row align-items-end">
                        <div class="col-lg-3 mb-3">
                            <label for="dob" class="form-label" style="font-weight:500;">Check-in</label>
                            <input type="date" class="form-control" id="checkinDate" required>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="dob" class="form-label" style="font-weight:500;">Check-out</label>
                            <input type="date" class="form-control" id="checkoutDate" required>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label  class="form-label" style="font-weight:500;">Adult</label>
                            <select class="form-select" >
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            <label  class="form-label" style="font-weight:500;">Chldren</label>
                            <select class="form-select" >
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="col-lg-1 mb-lg-3 mt-2">
                            <button type="submit" class="btn text-white custom-bg">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end of availability -->

    <!-- Rooms -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Our Rooms</h2>
    <div class="container">
    <div class="row">
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
                        ;
                ?>
        
            <div class="col-lg-4 col-md-6 my-3">
                <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img src="<?php echo $room_thumb; ?>" class="img-fluid rounded" alt="Room Thumbnail">
                    <div class="card-body">
                      <h5 class="card-title"><?php echo $room_data['name']; ?></h5>
                      <h6 class="mb-4"><?php echo $room_data['price']; ?> per night</h6>
                      <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                      <div class="features mb-4">
                        <h6 class="mb-1">Features</h6>
                        <?php 
                                            $features = explode(',', $room_data['features']);
                                            foreach ($features as $feature) {
                                                echo "<span class='badge rounded-pill bg-light text-dark me-2'>$feature</span>";
                                            }
                                        ?>
                      </div>
                      <div class="facilities mb-5">
                        <h6 class="mb-1">Facilities</h6>
                        <?php 
                                            $facilities = explode(',', $room_data['facilities']);
                                            foreach ($facilities as $facility) {
                                                echo "<span class='badge rounded-pill bg-light text-dark me-2'>$facility</span>";
                                            }
                                        ?>
                      </div>
                      <div class="guests mb-5">
                        <h6 class="mb-1">Guests</h6>
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap"><?php echo $room_data['adult']; ?> Adults</span>
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap"><?php echo $room_data['children']; ?> Children</span>
                      </div>
                      <div class="rating mb-4">
                        <h6 class="mb-1">Rating</h6>
                        <span class="badge rounded-pill bg-ligt">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                        </span>  
                      </div>
                    <div class="d-flex justify-content-evenly mb-2">
                        <a href="#" onclick="checkLoginToBook('<?php echo $login; ?>', <?php echo $room_data['id']; ?>)" class="btn btn-sm text-white custom-bg shadow">Book Now</a>

                        <a href="room_details.php?id=<?php echo $room_data['id']; ?>" class="btn btn-sm shadow btn-outline-primary">More Details</a>
                    </div>
                      
                    </div>
                  </div>
            </div>
            <?php } ?>
            <div class="col-lg-12 text-center mt-5">
                <a href="./rooms.php" class="btn btn-sm btn-outline-primary rounded-0 fw-bold shadow">More Rooms >>>>></a>
            </div>
        </div>
    
    </div>

    <!--rooms end-->

    <!-- Facilities -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Our Facilities</h2>
    <div class="container">
        <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
            <div class="col-lg-2 cold-md-2 text-center  bg-white rounded shadow py-4 my-3">
                <img src="./images/facilities/Wifi.svg" alt="" width="80px">
                <h5 class="mt-3">Wifi</h5>
            </div>
            <div class="col-lg-2 cold-md-2 text-center  bg-white rounded shadow py-4 my-3">
                <img src="./images/facilities/AC.svg" alt="" width="80px">
                <h5 class="mt-3">AC</h5>
            </div>
            <div class="col-lg-2 cold-md-2 text-center  bg-white rounded shadow py-4 my-3">
                <img src="./images/facilities/massage.svg" alt="" width="80px">
                <h5 class="mt-3">Massage</h5>
            </div>
            <div class="col-lg-2 cold-md-2 text-center  bg-white rounded shadow py-4 my-3">
                <img src="./images/facilities/free-swimming-pool-2923391-2432965.webp" alt="" width="80px">
                <h5 class="mt-3">Swimming</h5>
            </div>
            <div class="col-lg-2 cold-md-2 text-center  bg-white rounded shadow py-4 my-3">
                <img src="./images/facilities/69840.png" alt="" width="80px">
                <h5 class="mt-3">Gym</h5>
            </div>
            <div class="col-lg-12 text-center mt-5">
                <a href="./facilities.php" class="btn btn-sm btn-outline-primary rounded-0 fw-bold shadow">More Facilities</a>
            </div>
        </div>
    </div>
    <!-- Facilities Ends-->

    <!--Testimonials  -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Testimonials</h2>
    
    <div class="container">
        <div class="swiper swiper-testmonials">
            <div class="swiper-wrapper mb-5">
                <?php 
                    $message_res = select("SELECT * FROM `user_queries` WHERE `seen`=?", [1], 'i');
                    while($message_data = mysqli_fetch_assoc($message_res)){
                ?>
                <div class="swiper-slide bg-light p-4">
                    <div class="profile d-flex align-items-center mb-3">
                        <img src="./images/facilities/TV.svg" alt="" width="30px">
                        <h6 class="m-0 ms-2"><?php echo $message_data['name']; ?></h6>
                    </div>
                    <p><?php echo $message_data['message']; ?>.</p>
                    <div class="rating">
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                        <i class="bi bi-star-fill text-warning"></i>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="col-lg-12 text-center mt-5">
            <a href="./about.php" class="btn btn-sm btn-outline-primary rounded-0 fw-bold shadow">Know More</a>
        </div>
    </div>

    <!-- Testimonials end -->

    <!-- Reach US -->
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold">Reach US</h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 p-4 bg-white mb-3 rounded">
                <iframe class="w-100 rounded" height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109744.22709325235!2d76.6883122770574!3d30.732254422147673!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed0be66ec96b%3A0xa5ff67f9527319fe!2sChandigarh!5e0!3m2!1sen!2sin!4v1711888166252!5m2!1sen!2sin"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="col-lg-4 col-md-4 rounded mb-4">
                <div class="bg-white rounded mb-4">
                    <h5>Call US</h5>
                    <a href="tel:+914314315353" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+914314315353
                    </a>
                    <br>
                    <a href="tel:+914314315353" class="d-inline-block  text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+914314315353
                    </a>
                </div>

                <div class="bg-white rounded mb-4">
                    <h5>Follow US</h5>
                    <a href="#" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-twitter-x me-1"></i>
                            Twitter
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block mb-3 ">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-instagram me-1"></i>
                            Instagram
                        </span>
                    </a>
                    <br>
                    <a href="#" class="d-inline-block  ">
                        <span class="badge bg-light text-dark fs-6 p-2">
                            <i class="bi bi-facebook me-1"></i>
                            Facebook
                        </span>
                    </a>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!--Reach us end-->

    <!--Footer-->
    <?php require('inc/footer.php'); ?>
    <!--Footer end-->

    <!-- Bootstrap bundle js file -->
    
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        //coursal
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            autoplay: {
                delay: 4500,
                disableOnInteraction: false,
            },
        });
        //testmonials
        var swiper = new Swiper(".swiper-testmonials", {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: "auto",
            slidesPerView: "3",
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
            pagination: {
                el: ".swiper-pagination",
            },
            breakpoints:{
                320:{
                    slidesPerView:1,
                },
                640:{
                    slidesPerView:1,
                },
                768:{
                    slidesPerView:2,
                },
                1024:{
                    slidesPerView:3,
                },
            }
        });
    </script>
</body>
</html>
