<?php

/**
 * Description of ConsultModel
 *
 * @author stefa
 */
class ConsultModel extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->helper('url');
  }
  
  

}
