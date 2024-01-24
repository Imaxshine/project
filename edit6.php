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
                font-size: 12px;
                margin:auto;
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
        
        <h4><a href="class6.php">Enter more resulties</a></h4>
        
        <h2 style="text-align:center;color:purple;">CLASS VI.</h2>
        
        <form method="post" action="">
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
                    <th>Edit</th>
                    <th>Published</th>
                    <th>Updated</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <?php
            //$string="fulton sheen primary school";
            $i=1;
include_once('connect.php');
$sql=mysqli_query($conn,"SELECT * FROM `class6` ORDER BY pupil ASC");
while($detail=mysqli_fetch_assoc($sql)){?>
            <tbody>
                <tr>
                    <td><?php echo $i++; ?></td>
                    
                        <td style="text-align:left; padding:3px;"><?php echo $detail['pupil']; ?></td>
                        
                        <td><?php echo $detail['parent']; ?></td>
                    
                        <td><?php echo $detail['surname']; ?></td>
                        
                       
                           <td><?php echo $detail['gender']; ?></td>
                         
                        <td><?php echo $detail['kisw']; ?></td>
                        
                        <td><?php echo $detail['his']; ?></td>
                        
                        <td><?php echo $detail['eng']; ?></td>
                        
                        <td><?php echo $detail['scie']; ?></td>
                        
                        <td><?php echo $detail['geo']; ?></td>
                        
                        <td><?php echo $detail['histry']; ?></td>
                        
                        <td><?php echo $detail['civic']; ?></td>
                    
                        <td>
                            <a href="edit6A.php?id=<?php echo $detail['uniqid'];?>"><span style="background: blue;
                            font-size:30px; text-decoration: none;
                        color: white; padding: 4px;">&#9997;</span></a>
                        </td>
                    
                        <td style="background:yellow; color:blue; font-family:arial; padding:2px; font-weight:bold;"><?php echo $detail['posted']; ?></td>
                    
                        <td <?php 
                                $updated=$detail['updated'];
                                if(empty($updated)){?>
                                 style="background:blue;" 
                               <?php
                                } 
                            
                            ?> style="background:peru; color:white; font-family:arial; padding:2px; font-weight:bold;">
                            
                            <?php 
                                $updated=$detail['updated'];
                                if(empty($updated)){?>
                                 
                               <?php
                                }else{
                               echo $detail['updated'];   
                                }                
                            ?>
                    
                       </td>
                    
                        <td>
                            <a href="delete6.php?id=<?php echo $detail['uniqid']; ?>"><span style="background: silver; font-size: 18px; text-decoration: none;
                        color: red; padding: 4px;">&#X2718;</span></a>
                         </td>
                        
                        
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