<?php
include 'session.php';
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
if(!isset($_COOKIE['user_id'])){
    header('location:dash.php');
}elseif(!isset($_COOKIE['id'])){
    header('location:dash.php');
}else{?>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>madarasa</title>
    <style>
        table{
            border-collapse:collapse;
            border:1px solid;
            background-color: hotpink;
            width: 300px
            position:relative;
        }
        th,td{
            border:1px solid;
            padding:10px 11px 10px 11px;
        }
        th{
            background-color: silver;
            color:blue;
        }
        body{
            margin-top: 10%;
            width: auto;
            height:auto;
        }
        button:hover{
            color:red;
            font-size:19px;
        }
        #emai{
            background-color: darkgoldenrod;
            width:fit-content;
            width: 200px;
            padding:12px 20px;
            border-radius:12px;
            margin-right: auto;
            margin-bottom:20px;
        }
        #email2{
            background-color: aliceblue;
            padding:auto;
            border-radius:10px;
            height:auto;
        }
        b.email1{
            text-decoration:underline;
        }
        b.link{
            float:right;
        }
        b.link,.link2{
            text-decoration:none;
        }
        table,#emai{
            margin: auto;
            margin-bottom:auto;
        }
        .home{
            text-align:center;
        }
        .button{
            font-family: arial;
            text-decoration: none;
            background-color: green;
            color:pink;
            width:fit-content;
            padding:3px 2px 3px 2px;
            border-radius: 10px;
            padding: 6px;
            margin: auto;
            box-shadow:1px 1px 1px 1px darkblue;
        }
        .button:active{
            background-color: black;
            color:white;
        }
    </style>
</head>
    <body>

    <div class="home">
        <menu>
            <a class="button" href="dash.php">HOME</a>
            <a class="button" href="school_resulties.php">Over all resulties</a>
            <!--<button class="button">ijidkj</button>-->
        </menu>
    </div>

        <div id="emai">
            <?php
            $email=$_SESSION['school_email'];

            $data=$email;
            $cipher='AES-128-CTR';
            $key='encry.com_7722';
            $option=0;
            $iv=openssl_cipher_iv_length($cipher);
            $iv_decrypted='1234512345123456';
            $decrypt=openssl_decrypt($data,$cipher,$key,$option,$iv_decrypted);
            $email2=$decrypt;
            
            echo "<b class='email1'>Email</b>" . "<b class='link'><a class='link2' href='alert.php'>Logout</a></b>" ."<br/>";
            
            //echo "<b class='link'><a href=''>Logout</a></b>";
                
            $email3=strtolower($email2);
            ?>
            <div id="email2">
                <p>
                    <marquee scrolldelay="50/100"><b><?php echo $email3; ?></b></marquee>
                </p>
            </div>
        </div>
        
        <table>
            <thead>
                    <th>CLASSES</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <a href="class1.php"><button>I</button></a>
                        <a href="class2.php"><button>II</button></a>
                        <a href="class3.php"><button>III</button></a>
                        <a href="class4.php"><button>IV</button></a>
                        <a href="class5.php"><button>V</button></a>
                        <a href="class6.php"><button>VI</button></a>
                        <a href="class7.php"><button>VII</button></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>
<?php
}
?>