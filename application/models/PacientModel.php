<?php

class PacientModel extends CI_Model {
    public function __construct() {
        $this->load->database();
    }
    
    public function getData(){
        $query = $this->db->get('patient');
        return $query->result();
    }
  
    
    public function insert_into_db(){
        $f1 = $_POST['number'];
        $f2 = $_POST['fname'];
        $f3 = $_POST['lname'];
        $f4 = $_POST['date'];
        $f5 = $_POST['county'];
        $f6 = $_POST['locality'];
        $f7 = $_POST['adress'];
        $f8 = $_POST['occupation'];
        $f9 = $_POST['job'];
        $f10 = $_POST['phone'];
        $f11 = $_POST['email'];
        $f12 = $_POST['ID'];
        $f13 = $_POST['marital'];       
         
    }
       
    
}


