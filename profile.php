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

        echo "<div class='card text-center'>";
        echo "<div class='card-body'>";
        echo "<h1 class='card-title mb-4'>Welcome, $userName!</h1>";
        echo "<div class='row'>";
        echo "<div class='col-md-6'>";
        echo "<h5 class='card-subtitle mb-2 text-muted'>Email:</h5>";
        echo "<p class='card-text'>$userEmail</p>";
        echo "</div>";
        echo "<div class='col-md-6'>";
        echo "<h5 class='card-subtitle mb-2 text-muted'>Phone Number:</h5>";
        echo "<p class='card-text'>$userPhone</p>";
        echo "</div>";
        echo "</div>";
        echo "<div class='row'>";
        echo "<div class='col-md-6'>";
        echo "<h5 class='card-subtitle mb-2 text-muted'>Address:</h5>";
        echo "<p class='card-text'>$userAddress</p>";
        echo "</div>";
        echo "<div class='col-md-6'>";
        echo "<h5 class='card-subtitle mb-2 text-muted'>Date of Birth:</h5>";
        echo "<p class='card-text'>$userdob</p>";
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


<?php require('inc/footer.php'); ?>
</body>
</html>
