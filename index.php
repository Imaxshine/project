<?php
include'connect.php';

include'session.php';
$name_alert="";

$pass_alert="";

if(isset($_POST['submit'])){
   
    //Kusanitize na kuvalidate jina la user.
    $name=filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
    $pass=filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
    
    if(preg_replace('/[A-Za-z0-9]/','',$name)){?>
        
        <script>
              window.alert('Andika jina kwa usahihi');
       </script>
    <?php
     //$name_alert="<b>Andika jina kwa usahihi</b>";                                          
    }else{
        
        //tunaEncrypt jina
$data1=strtolower($name);
$cipher='AES-128-CTR';
$key='encry.com_7722';
$option=0;
$iv=openssl_cipher_iv_length($cipher);
$iv_encrypted='1234512345123456';
$encrypt=openssl_encrypt($data1,$cipher,$key,$option,$iv_encrypted);
$name2=$encrypt;
        
        //Tunaangalia kama jina la user lipo kwenye database yetu na password
        $sql=$conn->prepare("SELECT COUNT(username) AS `majina`,email,tel,password,id,uniqid,date,username FROM `user2` WHERE username=?");
        $sql->bind_param("s",$name2);
        $sql->execute();
        $result=$sql->get_result();
        while($row=$result->fetch_assoc()){
            //Tunachukua taarifa zote tunazoziitaji hapo baadae
            $majina=$row['majina'];
            
            $username=$row['username'];
            
            $userId=$row['id'];
            
            $uniqid=$row['uniqid'];
            
            $save_pass=$row['password'];
            
            $tel=$row['tel'];
            
            $date=$row['date'];
            
            $email=$row['email'];
           
            if(!$majina>0){?>
                
                <!--$name1=strtolower($name);
                
                $name_to_display=ucfirst($name1);
                
                $name_alert="<b>Hakuna mtumiaji mwenye jina la</b>" . "\n" . '<b>'.$name_to_display . '</b>' ; -->
                  
                <script>
                    alert("Hakuna mtumiaji mwenye jina hilo.");
                </script>        

             <?php
            }else{
                if(password_verify($pass,$save_pass)){
                    
                    $_SESSION['user_id']=$userId;
                    
                    $_SESSION['user_name']=$username;
                    
                    setcookie('id',$userId);
                    
                    setcookie('username',$username);
                    
                    setcookie('email',$email);
                    
                    
                    header('location:dash.php');
                
                }else{?>
                    <script>
                        //$pass_alert="<b>Nenosiri ulilochagua sio sahihi</b>";
                       window.alert("Nenosiri ulilochagua sio sahihi");
                    </script>
                                 
                <?php
                    
                } 
            }
        }
        
    }
}
?>
<html>
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
</html>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<title>
sigin_area    
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
    <legend><small style="background:blue; padding:4px; color:white; font-family:Tahoma;">User Sign In</small></legend>
        
        <div id="form">
        <form action="" method="POST">
            
            <div>
            <label id="lebo" for="username">JINA LA MTUMIAJI</label><br/>
            <input type="text" name="username" placeholder="Jina la mtumiaji" id="username" required/>    
            </div>
            <span>
            <?php echo $name_alert; ?>
            </span>
            <br/>
            
            <div>
            <label id="lebo" for="pass">NENO SIRI</label><br/>
            <input type="password" name="password" placeholder="Neno siri" id="pass" required/> 
            </div>
            <span>
            <?php echo $pass_alert; ?>
            </span>

            <div>
            <button id="button" type="submit" name="submit">INGIA</button>
            </div>
            
            <div>
                <p style="font-family: Arial;">Hauna account bado?
                    <a style="font-size: 19px; text-decoration: none; font-family: Arial" href="enrol.php">Jisajili hapa</a>
                </p>
            </div>

            <div>
                <p>
                    <a style="text-decoration: none;" href="password_reset.php"><b style="color: maroon">Je, umesahau neno siri?</b></a>
                </p>
            </div>
        </form>
        </div>
    </fieldset>
    </body>
</html>