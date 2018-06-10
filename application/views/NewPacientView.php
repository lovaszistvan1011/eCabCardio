
<html>
    <head>
        <title>Pacientii:</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body><center>
        <h2> Pacient</h2>
        <div>
            
                    
            
            <form method="post" name="newpatient">

            <table border="1">
          <!--      <thead>                   
                  <tr>
                        <th>Numar pacient</th>
                        <th><input type="text" name="number" value="" size="50" /></th>
                       
                    </tr>
                </thead> -->
                <tbody>
                    <tr>
                        <td>Prenume:</td>
                      <td><input type="text" name="fname" value="" size="50" /></td>
                    </tr>
                    <tr>
                        <td>Nume</td>
                        <td><input type="text" name="lname" value="" size="50" /></td>
                    </tr>
                    <tr>
                        <td>Data nasterii</td>
                        <td><input type="date" name="date" value="" size="50" /></td>
                    </tr>
                    <tr>
                        <td>Judet</td>
                        <td><select  name="listp"><option value="contyn"><?php
            // $query1= $this->db->get('county');        
             foreach ($rows1 as $row){
            // echo $row->'name';
             //$selectid =$line->id_county;
               echo "<option>".$row->name."</option>";
             }
             ?>
                   
                                </option></select>
                       </td>
                       
                    </tr>
                    <tr>
                        <td>Localitate <td><select  name="listl"><option value="localityn"><?php
             // $query2=$this->db->get('locality');
             foreach($rows2 as $row){
              echo "<option>".$row->name."</option>";
             }
                        ?>
                                </option></select>
                    </tr>
                    <tr>
                        <td>Adresa</td>
                       <td><input type="text" name="adress" value="" size="50" /></td>
                    </tr>
                    <tr>
                        <td>Ocupatie</td>
                        <td><input type="text" name="occupation" value="" size="50" /></td>
                    </tr>
                    <tr>
                        <td>Loc de munca</td>
                      <td><input type="text" name="job" value="" size="50" /></td>
                    </tr>
                    <tr>
                        <td>Telefon</td>
                       <td><input type="text" name="phone" value="" size="13" /></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                       <td><input type="text" name="email" value="" size="50" /></td>
                    </tr>
                    <tr>
                        <td>CNP</td>
                        <td><input type="text" name="ID" value="" size="13" /></td>
                    </tr>
                    <tr>
                       <td>Starea Civila</td>
                        <td><select name="list1"><option value="marital"><?php
                     foreach($rows3 as $row){
              echo "<option>".$row->marital_status."</option>";
             }
             
                        ?></option></select>
                      </td> 
                </tbody>

            </table>

          
            <button type="submit" name="save" >Salveaza</button>
            </form>
            <a href="http://localhost/eCabCardio/index.php/PacientController/"><button>Inapoi</button></a>
            
         
    </div>
    </center>
    </body>
</html>

