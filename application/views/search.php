<!doctype html>
<html lang="en">

    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/bootstrap.css">
    </head>
    <body> 
    
    <center>
        
     <div style="text-align: center;">
            <br>
            <br>
            <h4 class="">Cautare dupa pacient (nume, prenume sau cnp):</h4>     
           <form action="http://localhost/eCabCardio/index.php/PacientController/search_keyword" method="post">
                <p><input type="text" name="keyword" /></p>
                <button type="submit" class="btn btn-primary" value="Cautare">Cautare</button>
            </form>

           

        </div>
    </center>
    </body>
    <footer> </footer>
</html>
