<?php
if(!isset($_COOKIE['user_email'])){
    header('Location:password_reset.php');
    exit();
}else{?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>
        notifications
    </title>
    <!--<link rel="stylesheet" type="text/css" href="style.css"/>-->
     <style type="text/css">
         body{
             margin-left: 10%;
         }
         #notif{
             background: black;
             width: 80%;
             /*text-align: center;*/
         }
         p{
             width: 40%;
             color:#ccc;
             /*text-align: center;*/
             margin:auto;
             padding: 15px 15px 15px 0;
             transition:font-size 1s ease 1s;
         }
         p:hover{
             font-size: 20px;
         }
         .link{
             background: rgb(244,100,80);
             padding:12px;
             margin-left: 10%;
         }
         a{
             font-family: fantasy;
             text-decoration:none; 
             transition:font-size 2s ease 2s;
         }
    </style>   
</head>
<body>
    
    <br><br/>
    
   <div id="notif">
        <p>
           Punde utakapopata OTP kutoka kwenye Email yako tafadhali utatakiwa kubofya link hapo
            chini ili kudhibitisha au (Verifying) account yako.
        </p>
   </div><br><br/>
    
    <span class="link">
        <a href="otp_input.php">Verifying</a>
    </span>
    
    <br/><br/><hr/>
    
</body>
</html>
<?php
    $otp=$_COOKIE['otp'];
    echo "Tafadhali copy OTP ". $otp;
    
}
    ?>