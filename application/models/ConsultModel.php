<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');
/**
 * Description of ConsultModel
 *
 * @author stefa
 */
class ConsultModel extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->helper('url', 'form' );
    $this->load->library('session');
  }
  
  public function getDemographicalData(){
    $id_patient = $_SESSION['id_patient'];
    $sql = "SELECT `patient`.*, `county`.`name`AS `county_name`, `locality`.`name` AS `locality_name` "
            . "FROM `patient` "
            . "INNER JOIN `county` ON `county`.`id_county` = `patient`.`id_county`"
            . "INNER JOIN `locality` ON `locality`.`id_locality` = `patient`.`id_locality`"
            . "WHERE `id_patient`='$id_patient';";
    $query = $this->db->query($sql);
    return $query->row_array();
  }
  
  

}
