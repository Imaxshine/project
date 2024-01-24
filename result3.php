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
                MATOKEO YA WANAFUNZI WA DARASA LA TATU (III).
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
                    <th>HISTORIA<br/>YA<br/>TANZANIA</th>
                    <th>GEOGRAPHY</th>
                    <th>SCIENCE</th>
                    <th>DEVELOPING<br/>ARTIST<br/>AND<br/>SPORTS</th>
                    <th>JUMLA<br/>YA<br/>ALAMA(MARKS)</th>
                    <th>WASTANI</th>
                    <th>GREDI</th>
                    <th>NAFASI<br>YA<br/>UFAULU(POSITION)</th>
                    <th>MAONO</th>
                </tr>
            </thead>
            <?php
            $no=1;
            $sql=mysqli_query($conn,"SELECT CONCAT(pupil,' - ',parent,' - ',surname) AS `majina`,gender,kisw,his,eng,scie,geo,histry,develop,
            (kisw+his+eng+scie+geo+histry+develop) AS `jumla`,
            ROUND((kisw+his+eng+scie+geo+histry+develop)/7,1) AS `wastani`,
            CASE
            WHEN ROUND((kisw+his+eng+scie+geo+histry+develop)/7,0) BETWEEN 81 AND 100 THEN 'A'
            WHEN ROUND((kisw+his+eng+scie+geo+histry+develop)/7,0) BETWEEN 61 AND 80 THEN 'B'
            WHEN ROUND((kisw+his+eng+scie+geo+histry+develop)/7,0) BETWEEN 40 AND 60 THEN 'C'
            WHEN ROUND((kisw+his+eng+scie+geo+histry+develop)/7,0) BETWEEN 21 AND 39 THEN 'D'
            ELSE 'E'
            END AS `gredi`,
            RANK() OVER(ORDER BY `jumla` DESC) AS `Position`,
            CASE
            WHEN ROUND((kisw+his+eng+scie+geo+histry+develop)/7,0) BETWEEN 81 AND 100 THEN 'Bora sana (Excellent)'
            WHEN ROUND((kisw+his+eng+scie+geo+histry+develop)/7,0) BETWEEN 61 AND 80 THEN 'Vizuri sana (Very Good)'
            WHEN ROUND((kisw+his+eng+scie+geo+histry+develop)/7,0) BETWEEN 40 AND 60 THEN 'Vizuri (Good)'
            WHEN ROUND((kisw+his+eng+scie+geo+histry+develop)/7,0) BETWEEN 21 AND 39 THEN 'Inaridhisha (satisfactory)'
            ELSE 'Feli (Fail)'
            END AS `comment`
            FROM `class3`");
            while($detail=mysqli_fetch_assoc($sql)){   
            ?>
            <tbody>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td style="width:40%; text-align:left;"><?php echo $detail['majina']; ?></td>
                    
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
                    <td><?php echo $detail['develop']; ?></td>
                    <td><?php echo $detail['jumla']; ?></td>
                    <td><?php echo $detail['wastani']; ?></td>
                    <td><?php echo $detail['gredi']; ?></td>
                    <td><?php echo $detail['Position']; ?></td>
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
}
require_once('footer.php');
?>