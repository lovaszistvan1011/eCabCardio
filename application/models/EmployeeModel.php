<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of EmployeeModel
 *
 * @author stefa
 */
class EmployeeModel extends CI_Model {

  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->helper(array('form', 'url'));
    $this->load->library('session');
  }

  public function getEmployeeList() {
    $sql = "SELECT * FROM `employee` ORDER BY `first_name`, `last_name`";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function getEmployeeById($id_employee) {
    $sql = "SELECT * FROM `employee` WHERE `id_employee` = '$id_employee';";
    $query = $this->db->query($sql);
    return $query->row_array();
  }

  public function setEmployee() {
    $sql = $this->setEmployeeSql();
    $this->db->query($sql);
  }

  public function updateEmployeePass() {
    if (strlen($this->input->post('pass') > 0)) {
      $pass = password_hash($this->input->post('pass'), PASSWORD_BCRYPT);
      $sql = "UPDATE `employee` SET `pass` = '$pass' WHERE `id_employee` = '" . $this->input->post('id_employee') . "';";
      $this->db->query($sql);
    }
  }

  private function setEmployeeSql() {
    if ($this->input->post('id_employee') > 0) {
      $this->updateEmployeePass();
      $sql = "UPDATE `employee` SET `first_name` = '" . $this->input->post('first_name') . "', `last_name` = '" . $this->input->post('last_name') . "', `user` = '" . $this->input->post('user') . "', `title` = '" . $this->input->post('title') . "' $pass WHERE `id_employee` = '" . $this->input->post('id_employee') . "';";
    } else {
      $sql = "INSERT INTO `employee` (`first_name`, `last_name`, `user`, `pass`, `title`) VALUES ('" . $this->input->post('first_name') . "', '" . $this->input->post('last_name') . "', '" . $this->input->post('user') . "', '" . password_hash($this->input->post('pass'), PASSWORD_BCRYPT) . "', '" . $this->input->post('title') . "');";
    }
    return $sql;
  }

  public function deleteEmployee() {
    $sql = "DELETE FROM `employee` WHERE `id_employee`='" . $this->input->post('id_employee') . "';";
    $this->db->query($sql);
  }

}
