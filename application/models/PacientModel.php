<?php

class PacientModel extends CI_Model {
    public function __construct() {
        $this->load->database();
        $this->load->helper('url');
    }
    
    public function record_count() {
 
       return $this->db->count_all("patient"); 
   }
   
    public function fetch_departments($limit, $start, $keyword) {
 
       $this->db->limit($limit, $start);
       $this->db->or_like(array('first_name'=>$keyword,'last_name'=>$keyword,'cnp'=>$keyword ));
       $query = $this->db->get("patient");
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
   
    function search($keyword)
    {    
       // $this->db->limit($limit, $start);
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


    public function getData($id) {
       $this->db->where('id_patient', $id);
       $query = $this->db->get('patient');
        return $query->result();
    }
  
   public function form_insert($array){
    {
    $this->db->insert('patient', $array);
    $idOfInsertedData = $this->db->insert_id();
    }
     return $idOfInsertedData ;
}
    public function get_idc($c_name){
   
        $this->db->where('name',$c_name);
         $query = $this->db->get('county');
        return $query->id_county;
}

public function get_idl($l_name){
   
        $this->db->where('name',$l_name);
         $query = $this->db->get('locality');
        return $query->id_locality;
}
   
    
    
}


