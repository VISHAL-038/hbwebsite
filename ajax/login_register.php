<?php 
    require('../admin/inc/db_config.php');
    require('../admin/inc/essentials.php');

    if(isset($_POST['register'])) {
        $data = filteration($_POST);

        if($data['pass'] != $data['cpass']) {
            echo 'Password mismatch';
            exit;
        }

        $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1", [$data['email'], $data['phonenum']], 'ss');

        if(mysqli_num_rows($u_exist) != 0) {
            echo 'Email or phone number already registered';
            exit;
        }

        $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `password`) VALUES (?,?,?,?,?,?,?)";

        $values = [$data['name'], $data['email'], $data['address'], $data['phonenum'], $data['pincode'], $data['dob'], $data['pass']];

        if(insert($query, $values, 'sssssss')) {
            echo 'Registration Successful';
        } else {
            echo 'Registration failed. Please try again later.';
        }
    } 

    if(isset($_POST['login']))
    {
        $data = filteration($_POST);

        $u_exist = select("SELECT * FROM `user_cred` WHERE `email`=? OR `phonenum`=? LIMIT 1", [$data['email_mob'], $data['email_mob']], 'ss');

        if(mysqli_num_rows($u_exist) == 0) {
            echo 'inv_email_mob';
        }
        else{
           $u_fetch = mysqli_fetch_assoc($u_exist);
           if($u_fetch['status']==0){
            echo 'inactive';
           } 
           else{
            if($data['pass'] !== $u_fetch['password']){
                echo 'incorrect_pass';
            }else{
                session_start();
                $_SESSION['login']=true;
                $_SESSION['uid']= $u_fetch['id'];
                $_SESSION['uName']= $u_fetch['name'];
                $_SESSION['uPhone']= $u_fetch['phonenum'];
                echo 1;
           }
        }
    }

        

    }
?>
