<?php

class PacientModel extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this->load->helper('url');
    }
    
    function search($keyword)
    {        
        $this->db->or_like(array('first_name'=>$keyword,'last_name'=>$keyword,'cnp'=>$keyword ));
        $query  =   $this->db->get('patient');
        return $query->result();
    }
    
    function expose_c(){
        $query = $this->db->get('county');
        return $query->result();
    }
    
    function expose_l(){
        $query = $this->db->get('locality');
       return $query->result();
    }
    
    function expose_m(){
        $query = $this->db->get('patient');
        return $query->result();
    }


    public function getData() {
        $this->db->where('first_name', $fn);
        $this->db->where('last_name', $ln);
        $this->db->where('cnp', $cn);
        $query = $this->db->get('patient');
        return $query->result();
    }
  
    function form_insert($new_patient){

    $this->db->insert('patient', $new_patient);
}
   

        public function insert_into_db(){
      
       $new_patient = array ("", $_POST['fname'],$_POST['lname'], $_POST['date'], $_POST['county'], 
           $_POST['locality'], $_POST['adress'], $_POST['occupation'], $_POST['job'], $_POST['phone'],
            $_POST['email'], $_POST['ID'],$_POST['marital']       
    ) ;
       $this->db->insert('patient', $new_patient);    
    }
   
    
    
}


