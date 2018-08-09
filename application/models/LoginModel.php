<?php

class LoginModel extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->helper('url');
    }

    public function can_login($username,$password){
        $this->db->where('user', $username);
        $this->db->where('pass', $password);
        $query = $this->db->get('employee');
        
        if($query->num_rows()>0)
         {
            return true; 
        }
        else
        {
            return false;
        }   
    }
   
}