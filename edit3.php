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
        </style>
    </head>
    <body>
        
        <h4><a href="class3.php">Enter more resulties</a></h4>
        
        <h2 style="text-align:center;color:purple;">CLASS III.</h2>
        
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
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php
            $string="fulton sheen primary school";
            $i=1;
include_once('connect.php');
$sql=mysqli_query($conn,"SELECT * FROM `class3` ORDER BY pupil ASC");
while($detail=mysqli_fetch_assoc($sql)){?>
            <tbody>
                <tr>
                    <td><?php echo $i++; ?></td>
                    
                        <td style="text-align:left;"><?php echo $detail['pupil']; ?></td>
                        
                        <td style="text-align:left;"><?php echo $detail['parent']; ?></td>
                        
                    <td style="text-align:left;"><?php echo $detail['surname']; ?></td>
                       
                           <td><?php echo $detail['gender']; ?></td>
                         
                        <td><?php echo $detail['kisw']; ?></td>
                        
                        <td><?php echo $detail['his']; ?></td>
                        
                        <td><?php echo $detail['eng']; ?></td>
                        
                        <td><?php echo $detail['scie']; ?></td>
                        
                        <td><?php echo $detail['geo']; ?></td>
                        
                        <td><?php echo $detail['histry']; ?></td>
                        
                        <td><?php echo $detail['develop']; ?></td>
                        <td><a href="edit3A.php?id=<?php echo $detail['id']; ?>">edit</a></td>
                    
                        <td><a href="delete3.php?id=<?php echo $detail['id']; ?>">delete</a></td>
                        
                        
                </tr>
            </tbody>
            <?php
              }
            ?>
        </table>
            
        </form>
    </body>
</html>
<?php
}
?>