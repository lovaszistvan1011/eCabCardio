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
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    </head>
    <body> <center>
        <div>
            <p>Cautare dupa pacient (nume, prenume sau cnp):</p>     
           <form action="http://localhost/eCabCardio/index.php/PacientController/search_keyword" method="post">
                <p><input type="text" name="keyword" /></p>
                <p><input type="submit" value="Submit"/></p>
            </form>



        </div>
    </center>
    </body>
</html>