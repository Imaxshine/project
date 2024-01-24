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
            }
            input[type=number]{
            width: 60px;
            height: 20px;
            background-color: yellow;
            color: black;
            border-radius:15px;
            text-align: center;
        </style>
    </head>
    <body>
        <form method="post" action="edit1_script.php">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>FIRST NAME</th>
                    <th>SECOND NAME</th>
                    <th>SURNAME</th>
                    <th>GENDER</th>
                    <th>READING</th>
                    <th>WRITINGS</th>
                    <th>ARITHMETIC</th>
                    <th>CARE FOR<br/>HEALTH AND<br/>ENVIRONMENT</th>
                    <th>KUMUDU<br/>STADI<br/>ZA<br/>KISWAHILI</th>
                    <th>LISTENING <br/>AND<br/>SPEAKING</th>
                    <!--<th>CIVIC &<br>MORAL</th>-->
                </tr>
            </thead>
            <?php
            $i=1;
            $id=filter_input(INPUT_GET,"id",FILTER_SANITIZE_NUMBER_INT); //$_GET['id'];
include_once('connect.php');
$sql=mysqli_query($conn,"SELECT * FROM `subjects` WHERE uniqid=$id");
while($detail=mysqli_fetch_assoc($sql)){?>
            <input type="hidden" name="id" value="<?php echo $detail['uniqid']; ?>">
            <tbody>
                <tr>
                    <td><?php echo $i++; ?></td>
                    
                        <td><input type="text" name="pupil" value="<?php echo $detail['pupil']; ?>" required></td>
                        
                        <td><input type="text" name="parent" value="<?php echo $detail['parent']; ?>" required></td>
                    
                         <td><input type="text" name="surname" value="<?php echo $detail['surname']; ?>" required></td>
                        
                        
                           <td><input type="text" name="gender" value="<?php echo $detail['gender']; ?>" required></td>
                         
                        
                        <td><input type="number" name="kiswahili" value="<?php echo $detail['kisw']; ?>" required></td>
                        
                        <td><input type="number" name="mathe" value="<?php echo $detail['his']; ?>" required></td>
                        
                        <td><input type="number" name="english" value="<?php echo $detail['eng']; ?>" required></td>
                        
                        <td><input type="number" name="scie" value="<?php echo $detail['scie']; ?>" required></td>
                        
                        <td><input type="number" name="geo" value="<?php echo $detail['geo']; ?>" required></td>
                        
                        <td><input type="number" name="histry" value="<?php echo $detail['histry']; ?>" required></td>
                        
                        <!--<td><input type="number" name="civic" value="<//?php echo $detail['civic']; ?>"></td>-->
                        
                </tr>
            </tbody>
            <?php
              }
            ?>
        </table>
            <br/>
            <input type="submit" name="submit" value="Edit">
        </form>
    </body>
</html>
