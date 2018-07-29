<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of ClinicModel
 *
 * @author stefa
 */
class ClinicModel extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->helper(array('form', 'url'));
    $this->load->library('session');
  }

  public function getClinic() {
    $sql = "SELECT * FROM `clinic`;";
    $query3 = $this->db->query($sql);
    return $query3->row_array();
  }

  public function setClinic() {
    $sql = "UPDATE `clinic` SET `name`='" . $this->input->post('name') . "', `logo`='" . $this->input->post('logo') . "', `fiscal_numbar`='" . $this->input->post('fiscal_numbar') . "', `trade_number`='" . $this->input->post('trade_number') . "', `address`='" . $this->input->post('address') . "', `bank`='" . $this->input->post('bank') . "', `iban`='" . $this->input->post('iban') . "', `phone`='" . $this->input->post('phone') . "', `email`='" . $this->input->post('email') . "', `www`='" . $this->input->post('www') . "';";
    $this->db->query($sql);
  }

}
