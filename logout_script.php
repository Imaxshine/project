<?php
//session_start();
/*unset($_SESSION['user_id']);
unset($_SESSION['user_name']);
header('location:index.php');*/
setcookie('id',$userId,time()-30);

setcookie('username',$username,time()-30);

header('location:index.php');
die();