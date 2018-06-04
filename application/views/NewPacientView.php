
<html>
    <head>
        <title>Pacientii:</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
    </head>
    <body><center>
        <h2> Pacienti:</h2>
        <div>
            
                    
            
                            <form method="post">

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
                     //   $query = $this->db->query("select * from patient");
               //foreach($query->result() as $rec){$county=$rec->id_county;}          
               $query1=$this->db->query("SELECT * from county ");
             foreach($query1->result() as $row){
             $select = $row->name;
             $selectid =$row->id_county;
               echo "<option>".$select."</option>";
             }
             ?>
                   
                                </option></select>
                       </td>
                       
                    </tr>
                    <tr>
                        <td>Localitate <td><select  name="listl"><option value="localityn"><?php
              
              // $query2=$this->db->query("SELECT name from locality where locality.id_county = '$selectid' ");
               $query2=$this->db->query("SELECT name from locality");
             foreach($query2->result() as $row){
             
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
                      <td><input type="text" name="marital" value="" size="50" /></td>
                   
                </tbody>

            </table>

          
            <button type="submit">Inregistrare</button>
            </form>
            <a href="http://localhost/eCabCardio/index.php/PacientController/"><button>Inapoi</button></a>
            
         
    </div>
    </center>
    </body>
</html>

