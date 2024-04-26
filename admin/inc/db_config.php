<?php 
    $hname = 'localhost';
    $uname = "root";
    $pass = '';
    $db = 'hbwebsite';

    $con = mysqli_connect($hname,$uname,$pass,$db);

    if(!$con){
        die("Cannot connect to database: " . mysqli_connect_error());
    }

    function filteration($data){
        foreach($data as $key => $value){
            $value = trim($value);
            $value = stripslashes($value);
            $value = strip_tags($value);
            $value = htmlspecialchars($value);

            $data[$key] = $value; 
        }
        return $data;
    }

    // function select($sql,$values = [], $datatypes = '')
    // {
    //     $con = $GLOBALS['con'];
    //     if($stmt = mysqli_prepare($con,$sql)){
    //         mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
    //         if(mysqli_stmt_execute($stmt)){
    //            $res= mysqli_stmt_get_result($stmt);
    //            mysqli_stmt_close($stmt);
    //            return $res;
    //         }
    //         else{
    //             mysqli_stmt_close($stmt);
    //             die("Query cannot be executed - SELECT");
    //         }   
    //     }
    //     else{
    //         die("Query cannot be prepared - SELECT");
    //     }
    // }

    function select($sql, $values = [], $datatypes = '')
    {
        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) {
            if (!empty($values) && !empty($datatypes)) {
                mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            }
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - SELECT");
            }
        } else {
            die("Query cannot be prepared - SELECT");
        }
    }

    function update($sql,$values,$datatypes)
    {
        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            }
            else{
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - Update");
            }   
        }
        else{
            die("Query cannot be prepared - Update");
        }
    }

    function insert($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);

            // Execute statement
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_affected_rows($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query execution failed - INSERT: " . mysqli_error($con));
            }
        } else {
            die("Query preparation failed - INSERT: " . mysqli_error($con));
        }
    }

    function selectAll($sql, $values, $datatypes)
    {
        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) {
            if (!empty($datatypes)) {
                mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            }
            if (mysqli_stmt_execute($stmt)) {
                $res = mysqli_stmt_get_result($stmt);
                mysqli_stmt_close($stmt);
                return $res;
            } else {
                mysqli_stmt_close($stmt);
                die("Query cannot be executed - SELECT");
            }
        } else {
            die("Query cannot be prepared - SELECT");
        }
    }

    function deleteImage($image_name, $folder) {
        $image_path = UPLOAD_IMAGE_PATH . $folder . $image_name;
        if (file_exists($image_path)) {
            return unlink($image_path); // Delete the file
        }
        return false; // File doesn't exist or couldn't be deleted
    }

    function delete($sql, $values, $datatypes) {
        $con = $GLOBALS['con'];
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_close($stmt);
                return true; // Deletion successful
            } else {
                mysqli_stmt_close($stmt);
                return false; // Deletion failed
            }
        } else {
            return false; // Query preparation failed
        }
    }
    


?>
