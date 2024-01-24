<?php
include_once 'connect.php';
$name_alert="";

$email_alert="";

$phone_alert="";

$pass_alert="";

if(isset($_POST['submit'])){
    //prepare variables

    $name=$_POST['jina'];

    $email=$_POST['email'];

    $phone=$_POST['phone'];

    $pass1=$_POST['pass1'];

    $pass2=$_POST['pass2'];

    $status=1;

    $uid=sha1(uniqid());

    //tunaangalia urefu wa jina.
    $leng_name=strlen($name);

    if($leng_name<4){
        $name_alert="<b>Andika jina lenye herufi kuanzia 4</b>";
    }else{

       //Tunavalidate name
        if(preg_replace('/[A-Za-z0-9]/','',$name)){

            $name_alert="<b>Andika jina lako vizuri</b>";
        }else{

            //tunapima urefu wa Email
            $leng_email=strlen($email);

            if($leng_email<9){

                $email_alert="<b>Email yako inamaneno chini ya 10</b>";
            }elseif($leng_email>35){

                $email_alert="<b>Email yako imezidi charactor 35</b>";
            }else{

                //Tunasanitize email
                $email2=filter_var($email,FILTER_SANITIZE_EMAIL);

                //Kuthibitisha email

                if(filter_var($email2,FILTER_VALIDATE_EMAIL)===false){

                    $email_alert="<b>Andika email yako kwa usahihi</b>";
                }else{

                    //encrypt email
                    $data1=strtolower($email2);
                    $cipher='AES-128-CTR';
                    $key='encry.com_7722';
                    $option=0;
                    $iv=openssl_cipher_iv_length($cipher);
                    $iv_encrypted='1234512345123456';
                    $encrypt=openssl_encrypt($data1,$cipher,$key,$option,$iv_encrypted);
                    $email3=$encrypt;

                    //tunafilter jina

                    $name2=filter_var($name,FILTER_SANITIZE_STRING);

                    //Tunaencrypt jina

                    $data2=strtolower($name2);
                    $cipher='AES-128-CTR';
                    $key='encry.com_7722';
                    $option=0;
                    $iv=openssl_cipher_iv_length($cipher);
                    $iv_encrypted='1234512345123456';
                    $encrypt=openssl_encrypt($data2,$cipher,$key,$option,$iv_encrypted);
                    $name3=$encrypt;

                    //Tunaangaalia urefu wa namba za simu
                    $leng_phone=strlen($phone);

                    if($leng_phone<10){

                        $phone_alert="<b>Samahani namba zako za simu hazijatimia</b>";

                    }elseif ($leng_phone>10){

                        $phone_alert="<b>Samahani namba zako za simu zimezidi kiwango halisi, andika namba 10 tu</b>";

                    }else{

                        //Tunasanitize namba za simu
                        $phone2=filter_var($phone,FILTER_SANITIZE_NUMBER_INT);

                        //Tunaencrypt namba za simu
                        $data3=$phone2;
                        $cipher='AES-128-CTR';
                        $key='encry.com_7722';
                        $option=0;
                        $iv=openssl_cipher_iv_length($cipher);
                        $iv_encrypted='1234512345123456';
                        $encrypt=openssl_encrypt($data3,$cipher,$key,$option,$iv_encrypted);
                        $phone3=$encrypt;

                        //Tunaencrypt date
                        $date=date('d-m-Y');

                        ///Tunalinganisha password
                        if(strcmp($pass1,$pass2)!==0){

                            $pass_alert="<b>Umekosea, neno siri uliloingiza hayafanani</b>";

                        }else{

                            //Tunafilter password
                            $password=filter_var($pass1,FILTER_SANITIZE_STRING);

                            //Tunaangalia urefu wa password

                            $pass_leng=strlen($password);

                            if($pass_leng<5){

                                $pass_alert="<b style=\"color:maroon; font-size:17px;\">Samahani, nenosiri liwe na namba au herufu kuanzia 5</b>";

                            }elseif ($pass_leng>15){

                                $pass_alert="<b>Neno siri lisizidi herufi 15</b>";
                            }else{

                                //TUNA HASH PASSWORD
                                $hashed_pass=password_hash($password,PASSWORD_DEFAULT);

                                //Tunaangalia kama jina lipo kwenye database

                                $sql1=$conn->prepare("SELECT * FROM `user2` WHERE username=?");
                                $sql1->bind_param("s",$name3);
                                $sql1->execute();
                                $result=$sql1->fetch();

                                if($result === NULL){

                                    //Tunaangalia kama email ipo kwenye database.
                                    $sql2=$conn->prepare("SELECT * FROM `user2` WHERE `email`=?");
                                    $sql2->bind_param("s",$email3);
                                    $sql2->execute();
                                    $email_result=$sql2->fetch();
                                    if($email_result === NULL){

                                        //echo "email $email2 haipo";
                                        //Tunamruhusu user kujisajili sasa
                                        $sql3=$conn->prepare("INSERT INTO `user2` (username,email,tel,password,uniqid,date) VALUES (?,?,?,?,?,?)");
                                        $sql3->bind_param("ssisss",$name3,$email3,$phone2,$hashed_pass,$uid,$date);
                                        if ($sql3->execute()){

                                            header('location:index.php');
                                            exit();

                                        }

                                    }else{

                                        $email_alert="<b>Email $email2 unayojaribu kutumia tayar ipo, tumia Email nyingine</b>";

                                    }
                                }else{

                                    $name_alert="<b>Mtumiaji $name2 tayari yupo, chagua jina lingine</b>";
                                }
                            }



                        }
                    }
                }
            }
        }

    }
}else{
   // echo "<b style='background:peru; font-size:20px; padding:8px 8px 8px 8px; color:white; border-radius:10px;'>Tafadhali jaza taarifa kwa usahihi</b>" . "<br><br/>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>
signup_area    
</title>
    <!--<link rel="stylesheet" type="text/css" href="style.css"/>-->
    <style>
        @media (min-width:769px) and (max-width:1500px){
    body{
     text-align:center;
     margin-top: 70px;
     background-image: url('picha/maria1.jpeg');
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
     background-image: url('picha/maria1.jpeg');
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
            margin-bottom:20px;
            width:70%;
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
        margin-bottom:15px;
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
    <legend><small style="background:blue; padding:4px; color:white; font-family:Tahoma;">User Enrollment</small></legend> 
        
        <div id="form">
        <form action="" method="POST">
            
            <div>
            <label id="lebo" for="jina">JINA</label><br/>
            <input type="text" name="jina" id="jina" placeholder="Andika jina moja tu." required/>    
            </div>
            <span>
               <?php echo $name_alert; ?>
            </span>
            <div>
            <label id="lebo" for="email">EMAIL</label><br/>
            <input type="email" name="email" id="email" placeholder="Andika email yako" required/>    
            </div>
            <span>
               <?php echo $email_alert; ?>
            </span>

            <div>
            <label id="lebo" for="phone">NAMBA YA SIMU</label><br/>
            <input type="tel" name="phone" id="phone" placeholder="Mfano:- 0712345678" required/>    
            </div>
            <span>
               <?php echo $phone_alert; ?>
            </span>

            <div>
                <label id="lebo" for="pass1">NENO SIRI</label><br/>
                <input type="password" name="pass1" id="pass1" placeholder="Andika neno  siri" required/>
            </div>

            <div>
            <label id="lebo" for="pass2">HAKIKI NENO SIRI</label><br/>
            <input type="password" name="pass2" id="pass2" placeholder="Rudia namba yasiri" required/>    
            </div>
            <span>
               <?php echo $pass_alert; ?>
            </span>
            
            <div>
            <button id="button" type="submit" name="submit">JISAJILI</button>
            </div>
            
            <div>
                <p>
                    <a style="font: 19px; font-weight: bold; text-decoration: none;" href="login2_script.php">Ingia</a> Kama unayo account.
                </p>
            </div>
        </form>
        </div>
    </fieldset>
    </body>
</html>