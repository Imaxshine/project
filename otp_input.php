<?php
include 'connect.php';
$otp_msg="";
if(!isset($_COOKIE['user_email'])){
    header('Location:password_reset.php');
    exit();
}else{
 if (isset($_POST['otp'])) {
     $otp = filter_input(INPUT_POST, "otp", FILTER_SANITIZE_NUMBER_INT);
     $user_email = $_COOKIE['user_email'];
     //echo $user_email;
     //Tunaenda kuangalia kama otp,email na expiration kisha tumpe option ya ku update password.
     $sql = $conn->prepare("select count(id) as `total_otp`,id,user_email,expiration,otp from verification where otp=?");
     $sql->bind_param("i", $otp);
     $sql->execute();
     $result = $sql->get_result();
     while ($data = $result->fetch_assoc()) {
         $total_otp = $data['total_otp'];
         //echo $total_otp;
         if ($total_otp > 0) {
             $user_email = $data['user_email'];
             $expiration = $data['expiration'];
             $current_time = time();
             $email = $_COOKIE['user_email'];
             $secondLeft = $expiration - $current_time;
             $id=$data['id'];
             
             if ($user_email == $email) {
                 if ($secondLeft>0) {
                     //echo "OTP bado zipo updated";
                     header('Location:update.php');
                 } elseif($secondLeft<0){
                     $otp_msg = "<b style=\"color:maroon; font-size:17px;\">Your OTP is wrong or alredy expired!!</b>" . "**" . "<br/><br/>" . "<a href=\"password_reset.php\" style=\"font-size:19px; background:black; padding:6px; color:#ccc; font-style:oblique; font-weight:bold; font-family:Tahoma; text-decoration:none; border-radius:5px;\">Resend-Email</a>" . "<br/><br/>";
                 }
             } else {
                 $otp_msg = "<b style=\"color:maroon; font-size:17px;\">Invalid Information</b>" . "**" . "<br/><br/>";
             }
         } else {
             $otp_msg = "<b style=\"color:maroon; font-size:17px;\">Your OTP is wrong or alredy expired!!</b>" . "**" . "<br/><br/>" . "<a href=\"password_reset.php\" style=\"font-size:19px; background:black; padding:6px; color:#ccc; font-style:oblique; font-weight:bold; font-family:Tahoma; text-decoration:none; border-radius:5px;\">Resend-Email</a>" . "<br/><br/>";
         }
     }
 }
}
/*$delete=$conn->prepare("delete from verification where id=?");
                     $delete->bind_param("i",$id);
                     $delete->execute();*/
    ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>
        user otp
    </title>
    <!--<link rel="stylesheet" type="text/css" href="style.css"/>-->
    <style>
        @media (min-width:769px) and (max-width:1500px){
            body{
                text-align:center;
                margin-top: 70px;
                background-image: url('picha/maria2.jpeg');
                background-repeat: repeat;
                width:100%;
            }

            #field{
                width:650px;
                text-align:center;
                margin:auto;
            }

            #form{
                text-align:center;
                background-color:cadetblue;
            }

        }

        @media (max-width:768px){
            body{
                text-align:center;
                margin-top: 70px;
                background-image: url('picha/maria2.jpeg');
                background-repeat: no-repeat;
            }
            #field{
                width:auto;
                text-align:center;
                margin:auto;
            }
            #form{
                text-align:center;
                background-color:cadetblue;
            }
        }
        /*multiples*/
        input[type=number]{
            height:30px;
            width:60%;
            margin-top: 11px;
            text-align: center;
            /*background: yellow;*/
            border-color:#ccc;
            border:none;
            box-shadow:1px 1px 1px 1px white;
            color:darkslategray;
            font-family: Tahoma;
            font-weight:bold;
        }
        #lebo:hover{
            color:white;
            font-size:19px;
        }
        #button{
            margin-top:15px;
            margin-bottom:10px;
            background: blue;
            color:white;
            font-size:18px;
            border:none;
            border-radius: 12px;
            font-family: arial;
            font-weight: bold;
            padding:6px 4px;;
        }
        #button:hover{
            background: black;
            color:whitesmoke;
        }
        #form{
            padding: 12px 12px 12px 0;
        }
    </style>
</head>
<body>
<fieldset id="field">
    <br><br><br/>
    <legend><small style="background:blue; padding:4px; color:white; font-family:Tahoma;">OTP verification</small></legend>
    <div id="form">
        <br/>
        
        <form action="" method="POST">

            <div>
                <label id="lebo" for="otp">INGIZA OTP</label><br/>
                <input type="number" name="otp" id="otp" placeholder="Weka OTP za email" required="required"/>
            </div>
            <br/>
            <span>
                <?php echo $otp_msg; ?>
            </span>
            <div>
                <button id="button" type="submit" name="submit">Verify</button>
            </div>
        </form>
    </div>
</fieldset>
</body>
</html>