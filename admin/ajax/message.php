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
            $buttonClass = $row['seen'] == 0 ? 'btn-danger' : 'btn-success';
            $buttonText = $row['seen'] == 0 ? 'Mark as Seen' : 'Mark as Unseen';
            $button = "<button class='btn {$buttonClass} seen-button' data-sr_no='{$row['sr_no']}' data-seen='{$row['seen']}' onclick='toggleSeen({$row['sr_no']}, {$row['seen']})'>{$buttonText}</button>";
            $data .="
            <tr>
                <td>{$i}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['subject']}</td>
                <td>{$row['message']}</td>
                <td>{$row['date']}</td>
                <td>{$button}</td>
            </tr>
            ";
            $i++;
        }
        echo $data;
    } else {
        error_log("Error: " . mysqli_error($conn));
        echo "Error retrieving messages.";
    }
}
?>
