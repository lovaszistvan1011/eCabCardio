
<html>
    <head>
        <title>Pacientii:</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
<<<<<<< HEAD
        
=======
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.css">
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
    </head>
    <body><center>
        <h2> Pacient:</h2>
        <div>
<<<<<<< HEAD
            
            <table border="1">
                <thead>
                    <tr>
                        <th>Numar pacient</th>
=======
              <table border="1">
                <thead class="blue-grey lighten-4">
                    <tr>
                        <th >Numar pacient</th>
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
                        <th> <?php
             foreach($records as $rec){echo $rec->id_patient;}
                        ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Prenume:</td>
                        <td> <?php
             foreach($records as $rec){echo $rec->first_name;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Nume</td>
                        <td> <?php
             foreach($records as $rec){echo $rec->last_name;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Data nasterii</td>
                        <td> <?php
             foreach($records as $rec){echo $rec->birth_date;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Judet</td>
                        <td><?php
<<<<<<< HEAD
                 foreach($records as $rec){$county= $rec->id_county;             
                     
              $query1=$this->db->query("SELECT county.name from county INNER JOIN patient on county.id_county = '$county' ");
              echo $query1->row()->name;
                 }
                        ?></td>
=======
                echo $rows1->name;
                        ?></td> 
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
                    </tr>
                    <tr>
                        <td>Localitate</td>
                        <td><?php
<<<<<<< HEAD
                 foreach($records as $rec){$locality= $rec->id_locality;             
                     
               $query1=$this->db->query("SELECT locality.name from locality INNER JOIN patient on locality.id_locality= '$locality' ");
              echo $query1->row()->name;
                 }
=======
                echo $rows2->name;
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
                        ?></td>
                    </tr>
                    <tr>
                        <td>Adresa</td>
                        <td> <?php
             foreach($records as $rec){echo $rec->address;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Ocupatie</td>
                        <td> <?php
             foreach($records as $rec){echo $rec->occupation;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Loc de munca</td>
                      <td> <?php
             foreach($records as $rec){echo $rec->job;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Telefon</td>
                        <td> <?php
             foreach($records as $rec){echo $rec->phone;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> <?php
             foreach($records as $rec){echo $rec->email;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>CNP</td>
                        <td> <?php
             foreach($records as $rec){echo $rec->cnp;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Starea Civila</td>
                        <td> <?php
             foreach($records as $rec){echo $rec->marital_status;}
                        ?></td>
                   
                </tbody>
            </table>                
        
         
            
        </div>
<<<<<<< HEAD
     <a href="http://localhost/eCabCardio/index.php/PacientController/"><button>Inapoi</button></a>
    </center></body>
=======
        <br>
        <br>
     <a href="http://localhost/eCabCardio/index.php/PacientController/"><button class="btn btn-dark">Pagina principala</button></a>
     <a href="<?php echo base_url(); ?>PacientController/edit/<?php echo $rec->id_patient ?>"><button class="btn btn-dark" >Modific date pacient</button></a>
    </center></body>
    <footer> Posted by: Lovasz</footer>
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
</html>

