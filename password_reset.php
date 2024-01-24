<?php
include('connect.php');
$eml="";
$email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);
if(isset($_POST['submit'])){
if(filter_var($email,FILTER_VALIDATE_EMAIL) !== false){
    
    //echo "<b>Email ipo sawa </b>";
    $email_length=strlen($email);
    
    if($email_length>8){
       
        //Tunaencrypt email
        $data=$email; include 'encrypt.php'; $email2=$encrypt;
        
        //echo $email2;
        //Tunaangalia kama user anaetaka ku re-set password alishajiunga kabla kwenye website yetu ndipo tumtumie email.
        
        $sql=$conn->prepare("select count(id) as `total_email` from user2 where email=?");
        $sql->bind_param("s",$email2);
        $sql->execute();
        $result=$sql->get_result();
        while($rows=$result->fetch_assoc()){
            
            $total_email=$rows['total_email'];
                
                if($total_email>0){
                    
                    //Tunatengeneza OTP na muda wa expiration time.
                    $current_time=time();
                    $expiration=$current_time + 300;
                    $otp=rand(111111,999999);
                    $user_email=$email;
                    
                    
                    //Tunaweka taarifa za OTP kwenye database yetu/table yetu ya verification.
                    $stmt=$conn->prepare("insert into `verification` (user_email,expiration,otp) values (?,?,?)");
                    $stmt->bind_param("sii",$email2,$expiration,$otp);
                    if($stmt->execute()){
                        
                        //header('location:otp_input.php');
                    $to=$email;
                    $from='fultonsheen non_reply';
                    $subject="Habari, karibu Fultonsheen pre & primary school";    
                    $message="Ndg:- $email usitume code hizi kwa mtu yeyote na utapaswa kutumia OTP hizi ndani ya dakika 5 kuanzia sasa; Tafadhali copy OTP $otp na u past kwenye ukurasa wa wavuti.";
                    $header="From: " . $from;
                    //echo $message; 
                        if(mail($to,$subject,$message,$header)){
                            
                            header('location:notification.php');
                        
                        }else{
                            
                            //$eml= "<b style=\"color:maroon; font-size:17px;\">Tumeshindwa kutuma email tafadhali jaribu tena wakati mwingine</b>". "**"."<br/><br/>";
                            header('location:notification.php');
                            
                            setcookie('otp',$otp);
                            setcookie('user_email',$email2);
                        }
                    
                        
                    }else{
                        
                        $eml= "<b style=\"color:maroon; font-size:17px;\">Kunatatizo tafadhali jaribu tena baadae.</b>". "**"."<br/><br/>";
                    }
                        
                }else{
                
                $eml= "<b style=\"color:maroon; font-size:17px;\">Hakuna mtumiaji wa email $email </b>". "**"."<br/><br/>";
            }
        }
        
    }else{
        $eml= "<b style=\"color:maroon; font-size:17px;\">Email yako ina charactor chini ya 8<?b>". "**"."<br/><br/>";
    }
}else{
    
    $eml= "<b style=\"color:maroon; font-size:17px;\">Tafadhali andika Email kwa usahihi </b>". "**"."<br/><br/>";
}
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>
        user email
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
        input[type=text],input[type=email],input[type=tel],input[type=password]{
            height:30px;
            width:70%;
            margin-top: 11px;
            text-align: center;
            background: yellow;
            border:none;
            box-shadow:1px 1px 1px 1px white;
            border-radius:14px;
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
    <legend><small style="background:blue; padding:4px; color:white; font-family:Tahoma;">password Re-set</small></legend>
    <div id="form">
        <br/>
        
        <span>
          <?php echo $eml; ?>
        </span>
        
        <form action="" method="POST">

            <div>
                <label id="lebo" for="email">INGIZA EMAIL YAKO</label><br/>
                <input type="email" name="email" placeholder="Weka email yako..." id="email" required="required"/>
            </div>
            <br/>

            <div>
                <button id="button" type="submit" name="submit">Tuma</button>
            </div>
        </form>
    </div>
</fieldset>
</body>
</html>