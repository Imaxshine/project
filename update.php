<?php
include 'connect.php';
$pass_alert="";
if (!isset($_COOKIE['user_email'])){
    header('Location:password_reset.php');
    exit();
}else{
  if(isset($_POST['submit'])){
      $pass1=$_POST['password1'];
      
      $pass2=$_POST['password2'];
      
      $email=$_COOKIE['user_email'];
      
      if(strcmp($pass1,$pass2)==0){
          //echo "password zimefanana";
      $pass_length=strlen($pass1);
       if($pass_length<5){
           $pass_alert="<b style=\"color:maroon; font-size:17px;\">Samahani, nenosiri liwe na namba au herufu kuanzia 5</b>";
       }else{
         $hashed_pass=password_hash($pass1,PASSWORD_DEFAULT);
           //echo $hashed_pass;
           //tunaenda ku update password ya user
           
           $sql=$conn->prepare("update `user2` set password=? where email=?");
           $sql->bind_param("ss",$hashed_pass,$email);
           if($sql->execute()){
            $delete=$conn->prepare("delete from verification where user_email=?");
            $delete->bind_param("s",$email);
            if($delete->execute()){
                
                header('location:index.php');
            }else{
                $pass_alert="<b style=\"color:maroon; font-size:17px;\">Some errors occur</b>";
            }
           }else{
               $pass_alert="<b style=\"color:maroon; font-size:17px;\">Tumeshindwa kubadili nenosiri </b>";
           }
       }      
      }else{
          $pass_alert="<b style=\"color:maroon; font-size:17px;\">Umekosea, neno siri uliloingiza hayafanani</b>";
      }

      //
      //if ($pass_length<5)
      //$hashed_pass=password_hash($pass,PASSWORD_DEFAULT);

  }
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>
        update
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
        input[type=password]{
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
    <legend><small style="background:blue; padding:4px; color:white; font-family:Tahoma;">password recover</small></legend>
    <div id="form">
        <br/>

        <form action="" method="POST">

            <div>
                <label id="lebo" for="pass">INGIZA NENO SIRI JIPYA</label><br/>
                <input type="password" name="password1" id="pass" placeholder="Neno siri jipya***" required="required"/>
            </div>
            <br/>
            
            <div>
                <label id="lebo" for="password">HAKIKI NENO SIRI</label><br/>
                <input type="password" name="password2" id="password" placeholder="Verify neno siri***" required="required"/>
            </div>
            <br/>
            
            <span>
               <?php echo $pass_alert;?>
            </span>

            <div>
                <button id="button" type="submit" name="submit">Update</button>
            </div>
        </form>
    </div>
</fieldset>
</body>
</html>
<?php
}
    ?>