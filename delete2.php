<?php
include('connect.php');
if(!isset($_COOKIE['user_id'])){
    header('location:index.php');
}else{
$id=filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT); //$_GET['id'];
    $sql="DELETE FROM `class2` WHERE id=$id";
    if(mysqli_query($conn,$sql)){
        header('location:edit2.php');
    }else{
        echo "Failed to delete data. " . mysqli_error($conn);
    }
}
?>
<html>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
</html>