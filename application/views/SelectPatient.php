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
            <p>Selectare pacient dupa: </p>
             
            <form action="#" name = "form1" method="post">
               <label>Prenume</label>
                <select  name="list1"><option value=""><?php
                                   $query=$this->db->query('select * from patient');
                                    foreach ($query->result() as $row){
                                        $sfn = $row->first_name;
                                        echo "<option>".$sfn."</option>";
                                    }                                    
                                  ?>
                </option>
                
                </select><input type="submit" name="submit" formaction="http://localhost/eCabCardio/index.php/PacientController/listP" value="Selectare!"/>
                
                <?php
                if (isset($_POST['submit'])) {
                    $selected_val = $_POST['list1'];  // Storing Selected Value In Variable
                    //echo "You have selected :" . $selected_val;  // Displaying Selected Value
                }
                ?>    
                
                                 </br>
                
                                 <label>Nume</label>
              <select  name="list2"><option value="num"><?php
                                    $query1=$this->db->query("select * from patient");
                                    foreach ($query1->result() as $row){
                                        $sln = $row->last_name;
                                        echo "<option>".$sln."</option>";
                                    }
                                  ?>
                  </option>

              </select><input type="submit" name="submit" formaction="http://localhost/eCabCardio/index.php/PacientController/listP" value="Selectare!"/>
              
              <?php
              if (isset($_POST['submit'])) {
                  $selected_val = $_POST['list2'];  // Storing Selected Value In Variable
                 // echo "You have selected :" . $selected_val;  // Displaying Selected Value
              }
              ?>    
              </br>
              <label>CNP</label>
              <select  name="list3"><option value=""><?php
                      $query2 = $this->db->query("select * from patient ");
                      foreach ($query2->result() as $row) {
                          $cnp = $row->cnp;
                          echo "<option>" . $cnp . "</option>";
                      }
                      ?>
                   </option>
               </select><input type="submit" name="submit" formaction="http://localhost/eCabCardio/index.php/PacientController/listP" value="Selectare!"/>
              <?php
              if (isset($_POST['submit'])) {
                  $selected_val = $_POST['list2'];  // Storing Selected Value In Variable
                //  echo "You have selected :" . $selected_val;  // Displaying Selected Value
              }
              ?> 

                </br>
            
           
             </form>
                 
                
            <br>
            <br>
            <br>
           <!--<a href ="edit?patId=1" <?php ?> ><button>Pacient nou</button></a> -->
            <a href="http://localhost/eCabCardio/index.php/PacientController/edit"><button>Pacient nou</button></a>
        </div>
    </center>
    </body>
</html>
