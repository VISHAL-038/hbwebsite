<?php  
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();


if(isset($_POST['get_users']))
{
    // Assuming 'select' is a function that executes the query and returns the result
    $sql = "SELECT * FROM `user_cred`";
    $res = select($sql); // Using prepared statements is recommended

    $i = 1; // Start from 1
    $data = "";
    while($row = mysqli_fetch_assoc($res)){
        // Escape HTML entities
        $name = htmlspecialchars($row['name']);
        $email = htmlspecialchars($row['email']);
        $phonenum = htmlspecialchars($row['phonenum']);
        $address = htmlspecialchars($row['address']);
        $pincode = htmlspecialchars($row['pincode']);
        $dob = htmlspecialchars($row['dob']);
        $datentime = htmlspecialchars($row['datentime']);

        $data .= "
            <tr>
                <td>$i</td>
                <td>$name</td>
                <td>$email</td>
                <td>$phonenum</td>
                <td>$address | $pincode</td>
                <td>$dob</td>
                <td><button type='button' class='btn btn-dark btn-sm'>Active</button></td> 
                <td>$datentime</td>
                <td><button type='button' class='btn btn-danger shadow btn-sm''>action</button></td> 
            </tr>
        ";   
        $i++;
    }
    echo $data;
}





// if(isset($_POST["toggleStatus"])) {
//     $frm_data = filteration($_POST);

//     $q="UPDATE  `rooms` SET `status`=? WHERE `id`=?";
//     $v=[$frm_data['value'],$frm_data['toggleStatus']];
//     if(update($q,$v,'ii')){
//         echo 1;
//     }
//     else{
//         echo 0;
//     }
// }

// if(isset($_POST["remove_room"])) {
//     $frm_data = filteration($_POST);

//     $res1 = select("SELECT * FROM `room_image` WHERE`room_id`=?",[$frm_data['room_id']],'i');

//     while($row = mysqli_fetch_assoc($res1)){
//         deleteImage($row['image'],ROOMS_FOLDER);
//     }

//     $res2 = delete("DELETE FROM `room_image` WHERE `room_id`=?",[$frm_data['room_id']],'i');
//     $res3 = update("UPDATE `rooms` SET `removed`=? WHERE `id`=?", [1, $frm_data['room_id']], 'ii');
    
//     if($res2 || $res3){
//         echo 1;
//     }
//     else{
//         echo 0;
//     }

// }
?>
