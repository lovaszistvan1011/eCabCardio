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
    $this->load->helper(array('form', 'url'));
    $this->load->library('session');
  }

  public function getDemographicalData($patient) {
    $sql = "SELECT `patient`.*, `county`.`name`AS `county_name`, `locality`.`name` AS `locality_name` "
            . "FROM `patient` "
            . "INNER JOIN `county` ON `county`.`id_county` = `patient`.`id_county`"
            . "INNER JOIN `locality` ON `locality`.`id_locality` = `patient`.`id_locality`"
            . "WHERE `id_patient`='" . $patient . "';";
    $query = $this->db->query($sql);
    return $query->row_array();
  }

  public function getAnalysesList() {
    $sql = "SELECT * FROM `analyzes`;";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function getInvestigationsList() {
    $sql = "SELECT * FROM `investigations`;";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function getConsultById($id) {
    $sql = "SELECT `consult`.*, `employee`.`first_name` AS `employee_first_name`, `employee`.`last_name` AS `employee_last_name`, `employee`.`title` AS `employee_title` FROM `consult` INNER JOIN `employee` ON `consult`.`id_employee` = `employee`.`id_employee` WHERE `id_consult` = '$id';";
    $query = $this->db->query($sql);
    $sql2 = "SELECT `id_analyzes` FROM `consult_investigations` WHERE `id_consult` = '$id';";
    $query2 = $this->db->query($sql2);
    $sql3 = "SELECT `id_analyzes` FROM `consult_analyzes` WHERE `id_consult` = '$id';";
    $query3 = $this->db->query($sql3);
    $ret['consult'] = $query->row_array();
    $ret['investigations'] = $query2->result_array();
    $ret['analyzes'] = $query3->result_array();
    return $ret;
  }

  public function getConsultsList($patient) {
    $sql = "SELECT `consult`.`id_consult`, `consult`.`date`, `consult`.`id_employee`, `consult`.`consult_reasons`, `consult`.`remarks`, `consult`.`recommendations`, `consult`.`treatment`, `employee`.`first_name` AS `employee_first_name`, `employee`.`last_name` AS `employee_last_name`, `employee`.`title` AS `employee_title` "
            . "FROM `consult` "
            . "INNER JOIN `employee` ON `consult`.`id_employee` = `employee`.`id_employee` "
            . "WHERE `id_patient`='" . $patient . "';";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function saveConsult($consult = null, $investigations = null, $analyzes = null) {
    if ($consult['id_consult'] > 0) {
      $this->updateConsult($consult);
      $this->insertInvestigations('consult_investigations', $consult['id_consult'], $investigations);
      $this->insertInvestigations('consult_analyzes', $consult['id_consult'], $analyzes);
      $lastInsertId = $consult['id_consult'];
    } else {
      $lastInsertId = $this->insertConsult($consult);
      $this->insertInvestigations('consult_investigations', $lastInsertId, $investigations);
      $this->insertInvestigations('consult_analyzes', $lastInsertId, $analyzes);
    }
    return $lastInsertId;
  }

  private function insertConsult($consult) {
    $sql = "INSERT INTO `consult` (`physiological_antecedents`, `pathological_antecedents`, `hetero_collateral_antecedents`, `medium_conditions`, `present_status`, `vascular_apparatus`, `local_complementary_exams`, `personal_antecedents`, `consult_reasons`, `remarks`, `diagnostic`, `recommendations`, `treatment`, `id_patient`, `id_employee`) "
            . "VALUES ('" . $consult['physiological_antecedents'] . "', '" . $consult['pathological_antecedents'] . "', '" . $consult['hetero_collateral_antecedents'] . "', '" . $consult['medium_conditions'] . "', '" . $consult['present_status'] . "', '" . $consult['vascular_apparatus'] . "', '" . $consult['local_complementary_exams'] . "', '" . $consult['personal_antecedents'] . "', '" . $consult['consult_reasons'] . "', '" . $consult['remarks'] . "', '" . $consult['diagnostic'] . "', '" . $consult['recommendations'] . "', '" . $consult['treatment'] . "', '" . $consult['id_patient'] . "', '" . $this->session->id_employee . "');";
    $this->db->query($sql);
    return $this->db->insert_id();
  }

  private function updateConsult($consult) {
    $sql = "UPDATE `consult` SET "
            . "`physiological_antecedents` = '" . $consult['physiological_antecedents'] . "', "
            . "`pathological_antecedents` = '" . $consult['pathological_antecedents'] . "', "
            . "`hetero_collateral_antecedents` = '" . $consult['hetero_collateral_antecedents'] . "', "
            . "`medium_conditions` = '" . $consult['medium_conditions'] . "', "
            . "`present_status` = '" . $consult['present_status'] . "', "
            . "`vascular_apparatus` = '" . $consult['vascular_apparatus'] . "', "
            . "`local_complementary_exams` = '" . $consult['local_complementary_exams'] . "', "
            . "`personal_antecedents` = '" . $consult['personal_antecedents'] . "', "
            . "`consult_reasons` = '" . $consult['consult_reasons'] . "', "
            . "`remarks` = '" . $consult['remarks'] . "', "
            . "`diagnostic` = '" . $consult['diagnostic'] . "', "
            . "`recommendations` = '" . $consult['recommendations'] . "', "
            . "`treatment` = '" . $consult['treatment'] . "', "
//            . "`date` = '" . $consult['Date'] . "', "
            . "`id_patient` = '" . $consult['id_patient'] . "', "
            . "`id_employee` = '" . $this->session->id_employee . "' "
            . "WHERE `id_consult` = '" . $consult['id_consult'] . "';";
    $sql2 = "DELETE FROM `consult_investigations` WHERE `id_consult` = '" . $consult['id_consult'] . "';";
    $sql3 = "DELETE FROM `consult_analyzes` WHERE `id_consult` = '" . $consult['id_consult'] . "';";
    $this->db->query($sql2);
    $this->db->query($sql3);
    $this->db->query($sql);
  }

  private function insertInvestigations($table = null, $insertId = null, $items = null) {
    if (count($items) > 0) {
      $sql = "INSERT INTO `$table` (`id_consult`, `id_analyzes`) VALUES ";
      foreach ($items as $item) {
        $sql .= " ('" . $insertId . "', '" . $item . "'),";
      }
      $this->db->query(substr($sql, 0, -1) . ";");
    }
  }

}
