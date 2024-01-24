<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    header('location:index.php');
    die();
}else{
    $name=$_SESSION['user_name'];
    $name2=strtolower($name);
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
            height: 28%;
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
        Dear <b><?php echo $name_case;?></b> you are about to Sign out<br/>
        please click <span style="color:red;"><b>Log out</b></span> to exist or click <span style="color:green;"><b>No</b></span> to <br/>
        execute process of log out.
    </p>

    <div class="left-nav">
        <a href="logout_script.php">Log out</a>
    </div>

    <div class="right-nav">
        <a href="wind2_back.php">No</a>
    </div>
</div>
</body>
</html>
