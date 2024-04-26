<?php  
require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();

if(isset($_POST['add_room']))
{
    $frm_data = filteration($_POST);
    $flag = 0;
    
    $ql = "INSERT INTO `rooms`(`name`, `area`, `price`, `quantity`, `adult`, `children`, `description`, `features`, `facilities`) VALUES (?,?,?,?,?,?,?,?,?)";
    $values = [$frm_data["name"], $frm_data["area"], $frm_data["price"],$frm_data["quantity"],$frm_data["adult"],$frm_data["children"],$frm_data["description"], $frm_data["features"], $frm_data["facilities"]];
    $result = insert($ql, $values, 'siiiiisss');

    if($result) {
        $flag = 1;
    } else {
        // Handle query execution failure
        echo "Error: Failed to insert room.";
    }
}

if(isset($_POST['get_all_rooms']))
{
    $sql = "SELECT * FROM `rooms` WHERE `removed`=?" ;
    $res = select($sql, [0], 'i');
    $i=0;
    $data = "";
    while($row=mysqli_fetch_assoc($res)){
        if($row['status']==1){
            $status = "
            <button onClick='toggleStatus($row[id],0)' class='btn btn-dark btn-sm'>active</button>";
        }
        else{
            $status = "
            <button onClick='toggleStatus($row[id],1)' class='btn btn-warning btn-sm'>inactive</button>";
        }
        $data.="
            <tr class='align-middle'>
                <td>$i</td>
                <td>{$row['name']}</td>
                <td>{$row['area']}</td>
                <td>
                    <span class='badge rounded-pill bg-light text-dark'>
                        Adult : {$row['adult']}
                    </span><br>
                    <span class='badge rounded-pill bg-light text-dark'>
                        Children : {$row['children']}
                    </span>
                </td>
                <td>{$row['price']}</td>
                <td>{$row['quantity']}</td>                
                <td>$status</td>
                <td>
                    <button type='button' onclick=\"room_images($row[id],'$row[name]')\" class='btn btn-primary shadow btn-sm' data-bs-toggle='modal' data-bs-target='#room-images'><i class='bi bi-images'></i><button>

                    <button type='button' onclick=remove_room($row[id]) class='btn btn-danger shadow btn-sm'><i class='bi bi-trash'></i><button>
                </td>                
            </tr>
        ";
        $i++;
    }
    echo $data;
}

if(isset($_POST['add_image']))
{
    $frm_data = filteration($_POST);

    $img_r = uploadImage($_FILES['image'],ROOMS_FOLDER);

    if($img_r == 'inv_img'){
        echo $img_r;
    }
    else if($img_r == 'inv_size'){
        echo $img_r;
    }
    else if($img_r == 'upd_failed'){
        echo $img_r;
    }
    else{
        $q="INSERT INTO `room_image`( `room_id`, `image`) VALUES (?,?)";
        $values = [$frm_data['room_id'],$img_r];
        $res = insert($q,$values,'is');
        echo $res;
    }
}

if(isset($_POST['get_room_images']))
{
    $frm_data = filteration($_POST);
    $res = select("SELECT * FROM `room_image` WHERE `room_id`=?",[$frm_data['get_room_images']],'i');

    $path = ROOM_IMG_PATH;

    while($row = mysqli_fetch_assoc($res))
    {
        if($row['thumb']==1){
            $thumb_btn = "<i class='bi bi-check-lg text-light bg-success px-2 py-1 rounded shadow fs-5'></i>";
        }
        else{
            $thumb_btn = "<button onclick='thumb_image($row[sr_no],$row[room_id])' class='btn btn-secondary  shadow'>
            <i class='bi bi-check-lg'></i>
            </button>";
        }
        echo<<<data
            <tr class='align-middle'>
                <td><img src='$path$row[image]' class='img-fluid'></td>
                <td>$thumb_btn</td>
                <td>
                    <button onclick='rem_image($row[sr_no],$row[room_id])' class='btn btn-warning  shadow'>
                        <i class='bi bi-trash'></i>
                    </button>
                </td>
            </tr>
        data;
    }
}

if(isset($_POST['rem_image']))
{
    $frm_data = filteration($_POST);
    $values = [$frm_data['image_id'],$frm_data['room_id']];

    $pre_q = "SELECT * FROM `room_image` WHERE `sr_no`=? AND `room_id`=?";
    $res = select($pre_q,$values,'ii');
    $img = mysqli_fetch_assoc($res);

    if(deleteImage($img['image'],ROOMS_FOLDER)){
        $q = "DELETE FROM `room_image` WHERE `sr_no`=? AND `room_id`=?";
        $res = delete($q,$values,'ii');
        echo $res;
    }
    else{
        echo 0;
    }
}

if(isset($_POST['thumb_image']))
{
    $frm_data = filteration($_POST);
    
    $pre_q = "UPDATE `room_image` SET `thumb`=? WHERE `room_id`=?";
    $pre_v = [0,$frm_data['room_id']];
    $pre_res = update($pre_q,$pre_v,'ii');

    $q = "UPDATE `room_image` SET `thumb`=? WHERE `sr_no`=? AND `room_id`=?";
    $v = [1,$frm_data['image_id'],$frm_data['room_id']];
    $res = update($q,$v,'iii');

    echo $res;

}

if(isset($_POST["toggleStatus"])) {
    $frm_data = filteration($_POST);

    $q="UPDATE  `rooms` SET `status`=? WHERE `id`=?";
    $v=[$frm_data['value'],$frm_data['toggleStatus']];
    if(update($q,$v,'ii')){
        echo 1;
    }
    else{
        echo 0;
    }
}

if(isset($_POST["remove_room"])) {
    $frm_data = filteration($_POST);

    $res1 = select("SELECT * FROM `room_image` WHERE`room_id`=?",[$frm_data['room_id']],'i');

    while($row = mysqli_fetch_assoc($res1)){
        deleteImage($row['image'],ROOMS_FOLDER);
    }

    $res2 = delete("DELETE FROM `room_image` WHERE `room_id`=?",[$frm_data['room_id']],'i');
    $res3 = update("UPDATE `rooms` SET `removed`=? WHERE `id`=?", [1, $frm_data['room_id']], 'ii');
    
    if($res2 || $res3){
        echo 1;
    }
    else{
        echo 0;
    }

}
?>
