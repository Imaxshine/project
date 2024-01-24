<?php
include('connect.php');
if(!isset($_COOKIE['user_id'])){ //ADMIN_FORM
    header('location:dash.php');
}elseif(!isset($_COOKIE['id'])){ //INDEX
  header('location:dash.php');  
}else{
$id=filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT); //$_GET['id'];
    
    $sql=$conn->prepare("DELETE FROM `class6` WHERE uniqid=?");
    
    $sql->bind_param("i",$id);
    if($sql->execute()){
    
        header('Location:edit6.php');
    
    }else{?>
     
    <script>
     alert('Failed try again later!!');
   </script>
    
<?php
    }
}
?>
<html>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
</html>