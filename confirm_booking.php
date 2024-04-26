<!DOCTYPE html>
<html>
<head>
    <title>Confirm Booking</title>
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
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        p {
            font-size: 18px;
            margin-bottom: 20px;
        }

    </style>
</head>
<body>
    <?php require('inc/header.php'); ?>
    <div class="container">
        <?php
        // session_start();

        // Check if the user is logged in
        if(isset($_SESSION["login"]) && $_SESSION['login'] == true) {
            // User is logged in
            $login = 1;

            // Check if the room ID is provided in the URL
            if(isset($_GET['room_id'])) {
                $room_id = $_GET['room_id'];

                // Perform the booking confirmation logic here
                // For example, update the booking status in the database
                // You can also display a confirmation message to the user
                echo "<p>Booking confirmed for room ID: $room_id</p>";
            } else {
                echo "<p>Room ID not provided</p>";
            }
        } else {
            // User is not logged in
            echo "<p>Please log in to confirm your booking</p>";
        }
        ?>

        <h2>Enter Check-in and Check-out Details</h2>
        <form action="confirm_booking_details.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="checkin">Check-in Date:</label>
            <input type="date" id="checkin" name="checkin" required><br>

            <label for="checkout">Check-out Date:</label>
            <input type="date" id="checkout" name="checkout" required><br>

            <input type="hidden" name="room_id" value="<?php echo $room_id; ?>">
            <input type="submit" name="send" value="Submit">
        </form>
    </div>
    <?php require('inc/footer.php'); ?>
</body>
</html>
