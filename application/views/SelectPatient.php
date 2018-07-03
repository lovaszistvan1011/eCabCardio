<<<<<<< HEAD
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
=======
<!doctype html>
<html lang="en">
    
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
=======
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>bootstrap.css">
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
    </head>
    <body> <center>
        
            
        <div>
            <div>
                
            </div>
       
            <br>    
            <p>Rezultatul cautarii:</p>             
            <table border='2' width='40%' style="border-collapse: collapse">
            <tr>
                
<<<<<<< HEAD
                <th>Prenume</th>
                <th>Nume</th>
                <th>CNP</th>
=======
                <th class="fonta">Prenume</th>
                <th>Nume</th>
                <th>CNP</th>
                <th></th>
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
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
<<<<<<< HEAD
           <td><a href="<?php echo base_url(); ?>PacientController/details/<?php echo $row->id_patient ?>"><button>Info</button></a></td>
=======
             <td><a href="<?php echo base_url(); ?>PacientController/details/<?php echo $row->id_patient ?>"><button  class="btn btn-dark">Detalii</button></a> 
                 <a href="<?php echo base_url(); ?>PacientController/edit/<?php echo $row->id_patient ?>"><button  class="btn btn-dark">Modificare</button></a>
               </td>
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
            <?php
                echo "</tr>";
            }
            ?>
            </table>       
            <?php          //    var_dump($l_id) ?>
<<<<<<< HEAD
            <a href="http://localhost/eCabCardio/index.php/PacientController/insert_data"><button>Pacient nou</button></a>
        </div>
            <p><?php echo $links; ?></p>
          </center>
    
=======
            <br>
            <a href="http://localhost/eCabCardio/index.php/PacientController/insert_data"><button  class="btn btn-dark">Pacient nou</button></a>
        </div>
        <br>
        <nav aria-label="...">
            <ul class="pagination-lg">
                <li class="pagination btn-dark">
            
                    <span class="page-link">
                       <?php echo $links; ?>
                        
                    </span>
                
                </li>
            </ul>
        </nav>
     
          </center>
  
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
    </body>
</html>
