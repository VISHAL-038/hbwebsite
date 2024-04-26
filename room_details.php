<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel - Rooms Detail</title>
    <?php require('inc/links.php'); ?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin-top: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #333;
        }

        .features, .facilities, .description, .guests {
            margin-bottom: 20px;
        }

        .badge {
            background-color: #f0f0f0;
            color: #333;
            font-size: 12px;
            margin-right: 5px;
        }

        .custom-bg {
            background-color: #007bff;
            border-color: #007bff;
        }

        .custom-bg:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .card-img {
             transition: transform 0.3s ease;
        }

        .card-img:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <?php require('inc/header.php'); ?>

    <!-- Rooms -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <?php 
                    // Check if the 'id' parameter is set in the URL
                    if(isset($_GET['id'])) {
                        $room_id = $_GET['id'];
                        $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?", [$room_id, 1, 0], 'iii');
                        
                        if(mysqli_num_rows($room_res) > 0) {
                            $room_data = mysqli_fetch_assoc($room_res);
                            
                            // Use prepared statement to prevent SQL injection
                            $image_q = select("SELECT * FROM `room_image` WHERE `room_id`=?", [$room_data['id']], 'i');
                            
                            // Display room name heading
                            echo "<h2 class='text-center mb-4 mt-3'>" . $room_data['name'] . "</h2>";

                            // Display all images related to the room
                            echo "<div class='card mb-0'>
                                    <div class='row justify-content-center'>";
                            while($image_data = mysqli_fetch_assoc($image_q)) {
                                $image_path = ROOM_IMG_PATH . $image_data['image'];
                                echo "<div class='col-md-4'><img src='$image_path' class='img-fluid rounded card-img' alt='Room Image'></div>";
                            }
                            echo "</div></div><br>";

                            // Display other room details
                            echo "<div class='card  mb-4'>
                                    <div class='row g-0 align-items-center'>
                                        <div class='col-md-7'>
                                            <div class='card-body'>
                                                <div class='features mb-3'>
                                                    <h6 class='mb-1'>Features</h6>";
                            $features = explode(',', $room_data['features']);
                            foreach ($features as $feature) {
                                echo "<span class='badge'>$feature</span>";
                            }
                            echo "</div>
                                                <div class='facilities mb-3'>
                                                    <h6 class='mb-1'>Facilities</h6>";
                            $facilities = explode(',', $room_data['facilities']);
                            foreach ($facilities as $facility) {
                                echo "<span class='badge'>$facility</span>";
                            }
                            echo "</div>
                                                <div class='description mb-3'>
                                                    <h6 class='mb-1'>About room</h6>
                                                    <p>" . $room_data['description'] . "</p>
                                                </div>
                                                <div class='guests'>
                                                    <h6 class='mb-1'>Guests</h6>
                                                    <span class='badge'>" . $room_data['adult'] . " Adults</span>
                                                    <span class='badge'>" . $room_data['children'] . " Children</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-md-5'>
                                            <div class='card-body text-center'>
                                                <h6 class='card-title'>₹ " . $room_data['price'] . " per night</h6>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>";
                        } else {
                            echo "Room not found";
                        }
                    } else {
                        echo "Room ID not provided";
                    }
                ?>
                <!-- // <a href='#' class='btn btn-primary btn-sm custom-bg shadow mb-2 w-100'>Book Now</a> -->
            </div>
        </div>
    </div>

    <?php require('inc/footer.php'); ?>
    
</body>
</html>
