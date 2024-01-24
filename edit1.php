<?php
if(!isset($_COOKIE['user_id'])){
    header('location:index.php');
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
        
        <h4><a href="class1.php">Enter more resulties</a></h4>
        
        <h2 style="text-align:center;color:purple;">CLASS I.</h2>
        
        <form method="post" action="">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>FIRST NAME</th>
                    <th>SECOND NAME</th>
                    <th>SURNAME</th>
                    <th>GENDER</th>
                    <th>READING</th>
                    <th>WRITING</th>
                    <th>ARTHMETIC</th>
                    <th>CARE FOR<br/>HEALTH AND<br/>ENVIRONMENT</th>
                    <th>KUMUDU<br/>STADI<br/>ZA<br/>KISWAHILI</th>
                    <th>LISTENING <br/>AND<br/>SPEAKING</th>
                    <!--<th>CIVIC &<br>MORAL</th>-->
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php
            $string="fulton sheen primary school";
            $i=1;
include_once('connect.php');
$sql=mysqli_query($conn,"SELECT * FROM `subjects` ORDER BY pupil ASC");
while($detail=mysqli_fetch_assoc($sql)){?>
            <tbody>
                <tr>
                    <td><?php echo $i++; ?></td>
                    
                        <td><?php echo $detail['pupil']; ?></td>
                        
                        <td><?php echo $detail['parent']; ?></td>
                    
                        <td><?php echo $detail['surname']; ?></td>
                        
                       
                           <td><?php echo $detail['gender']; ?></td>
                         
                        <td><?php echo $detail['kisw']; ?></td>
                        
                        <td><?php echo $detail['his']; ?></td>
                        
                        <td><?php echo $detail['eng']; ?></td>
                        
                        <td><?php echo $detail['scie']; ?></td>
                        
                        <td><?php echo $detail['geo']; ?></td>
                        
                        <td><?php echo $detail['histry']; ?></td>
                        
                        <!--<td><//?php echo $detail['civic']; ?></td>-->
                        <td><a href="edit1A.php?id=<?php echo $detail['uniqid']; ?>">edit</a></td>
                    
                        <td><a href="delete1.php?id=<?php echo $detail['uniqid']; ?>">delete</a></td>
                        
                        
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
