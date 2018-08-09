<!doctype html>
<html lang="en">
    
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>bootstrap.css">
    </head>
    <body> <center>
        
            
        <div>
            <div>
                
            </div>
       
            <br>    
            <p>Rezultatul cautarii:</p>             
            <table border='2' width='40%' style="border-collapse: collapse">
            <tr>
                
                <th class="fonta">Prenume</th>
                <th>Nume</th>
                <th>CNP</th>
                <th></th>
             </tr>
            <?php
            foreach ($results as $row) {
            
                echo "<td>" .$row->first_name . "</td>";
                echo "<td>" .$row->last_name . "</td>";
                echo "<td>" .$row->cnp . "</td>";
                ?>
             <td><a href="<?php echo base_url(); ?>PacientController/details/<?php echo $row->id_patient ?>"><button  class="btn btn-dark">Detalii</button></a> 
                 <a href="<?php echo base_url(); ?>PacientController/edit/<?php echo $row->id_patient ?>"><button  class="btn btn-dark">Modificare</button></a>
                 <a href="<?php echo base_url(); ?>ConsultController/index/<?php echo $row->id_patient ?>"><button  class="btn btn-dark">Consultare</button></a>
               </td>
            <?php
                echo "</tr>";
            }
            ?>
            </table>       
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
  
    </body>
</html>
