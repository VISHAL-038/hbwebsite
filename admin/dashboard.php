<?php
require('inc/essentials.php');
adminLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel : Dashboard</title>
    <?php require('inc/links.php');?>
</head>
<body class="bg-light">
    
    <?php require('inc/header.php') ?>

    <div class="container-fluid" id="main-con">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h2>Welcome, Admin!</h2>
                <p>Here are some key metrics:</p>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Total Bookings</h5>
                                <p class="card-text">4</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Revenue</h5>
                                <p class="card-text">$1000</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Occupancy Rate</h5>
                                <p class="card-text">80%</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require('inc/scripts.php');?>
</body>
</html>
