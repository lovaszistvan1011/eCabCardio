<!doctype html>
<html lang="en">
    <head>
        <title>Pacientii:</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.css">
    </head>
    <body>
       
    <center>
        <h2> Pacient</h2>
        <div>
<?php

if(isset($data)){
    ?>

            <form method='post' action="<?= base_url() ?>index.php/PacientController/editpatient" > 
          
                <table border="1">


                    <tr>
                        <td><label for="first_name">Prenume</label></td>
                        <td><input type="hidden" name="idp" value="<?php echo $data[0]->id_patient ?>"/>
                        <input type="text" name="first_name"  value="<?php echo $data[0]->first_name ?>"/></td>
                    </tr>
                    <tr>
                        <td><label for="last_name">Nume</label></td>
                        <td><input type="text" name="last_name" value="<?php echo $data[0]->last_name ?>" /></td>
                    </tr>
                    <tr>
                        <td><label for="birth_date">Data nasterii</label></td>
                        <td><input type="text" name="birth_date" value="<?php echo $data[0]->birth_date ?>" /></td>
                    </tr>
                    <tr>
                        <td><label for="address">Adresa</label></td>
                        <td><input type="text" name="address" value="<?php echo $data[0]->address ?>"  /></td>
                    </tr>
                    <tr>
                        <td><label for="occupation">Profesie</label></td>
                        <td><input type="text" name="occupation" value="<?php echo $data[0]->occupation ?>"  /></td>
                    </tr> 
                    <tr>
                        <td><label for="job">Loc de munca</label></td>
                        <td><input type="text" name="job" value="<?php echo $data[0]->job ?>"  /></td>
                    </tr>  
                    <tr>
                        <td><label for="phone">Telefon</label></td>
                        <td><input type="text" name="phone" size="10" value="<?php echo $data[0]->phone ?>" /></td>
                    </tr> 
                    <tr>
                        <td><label for="email">Email</label></td>
                        <td><input type="text" name="email" value="<?php echo $data[0]->email ?>" /></td>
                    </tr>
                    <tr>
                        <td><label for="cnp">CNP</label></td>
                        <td><input type="text" name="cnp" size="13" value="<?php echo $data[0]->cnp ?>" /></td>
                    </tr> 

                    <tr>
                        <td><label>Starea Civila</label></td>
                        <td><select name="listm" id="pos_select" class="form_input">    
                                <option value="married">married</option>
                             <option value="unmarried">unmarried</option>
                            </select>
                        </td> 
                    </tr>
                    
                    <tr>
                        <td><label>Judet</label></td>                                    
                       
                        <td><?php if(is_null($row1)){echo ' ';} else {echo $row1->name;} ?><br><select name="listc" id="pos_select" class="form_input"><?php    
                                foreach ($rows1 as $row) {
                                    ?><option value="<?php echo $row->id_county ?>"><?php echo $row->name ?></option>
                                <?php } ?></select>
                        </td> 

                    </tr>
                    

                    <tr>
                        <td><label>Localitate</label> </td>
                        
                        <td><?php if(is_null($row2)){echo '';} else {echo $row2->name; } ?><br><select name="listl" id="pos_select" class="form_input"><?php
                                foreach ($rows2 as $row) {
                                    ?><option value="<?php echo $row->id_locality ?>"><?php echo $row->name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                </table>
<?php
    }
?>
                <br>
               <button type="submit" class="btn btn-primary" >Modific!</button>
               


            </form>
            <br>
            <a href="http://localhost/eCabCardio/index.php/PacientController/"><button  class="btn btn-dark">Pagina principala</button></a>


        </div>
    </center>
</body>

</html>

