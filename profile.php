<?php 
    // require('admin/inc/db_config.php');    
    // require('admin/inc/essentials.php');
?>  

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hotel Profile</title>
<?php require('inc/links.php'); ?>
<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .card-animation {
        animation: fadeIn 0.5s ease-in-out;
    }
</style>
</head>
<body>
<?php require('inc/header.php'); ?>
<div class="container mt-5">
    
    <?php
    if(isset($_SESSION['login']) && $_SESSION['login'] === true) {
        $userName = $_SESSION['uName'];
        $userPhone = $_SESSION['uPhone'];
        $userEmail = $_SESSION['uEmail'] ;
        $userAddress =$_SESSION['uAddress'];
        $userdob = $_SESSION['uDob'];

        echo "<div class='card text-center card-animation'>";
        echo "<div class='card-header'>";
        echo "<h1>Welcome, $userName!</h1>";
        echo "</div>";
        echo "<div class='card-body'>";
        echo "<h5 class='card-title'>Your Information</h5>";
        echo "<div class='row'>";
        echo "<div class='col-md-6'>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h6 class='card-subtitle mb-2 text-muted'><i class='bi bi-envelope'></i> Email:</h6>";
        echo "<p class='card-text'>$userEmail</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='col-md-6'>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h6 class='card-subtitle mb-2 text-muted'><i class='bi bi-phone'></i> Phone Number:</h6>";
        echo "<p class='card-text'>$userPhone</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='row mt-3'>";
        echo "<div class='col-md-6'>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h6 class='card-subtitle mb-2 text-muted'><i class='bi bi-house'></i> Address:</h6>";
        echo "<p class='card-text'>$userAddress</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='col-md-6'>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<h6 class='card-subtitle mb-2 text-muted'><i class='bi bi-calendar'></i> Date of Birth:</h6>";
        echo "<p class='card-text'>$userdob</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    } 
    else {
        echo "<p class='text-danger'>You are not logged in.</p>";
    }
    ?>
</div>


</body>
</html>
