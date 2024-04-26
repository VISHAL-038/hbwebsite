<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <?php require('inc/links.php'); ?>
    
    <style>
         body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        img {
            width: 100px;
            height: 100px;
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <?php require('inc/header.php'); ?>
    <div class="container">
        <?php
        if(isset($_POST['checkin']) && isset($_POST['checkout']) && isset($_POST['room_id']) && isset($_POST['name'])) {
            $checkin = $_POST['checkin'];
            $checkout = $_POST['checkout'];
            $room_id = $_POST['room_id'];
            $name = $_POST['name'];

            echo "<p>Your  booking for roomId $room_id is done from $checkin to $checkout.</p>";
            echo "<h3>";
            echo "Thank you $name for booking with us.";
            echo "</h3>";
            

            // Perform any additional processing, such as updating the database, here

            echo "
            <img src='https://cdn1.iconfinder.com/data/icons/youtuber/256/thumbs-up-like-gesture-512.png'/>
            <br>
            <p?>Our team will contact you shortly about the main confirmation and payment detail</p>";
        } else {
            echo "<p>Error: Check-in, check-out dates, or room ID not provided.</p>";
        }
        ?>
        <a href="index.php" class="btn">Go to Home Page</a>
    </div>
    
    <?php
    // session_start();
        
        if(isset($_POST['send'])){
            $frm_data = filteration($_POST);
            $q = "INSERT INTO `bookings`(`name`, `checkin_date`, `checkout_date`, `room_id`) VALUES (?,?,?,?)";
            $values = [$frm_data['name'], $frm_data['checkin'], $frm_data['checkout'], $frm_data['room_id']];
            $res = insert($q, $values, 'sssi');

            if($res==1){
                alert('success','Booking done!');
            }
            else{
                alert('server down, try again later');
            }
        }
        ?>

</body>
</html>
