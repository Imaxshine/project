<?php
error_reporting(0);
if(isset($_POST['submit'])){
    require_once('connect.php');
    $id=filter_input(INPUT_POST,"id",FILTER_SANITIZE_NUMBER_INT); //$_POST['id'];
    $pupil=filter_var($_POST['pupil'], FILTER_SANITIZE_STRING);
    $parent=filter_var($_POST['parent'], FILTER_SANITIZE_STRING);
    $sur_name=filter_input(INPUT_POST,'surname',FILTER_SANITIZE_STRING);
    $gender=$_POST['gender'];
    $kisw=$_POST['kiswahili'];
    $mathe=$_POST['mathe'];
    $eng=$_POST['english'];
    $scie=$_POST['scie'];
    $geo=$_POST['geo'];
    $histry=$_POST['histry'];
    $civic=$_POST['civic'];
    $updated=date('d/M/Y');
    
    $mwanafunzi=strtoupper($pupil);
    $mzazi=strtoupper($parent);
    $gender2=strtoupper($gender);
    $surname=strtoupper($sur_name);
    
    if($kisw<0 || $mathe<0 || $eng<0 || $scie<0 || $geo<0 || $histry<0 || $civic<0){
    echo "Such of your marks is lowest than minmum marks (0).";
}elseif($kisw>50 || $mathe>50 || $eng>50 || $scie>50 || $geo>50 || $histry>50 || $civic>50){
    echo "Such of your marks is exceed maxmum (50) Marks. Please re-write again";
}else{

        if($gender=='FEMALE' || $gender=='MALE'){
     $sql=$conn->prepare("UPDATE class7 SET pupil=?,parent=?,surname=?,gender=?,kisw=?,his=?,eng=?,scie=?,geo=?,histry=?,civic=?,updated=? WHERE uniqid=?");
    $sql->bind_param("ssssiiiiiiisi",$mwanafunzi,$mzazi,$surname,$gender2,$kisw,$mathe,$eng,$scie,$geo,$histry,$civic,$updated,$id);
    if($sql->execute()){
        header('location:edit7.php');
    }else{
        echo "Failed to edit " . mysqli_error($sql);
    }   
    }else{
        echo "Uknown gender!. Only MALE and FEMALE acceptable in capital letters.";
    }
    }
}
?>
<html>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
</html>