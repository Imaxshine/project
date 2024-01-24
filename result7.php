<?php
include_once('connect.php');
if(!isset($_COOKIE['id'])){
    header('location:index.php');
    exit();
}else{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <title>Resulties</title>
        <style>
            table{
                border-collapse:collapse;
                margin: auto;
                font-size: 12px;
            }
            table,th,td{
                border:1px solid;
                padding:5px 5px 5px 5px;
            }
            
            #head,#head2{
                text-align: center;
            }
            table,thead,tbody{
               text-align: center; 
            }
            #head{
             box-shadow: 2px 1px 2px 1px black;
             border-radius:12px;    
             background-color: greenyellow;
             color:darkgoldenrod;    
            }
            #head2:hover{
                color:red;
            }
        </style>
    </head>
    <body>
        
        <div id="head">
            <h3 id="head2">
                SHULE YA MSINGI FULTON-SHEEN PRE & PRIMARY SCHOOL. <br/><br/>
                MATOKEO YA WANAFUNZI WA DARASA LA SABA (VII).
            </h3>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>MAJINA</th>
                    <!--<th>SECOND NAME</th>-->
                    <th>GENDER</th>
                    <th>KISWAHILI</th>
                    <th>ENGLISH</th>
                    <th>MATHEMATICS</th>
                    <th>CIVIC<br/>AND<br/>MORAL</th>
                    <th>SOCIAL STUDIES</th>
                    <th>SCIENCE<br/>AND<br/>TECHNOLOGY</th>
                    <th>VOCATIONAL SKILLS</th>
                    <th>JUMLA<br/>YA<br/>ALAMA(MARKS)</th>
                    <th>WASTANI</th>
                    <th>GREDI</th>
                    <th>NAFASI<br/>YA<br/>UFAULU(POSITION)</th>
                    <th>MAONI</th>
                </tr>
            </thead>
            <?php
            $no=1;
            $sql=mysqli_query($conn,"SELECT CONCAT(pupil,' - ',parent,' - ',surname) as `names`, 
            gender,kisw,his,eng,scie,geo,histry,civic,
            (kisw+his+eng+scie+geo+histry+civic) as `total`,
            ROUND((kisw+his+eng+scie+geo+histry+civic)/7,0) AS `average`,
            CASE
            WHEN ROUND((kisw+his+eng+scie+geo+histry+civic)/7,0) BETWEEN 41 AND 50 THEN 'A'
            WHEN ROUND((kisw+his+eng+scie+geo+histry+civic)/7,0) BETWEEN 31 AND 40 THEN 'B'
            WHEN ROUND((kisw+his+eng+scie+geo+histry+civic)/7,0) BETWEEN 21 AND 30 THEN 'C'
            WHEN ROUND((kisw+his+eng+scie+geo+histry+civic)/7,0) BETWEEN 11 AND 20 THEN 'D'
            ELSE 'F'
            END AS `gredi`,
            RANK() OVER(ORDER BY (kisw+his+eng+scie+geo+histry+civic) DESC) AS `position`,
            CASE
            WHEN ROUND((kisw+his+eng+scie+geo+histry+civic)/7,0) BETWEEN 41 AND 50 THEN 'Bora sana (Excellent)'
            WHEN ROUND((kisw+his+eng+scie+geo+histry+civic)/7,0) BETWEEN 31 AND 40 THEN 'Vizuri sana (Very Good)'
            WHEN ROUND((kisw+his+eng+scie+geo+histry+civic)/7,0) BETWEEN 21 AND 30 THEN 'Vizuri (Good)'
            WHEN ROUND((kisw+his+eng+scie+geo+histry+civic)/7,0) BETWEEN 11 AND 20 THEN 'Inaridhisha (satisfactory)'
            ELSE 'Feli (Fail)'
            END AS `comments`
            FROM `class7`");
            while($detail=mysqli_fetch_assoc($sql)){   
            ?>
            <tbody>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td style="text-align:left;"><?php echo $detail['names']; ?></td>
                    <!--<td><?php //echo $detail['parent']; ?></td>-->
                    <td style="background:silver;">
                        <?php
                          $gender=$detail['gender'];
                          if($gender=='FEMALE'){
                              echo "<b style='color:maroon;'>F</b>";
                          }elseif($gender=="MALE"){
                              echo "<b style='color:green;'>M</b>";
                          }
                     //echo $gender;
                         ?>
                   </td>
                    <td><?php echo $detail['kisw']; ?></td>
                    <td><?php echo $detail['his']; ?></td>
                    <td><?php echo $detail['eng']; ?></td>
                    <td><?php echo $detail['scie']; ?></td>
                    <td><?php echo $detail['geo']; ?></td>
                    <td><?php echo $detail['histry']; ?></td>
                    <td><?php echo $detail['civic']; ?></td>
                    <td><?php echo $detail['total']; ?></td>
                    <td><?php echo $detail['average']; ?></td>
                    <td><?php echo $detail['gredi']; ?></td>
                    <td><?php echo $detail['position']; ?></td>
                    <td><?php echo $detail['comments']; ?></td>
                </tr>
            </tbody>
            <?php
            }
            ?>
        </table>
    </body>
</html>
<?php
}
    ?>