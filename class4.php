<?php
session_start();
if(!isset($_COOKIE['user_id'])){
    header('location:dash.php');
}else{
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>inserting form</title>
    <style type="text/css">
        body{
            background-color: silver;
            margin-top: 55px;
        }
        input[type=number]{
            width: 60px;
            height: 20px;
            background-color: yellow;
            color: black;
            border-radius:15px;
            text-align: center;
        }
        input[type=text]{
            text-align: center;
            margin-bottom: 20px;
            width:40%;
            height:30px;
            border:none;
            background: black;
            color:white;
            font-family: Tahoma;
            font-size: 100%;
        }
        .submit{
            margin-top: 20px;
            background-color: mediumblue;
            color:white;
            font-size: 15px;
            padding:10px;
             border:none;
            box-shadow: 1px 1px 1px 1px palegreen;
        }
        th,td{
            border:1px solid;
            background-color: antiquewhite;
        }
        
        #open_link{
            margin: 10px;
            float:right;
            margin-right: auto;
            text-decoration:none;
            border-style:inset;
            clear: both;
        }
        #open_link:active{
            background-color: aqua;
            color:currentColor
        }
        
    </style>
</head>
<body>
    
    <p>
        <a href="result4.php" id="open_link">OPEN</a>
        
        <a href="edit4.php" id="open_link">EDIT</a>
        
        <a href="result.php" id="open_link">CLASSES</a>
    </p>
<div id="contener">
    <h3 style="text-decoration:underline; color:green; font-size:15px;">FOMU YA KUINGIZIA MATOKEO YA WANAFUNZI WA <br>DARASA LA NNE (STD - IV)</h3>
    
    <form method="POST" action="class4_script.php">
        <label for="pupil" style="font-size:18px; font-family:Tahoma; font-weight:bold; color:maroon;">PUPIL NAME</label><br/>
        <input type="text" name="pupil" id="pupil" required><br/>

        <label for="parent" style="font-size:18px; font-family:Tahoma; font-weight:bold; color:maroon;">PARENT NAME</label><br/>
        <input type="text" name="parent" id="parent" required><br/>
        
        <label for="surname" style="font-size:18px; font-family:Tahoma; font-weight:bold; color:maroon;">SURNAME</label><br/>
        <input type="text" name="surname" id="surname" required><br/>

        <h4>Gender</h4>
        <label for="male" style="font-size:18px; font-family:Tahoma; font-weight:bold; color:darkblue;"><b>Male</b></label>
        <input type="radio" name="gender" id="male" value="male" required><br/>
        <label for="female" style="font-size:18px; font-family:Tahoma; font-weight:bold; color:green;"><b>Female</b></label>
        <input type="radio" name="gender" id="female" value="female" required><br/>

        <p><u>MASOMO:</u></p>

        <div id="table">
            <table>
                <thead>
                <tr>
                    <th>Somo</th>
                    <th>Marks</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                       Kiswahili
                    </td>
                    <td>
                        <input type="number" name="kisw" placeholder="kisw..." required>
                    </td>
                </tr>

                <tr>
                    <td>
                        English
                    </td>
                    <td>
                        <input type="number" name="his" placeholder="engl..." required>
                    </td>
                </tr>

                <tr>
                    <td>
                        Mathematics
                    </td>
                    <td>
                        <input type="number" name="eng" placeholder="mathe..." required>
                    </td>
                </tr>

                <tr>
                    <td>
                        Civic and moral 
                    </td>
                    <td>
                        <input type="number" name="scie" placeholder="civic..." required>
                    </td>
                </tr>

                <tr>
                    <td>
                        Social studies
                    </td>
                    <td>
                        <input type="number" name="geo" placeholder="social..." required>
                    </td>
                </tr>

                <tr>
                    <td>
                       Science and Technology
                    </td>
                    <td>
                        <input type="number" name="histry" placeholder="scie..." required>
                    </td>
                </tr>

                <!--<tr>
                    <td>
                        Civic and<br>Moral
                    </td>
                    <td>
                        <input type="number" name="civic" placeholder="civic" required>
                    </td>
                </tr>-->
                </tbody>
            </table>
            <input class="submit" type="submit" name="submit" value="Send"/>
        </div>
    </form>
</div>
</body>
</html>
<?php
}
    ?>