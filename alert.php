<?php
session_start();
if(!isset($_COOKIE['id'])) {
    header('location:index.php');
    die();
}else{
    $name=$_COOKIE['username'];
$data1=$name;
$cipher='AES-128-CTR';
$key='encry.com_7722';
$option=0;
$iv=openssl_cipher_iv_length($cipher);
$iv_decrypted='1234512345123456';
$decrypt=openssl_decrypt($data1,$cipher,$key,$option,$iv_decrypted);
$name2=$decrypt;
    $name_case=ucfirst($name2);
//echo "<h1>You are about to log out</h1>";
}
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title></title>
        <style type="text/css">
            body{
                text-align: center;
                margin-top:80px;
                background-color:chartreuse;
            }
            #info{
                background-color: black;
                color:snow;
                width:fit-content;
                height: auto;
                padding:12px 12px 12px 12px;
                font-family: arial;
                border-radius:15px;
                margin:auto;
            }
            
            a{
                text-decoration:none;
                color:white;
                background-color: blue;
                padding:5px;
                border-radius:10px;
            }
            
            .left-nav{
                float: left;
                
            }
            .right-nav{
                float:right;
            }
            .left-nav,.right-nav{
                margin-top:8%;
                border:3px solid blue;
                padding:10px;
                border-radius:13px;
            }
        </style>
    </head>
    <body>
        <div id="info">
            <p>
                Ndug: <b style="background:white; color:silver; padding:5px; padding-bottom:0;"><?php echo $name_case;?></b> unakaribia kutoka,<br/>
                tafadhali bonyeza <span style="color:red;"><b>Log out</b></span> ili kutoka au bonyeza <span style="color:green;"><b>No</b></span> ili <br/>
               kuendelea <mark>kuvinjari.</mark>   
            </p>
            
            <div>
            <a class="left-nav" href="logout_script.php">Log out</a>
        </div>
        
        <div>
            <a class="right-nav" href="wind_back.php">No</a>
        </div>
        </div>
    </body>
</html>