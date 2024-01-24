<?php
include_once('connect.php');
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
                MATOKEO YA WANAFUNZI WA DARASA LA PILI (II).
            </h3>
        </div>
        
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>MAJINA</th>
                    <!--<th>SECOND NAME</th>-->
                    <th>GENDER</th>
                    <th>READING</th>
                    <th>WRITING</th>
                    <th>ARITHMETIC</th>
                    <th>HEALTH CARE</th>
                    <th>KUSOMA</th>
                    <th>KUANDIKA</th>
                    <th>JUMLA<br/>YA<br/>ALAMA(MARKS)</th>
                    <th>WASTANI</th>
                    <th>GREDI</th>
                    <th>NAFASI<br>YA<br/>UFAULU(POSITION)</th>
                    <th>MAONI</th>
                </tr>
            </thead>
            <?php
            $no=1;
            $sql=mysqli_query($conn,"SELECT CONCAT(pupil,' - ',parent,' - ',surname) AS `names`,gender,kisw,his,eng,scie,geo,histry,
            (kisw+his+eng+scie+geo+histry) AS `total`,
            ROUND((kisw+his+eng+scie+geo+histry)/6,1) AS `average`,
            CASE
            WHEN ROUND((kisw+his+eng+scie+geo+histry)/6,1) BETWEEN 81 AND 100 THEN 'A'
            WHEN ROUND((kisw+his+eng+scie+geo+histry)/6,1) BETWEEN 61 AND 80 THEN 'B'
            WHEN ROUND((kisw+his+eng+scie+geo+histry)/6,1) BETWEEN 40 AND 60 THEN 'C'
            WHEN ROUND((kisw+his+eng+scie+geo+histry)/6,1) BETWEEN 21 AND 39 THEN 'D'
            ELSE 'E'
            END AS `gredi`,
            RANK() OVER(ORDER BY (kisw+his+eng+scie+geo+histry) DESC) AS `position`,
            CASE
            WHEN ROUND((kisw+his+eng+scie+geo+histry)/6,1) BETWEEN 81 AND 100 THEN 'Bora sana (Excellent)'
            WHEN ROUND((kisw+his+eng+scie+geo+histry)/6,1) BETWEEN 61 AND 80 THEN 'Vizuri sana (Very Good)'
            WHEN ROUND((kisw+his+eng+scie+geo+histry)/6,1) BETWEEN 40 AND 60 THEN 'Vizuri (Good)'
            WHEN ROUND((kisw+his+eng+scie+geo+histry)/6,1) BETWEEN 21 AND 39 THEN 'Inaridhisha (satisfactory)'
            ELSE 'Feli (Fail)'
            END AS `comment`
            FROM `class2`");
            while($detail=mysqli_fetch_assoc($sql)){   
            ?>
            <tbody>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $detail['names']; ?></td>
                    
                    <!--<td><?php //echo $detail['parent']; ?></td>-->
                    <td>
                        <?php
                          $gender=$detail['gender'];
                          if($gender=='FEMALE'){
                              echo "F";
                          }elseif($gender=="MALE"){
                              echo "M";
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
                    <td><?php echo $detail['total']; ?></td>
                    <td><?php echo $detail['average']; ?></td>
                    <td><?php echo $detail['gredi']; ?></td>
                    <td><?php echo $detail['position']; ?></td>
                    <td><?php echo $detail['comment']; ?></td>
                </tr>
            </tbody>
            <?php
            }
            ?>
        </table>
    </body>
</html>
<?php
require_once('footer.php');
?>