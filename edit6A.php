<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
if(!isset($_COOKIE['user_id'])){
    header('location:dash.php');
}elseif(!isset($_COOKIE['id'])){
  header('location:dash.php');  
}else{?>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <title>Edit</title>
        <style type="text/css">
            table{
                border:1px solid;
            }
            th,td{
                border:1px solid;
                text-align: center;
            }
            input[type=number]{
            width: 60px;
            height: 20px;
            background-color: yellow;
            color: black;
            border-radius:15px;
            text-align: center;
            }
        </style>
    </head>
    <body>
        <form method="post" action="edit6_script.php">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>FIRST NAME</th>
                    <th>SECOND NAME</th>
                    <th>SURNAME</th>
                    <th>GENDER</th>
                    <th>KISWAHILI</th>
                    <th>ENGLISH</th>
                    <th>MATHEMATICS</th>
                    <th>CIVIC<br/>AND<br/>MORAL</th>
                    <th>SOCIAL STUDIES</th>
                    <th>SCIENCE<br/>AND<br/>TECHNOLOGY</th>
                    <th>VOCATIONAL SKILLS</th>
                </tr>
            </thead>
            <?php
            $i=1;
            $id=filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT); //$_GET['id'];
include_once('connect.php');
$sql=mysqli_query($conn,"SELECT * FROM `class6` WHERE uniqid=$id");
while($detail=mysqli_fetch_assoc($sql)){?>
            <input type="hidden" name="uniq" value="<?php echo $detail['uniqid']; ?>">
            <tbody>
                <tr>
                    <td><?php echo $i++; ?></td>
                    
                        <td><input type="text" name="pupil" value="<?php echo $detail['pupil']; ?>"></td>
                        
                        <td><input type="text" name="parent" value="<?php echo $detail['parent']; ?>"></td>
                    
                        <td><input type="text" name="surname" value="<?php echo $detail['surname']; ?>"></td>
                        
                        
                           <td><input type="text" name="gender" value="<?php echo $detail['gender']; ?>"></td>
                         
                        
                        <td><input type="number" name="kiswahili" value="<?php echo $detail['kisw']; ?>"></td>
                        
                        <td><input type="number" name="mathe" value="<?php echo $detail['his']; ?>"></td>
                        
                        <td><input type="number" name="english" value="<?php echo $detail['eng']; ?>"></td>
                        
                        <td><input type="number" name="scie" value="<?php echo $detail['scie']; ?>"></td>
                        
                        <td><input type="number" name="geo" value="<?php echo $detail['geo']; ?>"></td>
                        
                        <td><input type="number" name="histry" value="<?php echo $detail['histry']; ?>"></td>
                        
                        <td><input type="number" name="civic" value="<?php echo $detail['civic']; ?>"></td>
                        
                </tr>
            </tbody>
            <?php
              }
            ?>
        </table>
            <br/>
            <input type="submit" name="submit" value="Edit"><br/><br/>
            
            <a href="edit6.php" style="background:gold; padding:5px; border-radius:10px; text-decoration:none;">&laquo;Back</a>
        </form>
    </body>
</html>
<?php
}
    ?>