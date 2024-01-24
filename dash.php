<?php
session_start();
if(!isset($_COOKIE['id'])){
    header('location:index.php');
    exit();
}else{?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>Dashboard</title>
    <!-- <link rel="stylesheet" type="text/css" href="dash.css"/>-->
     
    <style>
        @media (max-width:768px){
            #username{
                text-align: center;
                background-color:cyan;
                padding-top:30px;
                margin-bottom:20px;
            }

            .email{
                float: right;
                margin-right: 10px;
                margin-top:25px;
                padding:3px 3px 3px 3px;
                color: blue;
                box-shadow: 1px 1px 1px 1px peru;
            }

            .back_image{
                border-color:fuchsia;
                background-image: url('picha/images%20(10).jpeg');
                background-repeat: no-repeat;
                margin-left:20%;
                height:auto;
                opacity:0.6;
            }

            .menu_contener{
                background-color: chartreuse;
                float:left;
            }

            .menu2{
                display:none;
            }

            .menu_contener:hover .menu2{
                display: block;
                background-color: black;
                height:auto;
            }

            #contents{
                clear: both;
                text-align: center;
            }

            .content2{
                font-weight:bold;
                margin-top:30px;
                color:darkred;
                font-size:14px;
                margin-bottom:15px;
                background-color:white;
                width: fit-content;
            }

            .content3,.ul,#lists{
                font-weight:bold;
                /* list-style-type: none;*/
                color:red;
                /*font-size:14px;*/
                margin-bottom:15px;
            }

            #lists{
                background-color:white;
                width: fit-content;
            }

            #content3,#explan{
                background-color:gold;
                color:darkgreen;
                width:auto;
            }

            #content3{
                box-shadow:2px 2px 8px 2px peru;
            }

            #content3:hover{
                font-size:18px;
                cursor:pointer;
            }

            /*---*/
            #admin_form{
                background-color:chartreuse;
                width:fit-content;
                width:auto;
                height: auto;
                box-shadow:1px 1px 2px 1px peru;
                border-radius:15px;
            }

            #admin_form,label,#email{
                text-align: center;
            }

            #email,#password{
                text-align: center;
                border:none;
                height: 35px;
                width:50%;
                border-radius:20px;
                padding: 12px 18px;
                box-shadow:1px 1px 2px 1px purple;
                margin-bottom:18px;
            }

            .label{
                background-color: blue;
                color:whitesmoke;
                font-size: 130%;
            }

            .school_account{
                color:cornflowerblue;
            }

            #button{
                background-color:darkgreen;
                box-shadow:1px 1px 2px 1px white;
                margin-bottom: 20px;
                color:white;
                height: 30px;
                font-size:18px;
                border: none;
                width:110px;
                border-radius:20px;
            }

            #button:hover{
                color:red;
                cursor: pointer;
            }
            a:hover{
                text-decoration:none;
                font-size:18px;
            }
            .school_logo{
                background-color: pink;
                color:green;
                box-shadow:1px 1px 1px 1px red;
                border-radius:360px;

            }
            #imge{
                padding-right: 2px;
                width: 160px;
                height:160px;
                border-radius:25px;
                box-shadow: 1px 1px 1px 1px aqua;
            }
            #imge:hover{
                width: 220px;
                height: 220px;
                background-color: violet;

            }
            
        }
        
        /* KWA SCREEN KUBWA*/
        @media(min-width:768px) and (max-width:1500px){
            #admin_form{
                display: block block;
                background-color:chartreuse;
                width:fit-content;
                width:auto;
                height: auto;
                box-shadow:1px 1px 2px 1px peru;
                border-radius:15px;
            }

            .email{
                float: right;
                margin-right: 10px;
                margin-top:50px;
                padding:3px 3px 3px 3px;
                color: blue;
                box-shadow: 1px 1px 1px 1px peru;
            }

            #admin_form,label,#email{
                text-align: center;
            }

            #email,#password{
                text-align: center;
                border:none;
                height: 35px;
                width:50%;
                border-radius:20px;
                padding: 12px;
                box-shadow:1px 1px 2px 1px purple;
                margin-bottom:25px;
            }

            .label{
                background-color: blue;
                color:whitesmoke;
                font-size: 130%;
            }

            .school_account{
                color:cornflowerblue;
            }

            #button{
                background-color:darkgreen;
                box-shadow:1px 1px 2px 1px white;
                margin-bottom: 20px;
                color:white;
                height: 30px;
                font-size:18px;
                border: none;
                width:110px;
                border-radius:20px;
            }

            #button:hover{
                color:red;
                cursor: pointer;
            }
            a:hover{
                text-decoration:none;
                font-size:18px;
            }
            .school_logo{
                background-color: pink;
                color:green;
                box-shadow:1px 1px 1px 1px red;
                border-radius:360px;
            }
            #imge{
                padding:5px;
                width: 200px;
                height:200px;
                border-radius:25px;
                box-shadow: 1px 1px 1px 1px aqua;
            }
            #imge:hover{
                width: 260px;
                height: 260px;
                background-color: violet;
            }
            /*---*/
            #username{
                text-align: center;
                background-color:cyan;
                padding-top:50px;
                margin-bottom:30px;
            }
            .menu_contener{
                background-color: chartreuse;
                float:left;
            }

            .menu2{
                display:none;
            }

            .menu_contener:hover .menu2{
                display: block;
                background-color: black;
                height:auto;
            }

            #contents{
                clear: both;
                text-align: center;
            }
            .back_image{
                border-color:fuchsia;
                background-image: url('picha/images%20(10).jpeg');
                background-repeat: no-repeat;
                margin-left:30%;
                height:auto;
                opacity:0.5;
            }
            .content2{
                font-weight:bold;
                margin-top:50px;
                color:darkred;
                font-size:19px;
                margin-bottom:25px;
                background-color:white;
                width: fit-content;
            }
            .content3,.ul,#lists{
                font-weight:bold;
                /* list-style-type: none;*/
                color:red;
                font-size:19px;
                margin-bottom:25px;
            }
            #lists{
                background-color:white;
                width: fit-content;
            }

            #content3,#explan{
                background-color:gold;
                color:darkgreen;
                width:auto;
            }

            #content3{
                box-shadow:2px 2px 8px 2px peru;
            }

            #content3:hover{
                font-size:15px;
                cursor:pointer;
            }
        }
        /*screen zote*/
        
        .menu_contener{
            margin-bottom:25px;
        }
        .time{
                padding:12px;
                margin-right: 30px;
                float: right;
                font-size:15px;
                background-color: silver;
                color:brown;
                box-shadow: 1px 1px 1px 1px peru;
                margin-top:50px;
                border-radius:13px;
            }
        .menu2{
            padding:7px;
        }
        :target{
            color:red;
            border-style:inset;
            width: fit-content;
        }
        .linki{
            text-decoration: none;
            color:white;
        }
        #result{
          text-decoration: none;  
        }
        #fulton{
            background: purple;
            color:floralwhite;
            padding:6px;
            font-size: 18px;
            border-top-left-radius:20px;
            border-top-right-radius:20px;
            width: 88%;
            margin: auto;
            height: auto;
        }
        .menu{
            width:auto;
            background: silver;
            color:black;
            border-top-left-radius:15px;
            border-top-right-radius:15px;
        }
        .lab{
            font-weight: bold;
            font-family: arial;
        }
        #logout-button{
          float:right;
        }
        #explan{
            background-color:gold;
            color:darkgreen;
            width:auto;
            transition: font-size 3s ease 3s;
            transition: background 2s ease 2s;
            transition: color 2s ease 2s;
        }
        #explan:hover{
            font-size: 20px;
            background: black;
            color:white;
        }
        #content3{
          transition: 2s ease 2s;
        }
        #content3:hover{
            background: black;
        }
        .conver{
            text-decoration: none;
            font-family: arial;
            color:rgb(55,80,55);
        }
    </style>
</head>
<body>
<div id="username">
    <?php
    $username=$_COOKIE['username'];
$data1=$username;
$cipher='AES-128-CTR';
$key='encry.com_7722';
$option=0;
$iv=openssl_cipher_iv_length($cipher);
$iv_decrypted='1234512345123456';
$decrypt=openssl_decrypt($data1,$cipher,$key,$option,$iv_decrypted);
$username2=$decrypt;
$jina=strtolower($username2);
$uppername=ucfirst($jina);
    
    echo "<b>Habari za saizi ndugu: </b>" . "<b style='color:purple;'>$uppername</b>";
    
    //email decryption.
$data2=$_COOKIE['email'];
$cipher='AES-128-CTR';
$key='encry.com_7722';
$option=0;
$iv=openssl_cipher_iv_length($cipher);
$iv_decrypted='1234512345123456';
$decrypt=openssl_decrypt($data2,$cipher,$key,$option,$iv_decrypted);
$email_decryption=$decrypt;

    $title="<b style='color:red;'>EMAIL:</b>";
    echo "<b class='email'>$title <br/> $email_decryption</b>";
    ?>
   
</div>
<div class="menu_contener">
    <div class="menu">
        <button>Menu</button>
        <div class="menu2">
            <p><a class="linki" href="#kuhusu">Kuhusu fultonsheen</a></p>
            <p><a class="linki" href="#contacts">Wasiliana nasi</a></p>
            <p><a class="linki" href="#elimu">Elimu</a></p>
            <p><a class="linki" href="#result">Maendeleo ya <br>wanafunzi</a></p>
            <p><a class="linki" href="#logout-button">Ondoka</a></p>
        </div>
    </div>
</div><br/><br/>
    
<?php
//echo '<br/><br/>';
?>

    <p class="time">
        <?php
        date_default_timezone_set('Africa/Nairobi');
        $date=date('d/m/Y - l');
        $time=date('H:i');
        echo 'SAA: ' . $time . "<br/>";
        echo 'TAREHE: ' . $date;
        ?>
    </p>
    
<div id="contents">
    <div><h2 class="school_logo">WELCOME FULTON-SHEEN<br/> PRE & PRIMARY SCHOOL.</h2></div>
    <div class="back_image">
        <div>
            <p class="content2">
                Karibu sana katika shule yetu ya Fulton-sheen<br/>
                tungependa kukujuza zaidi kuhusu maendeleo ya <br/>
                mwanafunzi/mwanao pindi anapotoa ushirikiano wake <br/>
                katika nyanja zifuatazo:-
            </p>
        </div>

        <br/>

        <div class="content3">
            <ul class="ul">
                <li id="lists">Kitaaluma</li>
                <li id="lists">Kinidhamu</li>
                <li id="lists">Ushirikiano</li>
                <li id="lists">Utendaji kazi</li>
            </ul>
        </div>
    </div>

    <div id="content3">
            <span id="explan">
                Hi <?php echo $uppername; ?>, tunapenda ufahamu mambo ya msingi juu ya maendeleo ya mwanao. Bilashaka ni jambo la
                msingi sana kwa mzazi kufwatilia ni kwa namna gani mwanae anavyoshiriki masuala ya kitaaluma nje na ndani ya
                darasa wakati wa zoezi la ufundishaji na ujifunzaji. Tunaamini ya kwamba mwalimu ndie mzazi wa mwanafunzi/mtoto
                pindi awapo <b><i>shuleni kwetu</i></b> kwani mwalimu humfwatia mwanafunzi kwa ukaribu zaidi ili kufahamu
                muenendo wake katika makuzi mbalimbali ya utambuzi.
            </span>
    </div><br/><br/>

    <?php
    echo "<hr/>";
    ?>

    <div id="head">
        <h4><marquee scrolldelay="2/500" loop="25">Hizi ni baadhi tu ya picha za wanafunzi wetu na mazingira yao ya shuleni</marquee></h4>

        <?php
        echo "<hr/>";
        ?>


        <img id="imge" src="picha/images (2).jpeg" title="kielelezo watoto wa chekechea">

        <img id="imge" src="picha/images (3).jpeg" title="Bustani ya mapumziko">

        <img id="imge" src="picha/images (4).jpeg" title="Mahafali ya kidato cha saba(7).">

        <img id="imge" src="picha/images (5).jpeg" title="Mahafali ya kidato cha saba(7).">

        <img id="imge" src="picha/images (8).jpeg" title="Mahafali ya kidato cha saba(2022).">
    </div>

    <div>
        <p>
            <input type="button" onclick="alert('Hii! bofya link hapo chini (maendeleo ya wanafunzi) na baada ya hapo utaweza kupata taarifa zote za kitaaluma kuhusu mwanafunzi/wanafunzi husika; Asante:')" value="Bofya hapa ili kuweza kujuwa zaidi">
        </p>
    </div>

    <h1 style="border:1px solid blue; font-size:14px; color:brown;">
        MAENDELEO YA WANAFUNZI SHULE YA MSINGI FULTON-SHEEN.
    </h1>

    <br>

    <p>Bofya hapa ili kutazama <a id="result" href="school_resulties.php">Maendeleo ya wanafunzi</a> wa shule ya msingi Fulton-Sheen Pre & Primary school</p>

    <br>



</div>


<div id="admin_form">

    <b>
        <mark style="box-shadow:1px 1px 2px 1px blue; border-radius:15px; font-size:25px;">ONLY FOR OFFICE PURPOSESS</mark>
    </b>

    <form method="post" action="admin_form.php">
        <h3 class="school_account">SCHOOL ACCOUNT</h3>

        <label class="label" for="email">School email:</label><br><br/>
        <input type="email" name="email" placeholder="@gmail.com" id="email" required><br/>

        <label class="label" for="password">School password:</label><br><br/>
        <input type="password" name="password" placeholder="******" id="password" required><br/>

        <button id="button" style="submit" name="submit">
            Enter
        </button>
    </form>
</div><br/><br/>
         
    <div id="fulton">
              <h4 id="kuhusu" style="margin-left:30px; text-decoration:underline; padding:2px;">KUHUSU</h4>
        <ul>
           <li>HISTORIA YA SHULE:</li>
            <span>
               Shule ya msingi Fultonsheen ilianzishwa mwaka 2017, ikiwa na wanafunzi wachache tu lakini imekuwa kwa kasi na sasa ina wanafunzi zaidi ya 100.           
            </span><br/><br/>
            
            <li>LENGO LA SHULE:</li>
            <span>
               Shule ya msingi Fultonsheen inalengo la kutoa Elimu bora kwa wanafunzi wake. Shule inajitahidi kuwaandaa wanafunzi wake kwa ajili ya shule ya upili / <abbr title="SECONDARY SCHOOL">SESCO</abbr> na maisha ya baadaye. 
            </span><br/><br/>
            
            <li>MFUMO WA UFUNDISHAJI</li>
            <span>
                Shule yetu inatumia mfumo wa ufundishaji wa kisasa zaidi. Shule ina walimu waliohitimu na wenye uzoefu ambao wanatumia mbinu mbalimbali za ufundishaji na ujifunzaji.   
            </span>
        </ul>
    </div><hr/>
    
    <div id="fulton">
              <h4 id="contacts" style="margin-left:30px; text-decoration:underline; padding:2px;">MAWASILIANO</h4>
        
        <menu class="menu">
            
           <a class="conver" href="https://wa.me/+255752384387?text=Habari yako Mwalimu, naomba kujuwa zaidi.">
           Whatsapp: <i style="font-size:25px; color:green;" class="fa fa-comment"></i>
           </a><br/><br/>
            
            <a class="conver" href="sms:+255752384387?body=Habari yako Mwalimu, naomba kujuwa zaidi.">
            Message: <i style="font-size:25px; color:maroon;" class="fa fa-comments"></i>
            </a><br><br/>
            
            <a class="conver" href="tel:+255752384387">
            Call us: <i style="font-size:25px; color:blue;" class="fa fa-phone-square"></i>
            </a><br/><br/>
            
            <a class="conver" href="mailto:paulhamisi19@gmail.com">
            Email: <i style="font-size:25px; color:blue;" class="fa fa-envelope"></i>
            </a>
            
        </menu>
    </div><hr/>

<div id="fulton">
    <h4 id="elimu" style="margin-left:30px; text-decoration:underline; padding:2px;">UMUHIMU WA ELIMUU</h4>
    <p>
        Elimu ni muhimu kwa ajili ya maendeleo ya mtu binafsi na jamii kwa ujumla. Elimu inasaidi watu kujifunza na
        kukua, na inasaidia kuunda jamii yenye amani na ustawi.
    </p>

    <h4>Changamoto za elimu</h4>
    
        kuna changamoto nyingi zinazokabili elimu duniani kote. Changamoto hizi ni pamoja na umaskini,ukosefu wa usawa
        na ukosefu wa rasilimali kama vile:-
        <ol style="list-style-type: lower-latin">
        <li>Madarasa</li>
        <li>Mazingira ya ujifunzaji na ufundishaji</li>
        <li>Vifaa vya ujifunzaji n.k</li>
    </ol>
    

    <h4>Faida za elimu</h4>
    
        Elimu ina faida nyingi kwa watu binafsi na kwa jamii. Faida hizi ni pamoja na:

        <ul style="list-style-type: lower-roman;">
        <li>Kuongezeka kwa ujuzi na uelewa.</li>
        <li>Kuboresha ajira pamoja na fursa za kibiashara.</li>
        <li>Kuongezeka kwa afya na ustawi</li>
        <li>Kuboresha ushiriki wa kijamii na kisiasa</li>
        </ul>
    

</div>
    
    <hr/>

<div class="logout-div">
    <span><a id="logout-button" href="alert.php">Logout</a></span>
</div>

<?php
require_once('footer.php');
?>
    
</body>
    </html>
<?php
}
?>