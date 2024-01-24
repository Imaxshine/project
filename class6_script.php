<?php
error_reporting(E_ALL ^ E_NOTICE);
?>
<?php
include_once 'connect.php';
$pupil=filter_var($_POST['pupil'], FILTER_SANITIZE_STRING);
$parent=filter_var($_POST['parent'], FILTER_SANITIZE_STRING);
$sur_name=filter_input(INPUT_POST,"surname",FILTER_SANITIZE_STRING);
$gender=$_POST['gender'];
$kisw=$_POST['kisw'];
$his=$_POST['his'];
$eng=$_POST['eng'];
$scie=$_POST['scie'];
$geo=$_POST['geo'];
$histry=$_POST['histry'];
$civic=$_POST['civic'];
$uniqid=rand();
$posted=date('d/M/Y');

$mwanafunzi=strtoupper($pupil);
$mzazi=strtoupper($parent);
$gender1=strtoupper($gender);
$surname=strtoupper($sur_name);

if($kisw<0 || $his<0 || $eng<0 || $scie<0 || $geo<0 || $histry<0 || $civic<0){
    echo "Such of your marks is lowest than minmum marks (0).";
}elseif($kisw>100 || $his>100 || $eng>100 || $scie>100 || $geo>100 || $histry>100 || $civic>100){
    echo "Such of your marks is exceed maxmum (100) Marks. Please re-write again";
}else{
 
    $error=mysqli_query($conn,"SELECT * FROM class6 WHERE pupil='$mwanafunzi' AND parent='$mzazi'");
if(mysqli_num_rows($error)==0){
    $sql=$conn->prepare("INSERT INTO class6 (uniqid,pupil,parent,surname,gender,kisw,his,eng,scie,geo,histry,civic,posted) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $sql->bind_param("issssiiiiiiis",$uniqid,$mwanafunzi,$mzazi,$surname,$gender1,$kisw,$his,$eng,$scie,$geo,$histry,$civic,$posted);
    if($sql->execute()){
        header('location:class6.php');
    }else{
        echo "Failed " . mysqli_error($sql);
    }
}else{
    echo "pupil and parent name already inserted, add a new once.";
}
}
?>
<html>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
</html>