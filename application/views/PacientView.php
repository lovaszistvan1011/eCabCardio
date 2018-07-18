
<html>
    <head>
        <title>Pacientii:</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.css">
    </head>
    <body>
    <?php $this->load->view('nav')?>
    <center>
        <h2> Pacient:</h2>
        <div>
              <table border="1">
                <thead class="blue-grey lighten-4">
                    <tr>
                        <th >Numar pacient</th>
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
                        if(is_null($rows1)){echo '';}
                else {echo $rows1->name;}
                        ?></td> 
                    </tr>
                    <tr>
                        <td>Localitate</td>
                        <td><?php
                         if(is_null($rows2)){echo '';}
                else {echo $rows2->name;}
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
        <br>
        <br>
     <a href="http://localhost/eCabCardio/index.php/PacientController/"><button class="btn btn-dark">Pagina principala</button></a>
     <a href="<?php echo base_url(); ?>PacientController/edit/<?php echo $rec->id_patient ?>"><button class="btn btn-dark" >Modific date pacient</button></a>
    </center></body>
   
</html>

