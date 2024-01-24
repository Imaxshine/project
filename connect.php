<?php
define("host", 'localhost');
define("user", 'root');
define("pass", '');
define("dbname", 'shule');

$conn=new mysqli(host,user,pass,dbname);
if(!$conn){
    die('Not connect ' . mysqli_connect_error());
}else{
    //echo "Connected";
}
?>