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
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    </head>
    <body> <center>
        <div>
            <p>Cautare dupa pacient (nume, prenume sau cnp):</p>     
           <form action="http://localhost/eCabCardio/index.php/PacientController/search_keyword" method="post">
                <p><input type="text" name="keyword" /></p>
                <p><input type="submit" value="Submit"/></p>
            </form>


=======
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.css">
    </head>
    <body> 
       <?php $this->load->view('nav')?>

    <center>
        
        <div>
            <br>
            <br>
            <h4 class="">Cautare dupa pacient (nume, prenume sau cnp):</h4>     
           <form action="http://localhost/eCabCardio/index.php/PacientController/search_keyword" method="post">
                <p><input type="text" name="keyword" /></p>
                <button type="submit" class="btn btn-primary" value="Cautare">Cautare</button>
            </form>

           
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07

        </div>
    </center>
    </body>
<<<<<<< HEAD
=======
    <footer> Posted by: Lovasz<br>
        <?php echo date("Y.m.d") . "<br>";?></footer>
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
</html>
