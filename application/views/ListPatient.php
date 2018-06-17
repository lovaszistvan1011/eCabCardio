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
            <form method="post" name="newpatient" action="<?php echo site_url('PacientController/savedata');?>">
             <?php $query=$this->db->query("select * from patient where first_name = '{$_POST['list1']}' or last_name ='{$_POST['list2']}' or cnp = '{$_POST['list3']}' "); ?>  
                
            <br>
            <br>
            <br>
            <table border="1">
                <thead>
                    <tr>
                        <th>Numar pacient</th>
                        <th> <?php
                       // echo $_POST['list1'];
                            
             foreach($query->result() as $rec){echo $rec->id_patient;}
                        ?></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Prenume:</td>
                        <td> <?php
             foreach($query->result() as $rec){echo $rec->first_name;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Nume</td>
                        <td> <?php
             foreach($query->result() as $rec){echo $rec->last_name;}
                        ?></td>
                    </tr>
                        
                        <tr>
                        <td>Data nasterii</td>
                        <td> <?php
                   foreach($query->result() as $rec){echo $rec->birth_date;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Judet</td>
                         <td> <?php
               foreach($query->result() as $rec){$county=$rec->id_county;}          
               $query1=$this->db->query("SELECT county.name from county INNER JOIN patient on county.id_county = '$county' ");
              echo $query1->row()->name;
               
                        ?></td>
                    </tr>
                    <tr>
                        <td>Localitate</td>
                        <td>
                            <?php
                            foreach($query->result() as $rec){$locality=$rec->id_locality;}          
               $query1=$this->db->query("SELECT locality.name from locality INNER JOIN patient on locality.id_locality= '$locality' ");
          
              echo $query1->row()->name;

                  ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Adresa</td>
                        <td> <?php
             foreach($query->result() as $rec){echo $rec->address;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Ocupatie</td>
                        <td> <?php
             foreach($query->result() as $rec){echo $rec->occupation;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Loc de munca</td>
                      <td> <?php
             foreach($query->result() as $rec){echo $rec->job;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Telefon</td>
                        <td> <?php
             foreach($query->result() as $rec){echo $rec->phone;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> <?php
             foreach($query->result() as $rec){echo $rec->email;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>CNP</td>
                        <td> <?php
             foreach($query->result() as $rec){echo $rec->cnp;}
                        ?></td>
                    </tr>
                    <tr>
                        <td>Starea Civila</td>
                        <td> <?php
             foreach($query->result() as $rec){echo $rec->marital_status;}
                        ?></td>
                   
                </tbody>
            </table>
            <br>
           
            <label> <?php// echo count($_POST)?></label>
            
             <a href="http://localhost/eCabCardio/index.php/PacientController/edit"><button>Pacient nou</button></a> 
              
        </div>
    </center>
    </body>
</html>
