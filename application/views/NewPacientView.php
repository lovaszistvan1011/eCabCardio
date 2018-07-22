<!doctype html>
<html lang="en">
    <head>
        <title>Pacientii:</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.css">
    </head>
    <body>
    <?php $this->load->view('templates/header')?>
    <?php $this->load->view('templates/menu')?>
    <?php $this->load->view('nav')?>
    <center>
        <h2> Pacient</h2>
        <div>



            <form method='post' action="<?= base_url() ?>index.php/PacientController/savedata" > 
             
                <table border="1">


                    <tr>
                        <td><label for="first_name">Prenume *</label></td>
                        <td><input type="text" name="first_name" size="50" /></td>
                    </tr>
                    <tr>
                        <td><label for="last_name">Nume *</label></td>
                        <td><input type="text" name="last_name" size="50" /></td>
                    </tr>
                    <tr>
                        <td><label for="birth_date">Data nasterii *</label></td>
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
                        <td><label for="cnp">CNP *</label></td>
                        <td><input type="text" name="cnp" size="13" /></td>
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

                        <td><select name="listc" id="pos_select" class="form_input"><?php    
                                foreach ($rows1 as $row) {
                                    ?><option value="<?php echo $row->id_county ?>"><?php echo $row->name ?></option>
                                <?php } ?></select>
                        </td> 

                    </tr>

                    <tr>
                        <td><label>Localitate</label> </td>
                        <td><select name="listl" id="pos_select" class="form_input"><?php
                                foreach ($rows2 as $row) {
                                    ?><option value="<?php echo $row->id_locality ?>"><?php echo $row->name ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                </table>
                <p>* completare obligatorie</p>
                <br>
                <button type="submit" class="btn btn-primary" >Adauga!</button>         

            </form>
                <br>
                
            <a href="http://localhost/eCabCardio/index.php/PacientController/"><button class="btn btn-dark">Pagina principala</button></a>


        </div>
    </center>
</body>

</html>

