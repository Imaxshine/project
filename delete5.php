<?php
include('connect.php');
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
if(!isset($_COOKIE['user_id'])){
    header('location:dash.php');
}else {
    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT); //$_GET['id'];
    $sql = "DELETE FROM `class5` WHERE uniqid=$id";
    if (mysqli_query($conn, $sql)) {
        header('location:edit5.php');
    } else {
        echo "Failed to delete data. " . mysqli_error($conn);
    }
}
?>
<html>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
</html>