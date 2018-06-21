<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body> <center>
        
            
        <div>
            <div>
                
            </div>
       
            <br>    
            <p>Rezultatul cautarii:</p>             
            <table border='2' width='40%' style="border-collapse: collapse">
            <tr>
                
                <th>Prenume</th>
                <th>Nume</th>
                <th>CNP</th>
             </tr>
            <?php
            foreach ($results as $row) {
               $fn =  $row->first_name ;
               $ln =  $row->last_name ;
               $cn =  $row->cnp ;
               
                
                
                echo "<td>" .$row->first_name . "</td>";
                echo "<td>" .$row->last_name . "</td>";
                echo "<td>" .$row->cnp . "</td>";
                ?>
           <td><a href="<?php echo base_url(); ?>PacientController/details/<?php echo $row->id_patient ?>"><button>Info</button></a></td>
            <?php
                echo "</tr>";
            }
            ?>
            </table>       
            <?php          //    var_dump($l_id) ?>
            <a href="http://localhost/eCabCardio/index.php/PacientController/insert_data"><button>Pacient nou</button></a>
        </div>
            <p><?php echo $links; ?></p>
          </center>
    
    </body>
</html>
