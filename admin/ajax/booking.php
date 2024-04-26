<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if(isset($_POST['get_bookings']))
{
    $sql = "SELECT * FROM `bookings`";
    $res = select($sql);

    if ($res) {
        $i=1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){
            $data .="
            <tr>
                <td>{$i}</td>
                <td>{$row['room_id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['checkin_date']}</td>
                <td>{$row['checkout_date']}</td>
            </tr>
            ";
            $i++;
        }
        echo $data;
    } else {
        echo "Error retrieving bookings.";
    }
}
?>
