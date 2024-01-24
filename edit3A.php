<?php
if(!isset($_COOKIE['id'])){
    header('location:index.php');
    exit();
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
        <form method="post" action="edit3_script.php">
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
                    <th>HISTORIA<br/>YA<br/>TANZANIA</th>
                    <th>GEOGRAPHY</th>
                    <th>SCIENCE</th>
                   <th>DEVELOPING<br/>ARTIST<br/>AND<br/>SPORTS</th>
                </tr>
            </thead>
            <?php
            $i=1;
            $id=$_GET['id'];
include_once('connect.php');
$sql=mysqli_query($conn,"SELECT * FROM `class3` WHERE id=$id");
while($detail=mysqli_fetch_assoc($sql)){?>
            <input type="hidden" name="id" value="<?php echo $detail['id']; ?>">
            <tbody>
                <tr>
                    <td><?php echo $i++; ?></td>
                    
                        <td><input type="text" name="pupil" value="<?php echo $detail['pupil']; ?>" required="required"></td>
                        
                        <td><input type="text" name="parent" value="<?php echo $detail['parent']; ?>" required="required"></td>
                    
                    
                         <td><input type="text" name="surname" value="<?php echo $detail['surname']; ?>" required="required"></td>
                        
                        
                           <td><input type="text" name="gender" value="<?php echo $detail['gender']; ?>" required="required"></td>
                         
                        
                        <td><input type="number" name="kiswahili" value="<?php echo $detail['kisw']; ?>" required="required"></td>
                        
                        <td><input type="number" name="mathe" value="<?php echo $detail['his']; ?>" required="required"></td>
                        
                        <td><input type="number" name="english" value="<?php echo $detail['eng']; ?>" required="required"></td>
                        
                        <td><input type="number" name="scie" value="<?php echo $detail['scie']; ?>" required="required"></td>
                        
                        <td><input type="number" name="geo" value="<?php echo $detail['geo']; ?>" required="required"></td>
                        
                        <td><input type="number" name="histry" value="<?php echo $detail['histry']; ?>" required="required"></td>
                        
                       <td><input type="number" name="develop" value="<?php echo $detail['develop']; ?>" required="required"></td>
                        
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
<?php
}
?>