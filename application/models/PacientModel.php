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
    
<<<<<<< HEAD
    function expose_c(){
=======
    function county_list(){
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
        $query = $this->db->get('county');
        return $query->result();
    }
    
<<<<<<< HEAD
    function expose_l(){
=======
    function locality_list(){
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
        $query = $this->db->get('locality');
       return $query->result();
    }
    
<<<<<<< HEAD
    function expose_m(){
        $query = $this->db->get('patient');
        return $query->result();
    }
=======
    function expose_c($county){
        $query=$this->db->query("SELECT county.name from county INNER JOIN patient on county.id_county = '$county' ");
        return $query->row();
    }
    
    function expose_l($locality){
        $query =$this->db->query("SELECT locality.name from locality INNER JOIN patient on locality.id_locality= '$locality' ");
        $this->db->limit(1);
       return $query->row();
    }
   
            
    function expose_m(){
        $query = $this->db->query("SELECT DISTINCT marital_status FROM patient limit 2");
        $this->db->limit(2);
        return $query->result();
    }
    
    
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07


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
<<<<<<< HEAD
   
        $this->db->where('name',$c_name);
         $query = $this->db->get('county');
        return $query->id_county;
}

public function get_idl($l_name){
   
        $this->db->where('name',$l_name);
         $query = $this->db->get('locality');
        return $query->id_locality;
=======
        $query = "select * from county where name = '$c_name'"; 
         return $query->id_county;
}

public function get_idl($l_name){
         $query = "select * from locality where name = '$l_name'"; 
         return $query->id_locality;
}

public function updatepatient($array, $id){
            {
             $this->db->where('id_patient', $id);
            $this->db->update('patient', $array);
           return true;
            
            }
            
>>>>>>> ef81eb56943f08a2fc9fdfd9ef9686cf6ddb6a07
}
   
    
    
}


