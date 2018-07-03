
<html>
    <head>
        <title>Pacientii:</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    </head>
    <body><center>
        <h2> Pacient</h2>
        <div>



          <form method='post' action="<?= base_url() ?>index.php/PacientController/savedata" > 
          <!--  <form method="post" name="newpatient" action="<?php echo site_url('PacientController/savedata');?>">--> 
                <table border="1">


                    <tr>
                        <td><label for="first_name">Prenume</label></td>
                        <td><input type="text" name="first_name" size="50" /></td>
                    </tr>
                    <tr>
                        <td><label for="last_name">Nume</label></td>
                        <td><input type="text" name="last_name" size="50" /></td>
                    </tr>
                    <tr>
                        <td><label for="birth_date">Data nasterii</label></td>
                        <td><input type="date" name="birth_date" size="50" /></td>
                    </tr>
                    <tr>
                        <td><label for="address">Adresa</label></td>
                        <td><input type="text" name="address" size="50" /></td>
                    </tr>
                    <tr>
                        <td><label for="occupation">Profesie</label></td>
                        <td><input type="text" name="occupation" size="50" /></td>
                    </tr> 
                    <tr>
                        <td><label for="job">Loc de munca</label></td>
                        <td><input type="text" name="job" size="50" /></td>
                    </tr>  
                    <tr>
                        <td><label for="phone">Telefon</label></td>
                        <td><input type="text" name="phone" size="10" /></td>
                    </tr> 
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="text" name="email" size="50" /></td>
                    </tr>
                    <tr>
                        <td><label for="cnp">CNP</label></td>
                        <td><input type="text" name="cnp" size="13" /></td>
                    </tr> 

                    <tr>
                        <td>Starea Civila</td>
                        <td><select name="list1"><option value="marital"><?php
                                    foreach ($rows3 as $row) {
                                        echo "<option>" .$row->marital_status . "</option>";
                                    
                                    }
                                    ?></option></select>
                        </td> 
                    </tr>
                    <tr>
                        <td>Judet</td>                                    
                            
                       <td><select  name="listp"><option value="contyn"><?php
                                    // $query1= $this->db->get('county');        
                                    foreach ($rows1 as $row) {
                                        // echo $row->'name';
                                        //$selectid =$line->id_county;
                                        echo "<option>" . $row->name . "</option>";
                                        $row->id_county;
                                    }
                                    ?>

                                </option></select>
                        </td> 

                    </tr>
                    <tr>
                        <td>Localitate <td><select  name="listl"><option value="localityn"><?php
                                   foreach ($rows2 as $row) {
                                        echo "<option>" . $row->name . "</option>";
                                    }
                                    ?>
                                </option></select>
                    </tr>




                </table>
                <input type="submit" name="submit" value="Add patient" >


            </form>
            <?php ?>
            <a href="http://localhost/eCabCardio/index.php/PacientController/"><button>Inapoi</button></a>


        </div>
    </center>
</body>
</html>

