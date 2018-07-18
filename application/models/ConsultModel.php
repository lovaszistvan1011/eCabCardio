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

  public function getDemographicalData() {
    $sql = "SELECT `patient`.*, `county`.`name`AS `county_name`, `locality`.`name` AS `locality_name` "
            . "FROM `patient` "
            . "INNER JOIN `county` ON `county`.`id_county` = `patient`.`id_county`"
            . "INNER JOIN `locality` ON `locality`.`id_locality` = `patient`.`id_locality`"
            . "WHERE `id_patient`='" . $this->session->id_patient . "';";
    $query = $this->db->query($sql);
    return $query->row_array();
  }

  public function getAnalysesList() {
    $sql = "SELECT * "
            . "FROM `analyzes` "
            . ";";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function getInvestigationsList() {
    $sql = "SELECT * "
            . "FROM `investigations` "
            . ";";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function getConsultsList() {
    $sql = "SELECT `consult`.`id_consult`, `consult`.`date`, `consult`.`id_employee`, `consult`.`consult_reasons`, `consult`.`remarks`, `consult`.`recommendations`, `consult`.`treatment`, `employee`.`first_name` AS `employee_first_name`, `employee`.`last_name` AS `employee_last_name`, `employee`.`title` AS `employee_title` "
            . "FROM `consult` "
            . "INNER JOIN `employee` ON `consult`.`id_employee` = `employee`.`id_employee` "
            . "WHERE `id_patient`='" . $this->session->id_patient . "';";
    $query = $this->db->query($sql);
    return $query->result_array();
  }

  public function saveConsult($consult = null, $investigations = null, $analyzes = null) {
    $sql = "";
    $sql2 = "";
    $sql3 = "";
    $sql4 = "";
    if ($consult['Id_consult'] > 0) {
      $sql .= "UPDATE `consult` SET `physiological_antecedents` = '" . $consult['Physiological_antecedents'] . "', `pathological_antecedents` = '" . $consult['Pathological_antecedents'] . "', `hetero_collateral_antecedents` = '" . $consult['Hetero_collateral_antecedents'] . "', `medium_conditions` = '" . $consult['Medium_conditions'] . "', `present_status` = '" . $consult['Present_status'] . "', `vascular_apparatus` = '" . $consult['Vascular_apparatus'] . "', `local_complementary_exams` = '" . $consult['Local_complementary_exams'] . "', `personal_antecedents` = '" . $consult['Personal_antecedents'] . "', `consult_reasons` = '" . $consult['Consult_reasons'] . "', `remarks` = '" . $consult['Remarks'] . "', `diagnostic` = '" . $consult['Diagnostic'] . "', `recommendations` = '" . $consult['Recommendations'] . "', `treatment` = '" . $consult['Treatment'] . "', `date` = '" . $consult['Date'] . "', `id_patient` = '" . $consult['Id_patient'] . "', `id_employee` = '" . $this->session->Id_consult . "' WHERE `id_consult` = '" . $consult['Id_consult'] . "';";
      $sql2 .= "DELETE FROM `consult_investigations` WHERE `id_consult`='" . $consult['Id_consult'] . "'; DELETE FROM `consult_analyzes` WHERE `id_consult`='" . $consult['Id_consult'] . "';";
      $sql3 .= "INSER INTO `consult_investigations` (`id_consult`, `id_analyzes`) VALUES ";
      foreach ($analyzes as $analyze) {
        $sql3 .= " ('" . $consult['Id_consult'] . "', '" . $analyze . "'),";
      }
      $sql4 .= "INSER INTO `consult_analyzes` (`id_consult`, `id_analyzes`) VALUES ";
      foreach ($analyzes as $analyze) {
        $sql4 .= " ('" . $consult['Id_consult'] . "', '" . $analyze . "'),";
      }
      $this->db->query($sql);
      $this->db->query($sql2);
      $this->db->query($sql3);
      $this->db->query($sql4);
    } else {
      $sql .= "INSERT INTO `consult` (`physiological_antecedents`, `pathological_antecedents`, `hetero_collateral_antecedents`, `medium_conditions`, `present_status`, `vascular_apparatus`, `local_complementary_exams`, `personal_antecedents`, `consult_reasons`, `remarks`, `diagnostic`, `recommendations`, `treatment`, `date`, `id_patient`, `id_employee`) "
              . "VALUES ('" . $consult['PhysiologicalAntecedents'] . "', '" . $consult['PathologicalAntecedents'] . "', '" . $consult['HeteroCollateralAntecedents'] . "', '" . $consult['MediumConditions'] . "', '" . $consult['PresentStatus'] . "', '" . $consult['VascularAparatus'] . "', '" . $consult['LocalComplementaryExams'] . "', '" . $consult['PersonalAntecedents'] . "', '" . $consult['ConsultReasons'] . "', '" . $consult['Remarks'] . "', '" . $consult['Diagnostic'] . "', '" . $consult['Recommendations'] . "', '" . $consult['Treatment'] . "', CURRENT_TIMESTAMP, '" . $consult['id_patient'] . "', '" . $consult['id_employee'] . "');";
      $this->db->query($sql);
      $lastInsertId = $this->db->insert_id();
      if (count($investigations) > 0) {
        $sql2 .= "INSER INTO `consult_investigations` (`id_consult`, `id_analyzes`) VALUES ";
        foreach ($investigations as $investigation) {
          $sql2 .= " ('" . $lastInsertId . "', '" . $investigation . "'),";
        }
        $this->db->query(substr($sql2, 0, -1));
      }
      if (count($analyzes) > 0) {
        $sql3 .= "INSER INTO `consult_analyzes` (`id_consult`, `id_analyzes`) VALUES ";
        foreach ($analyzes as $analyze) {
          $sql3 .= " ('" . $lastInsertId . "', '" . $analyze . "'),";
        }
        $this->db->query(substr($sql3, 0, -1));
      }
      
      
    }
  }

}
