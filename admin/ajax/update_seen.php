<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if(isset($_POST['sr_no']) && isset($_POST['seen'])) {
    $sr_no = $_POST['sr_no'];
    $seen = $_POST['seen'];

    // Update the 'seen' value in the database
    $sql = "UPDATE `user_queries` SET `seen` = $seen WHERE `sr_no` = $sr_no";
    $res = query($sql);

    if ($res) {
        echo "success";
    } else {
        // Log the actual error message from the database query for debugging
        error_log("Error: " . mysqli_error($conn));
        echo "error";
    }
} else {
    echo "error";
}
?>
