<?php
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if(isset($_POST['get_message']))
{
    $sql = "SELECT * FROM `user_queries`";
    $res = select($sql);

    if ($res) {
        $i=1;
        $data = "";
        while($row = mysqli_fetch_assoc($res)){
            $seenButton = $row['seen'] == 1 ? "<button onClick='toggleSeen({$row['sr_no']},0)' class='btn btn-dark btn-sm'>active</button>" : "<button onClick='toggleSeen({$row['sr_no']},1)' class='btn btn-warning btn-sm'>inactive</button>";
            $data .="
            <tr>
                <td>{$i}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['subject']}</td>
                <td>{$row['message']}</td>
                <td>{$row['date']}</td>
                <td>{$seenButton}</td>
            </tr>
            ";
            $i++;
        }
        echo $data;
    } else {
        error_log("Error: " . mysqli_error($conn));
        echo json_encode(array("error" => "Error retrieving messages."));
    }
}

if(isset($_POST['toggleSeen'])){
    $frm_data = filteration($_POST);

    $q = "UPDATE `user_queries` SET `seen`=? WHERE `sr_no`=?";
    $v = array($frm_data['value'], $frm_data['toggleSeen']);
    if(update($q, $v, 'si')){
        echo 1;
    }
    else{
        echo 0;
    }
}
?>
