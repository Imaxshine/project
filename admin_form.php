<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header('location:index.php');
    die();
}
include('connect.php');
if(isset($_POST['submit'])){
    $email=filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password=filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    $_SESSION['school_email']=$email;

    if(strlen($password)<8){

        echo "<b style='font-size: 20px; font-family: Tahoma; color:red;'>The password you entered is invalid </b>" . "<span style='font-size: 26px;'>&#128524;</span>";
    }else {

        #Tuna hash password

        $hashed_password = password_hash($password, PASSWORD_BCRYPT);


        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {

            echo "<b style='font-size: 20px; font-family: Tahoma; color:red;'>Your email " .'<b style="color:blue;">'. $email .'</b>'  . " doesn't look like reality email</b>";

        } else {

            //Tunaangalia kama email inasilabi chini ya 10
            $email_length = strlen($email);

            if ($email_length < 10) {

                echo "<b style='font-size: 20px; font-family: Tahoma; color:red;'>The email " .
                    '<b style="color:blue;">' . $email . '</b>' . " is too short</b>";

            } else {

                //Tuna encrypt email
                $data = $email;
                $cipher = 'AES-128-CTR';
                $key = 'encry.com_7722';
                $option = 0;
                $iv = openssl_cipher_iv_length($cipher);
                $iv_encrypted = '1234512345123456';
                $encrypt = openssl_encrypt($data, $cipher, $key, $option, $iv_encrypted);
                $email2 = $encrypt;

                //angalia kama email ipo
                $query = $conn->prepare("SELECT COUNT(school_email) AS email,school_email,school_password,id FROM ofice WHERE school_email=?");

                $query->bind_param("s", $email2);

                $query->execute();

                $result = $query->get_result();

                while ($row = $result->fetch_assoc()) {

                    $saved_email = $row['email'];

                    $email_to_show=$row['school_email'];

                    $userId = $row['id'];

                    //$uni=$row['uni'];

                    $saved_password = $row['school_password'];


                    if ($saved_email > 0) {

                        if (password_verify($password, $saved_password)) {

                            $_SESSION['PASSWORD']=$saved_password;

                            //echo $_SESSION['PASSWORD'];

                            //setcookie('uniq',$saved_email);

                            setcookie('user_id',$userId);

                            $_SESSION['school_email']=$email_to_show;

                            echo $_SESSION['school_email'];

                            header('Location:result.php');

                        } else {

                            echo "<b style='font-size: 20px; font-family: Tahoma; color:red; margin-left: 25px;'>Invalid password! </b>" . "<span style='font-size: 26px;'>&#128561;</span>";
                        }
                    } else {

                        echo "<b style='font-size: margin-left: 25px; 20px; font-family: Tahoma; color:red;'>Email " . '<b style="color:blue; text-decoration:underline;">' . $email .
                            '</b>' . " is still not recognized </b>"; ?> <span style="font-size: 26px;">&#128512;</span>
                  <?php
                    }
                }

            }
        }

    }

    }


        //header('location:result.php');
        //$_SESSION['email']=$email;
        
   ?>
<html>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
</html>