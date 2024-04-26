<?php require('inc/db_config.php');
    require('inc/essentials.php'); 
    session_start();
    
    if((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin']==true)){
        redirect('dashboard.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Panel</title>
    <?php require('inc/links.php'); ?>
    <style>
        div.login-form{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            width: 400px;
        }
    </style>
</head>
<body>
    <div class="login-form text-center rounded bg-white shadow overflow-hidden">
        <form method="POST">
            <h4 class="bg-dark text-white py-3">ADMIN LOGIN PANEL</h4>
            <div class="p-4">
                <div class="mb-3">
                    <input name="admin_name" required type="text" class="form-control text-center"
                    placeholder="Admin Name">
                </div>
                <div class="mb-4">
                    <input name="admin_pass" type="password" required class="form-control text-center" 
                    placeholder="Password">
                </div>
                <button name="login" class="btn text-white custom-bg" type="submit">Login</button>
            </div>
        </form>
    </div>

    <?php 
        if(isset($_POST['login']))
        {
            $frm_data = filteration($_POST);
            // echo"<h1>$frm_data[admin_name]</h1>";
            // echo"<h1>$frm_data[admin_pass]</h1>";
            // print_r($frm_data );

            $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";
            $values = [$frm_data['admin_name'],$frm_data['admin_pass']];
            $datatypes="ss";

            $res=select($query,$values,$datatypes);
            // print_r($res);
            if($res->num_rows==1){
                // echo"got user";
                $row = mysqli_fetch_assoc($res);
                // session_start();
                $_SESSION['adminLogin'] = true;
                $_SESSION['adminID']=$row["sr_no"];
                redirect('dashboard.php');
            }
            else{
                alert('error', 'Login failed - invalid credentials');
            }
        }
    ?>

    <?php require('inc/scripts.php'); ?>
</body>
</html>
