<?php
include('connect.php');
if(!isset($_COOKIE['user_id'])){ //ADMIN_FORM
    header('location:dash.php');
}elseif(!isset($_COOKIE['id'])){ //INDEX
  header('location:dash.php');  
}else{
$id=filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT); //$_GET['id'];
    
    $sql=$conn->prepare("DELETE FROM `class7` WHERE uniqid=?");
    
    $sql->bind_param("i",$id);
    
    if($sql->execute()){
        
        header('Location:edit7.php');
    }else{?>
        <script>
            window.alert('Failed to delete data, try again later');
        </script>
        
    <?php    
    }
    /*if(mysqli_query($conn,$sql)){
        header('location:edit7.php');
    }else{
        echo "Failed to delete data. " . mysqli_error($conn);
    }*/
}
?>
<html>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
</html>