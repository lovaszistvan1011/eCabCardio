<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of ConsultModel
 *
 * @author stefa
 */
class ConsultModel extends CI_Model {

  private $id_patient;

  public function __construct() {
    parent::__construct();
    $this->load->database();
    $this->load->helper('url', 'form');
    $this->load->library('session');
    $this->id_patient = $_SESSION['id_patient'];
  }

  public function getDemographicalData() {
    $sql = "SELECT `patient`.*, `county`.`name`AS `county_name`, `locality`.`name` AS `locality_name` "
            . "FROM `patient` "
            . "INNER JOIN `county` ON `county`.`id_county` = `patient`.`id_county`"
            . "INNER JOIN `locality` ON `locality`.`id_locality` = `patient`.`id_locality`"
            . "WHERE `id_patient`='$this->id_patient';";
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

  public function getConsultsList() {
    $sql = "SELECT `consult`.`id_consult`, `consult`.`date`, `consult`.`id_employee`, `consult`.`consult_reasons`, `consult`.`remarks`, `consult`.`recommendations`, `consult`.`treatment`, `employee`.`first_name` AS `employee_first_name`, `employee`.`last_name` AS `employee_last_name`, `employee`.`title` AS `employee_title` "
            . "FROM `consult` "
            . "INNER JOIN `employee` ON `consult`.`id_employee` = `employee`.`id_employee` "
            . "WHERE `id_patient`='$this->id_patient';";
    $query = $this->db->query($sql);
    return $query->row_array();
  }

  public function saveConsult($consult = null, $analyzes = null) {
//    $Id_consult = $this->form->post('id_consult');
//    $PhysiologicalAntecedents = $this->form->post('PhysiologicalAntecedents');
//    $PathologicalAntecedents = $this->form->post('PathologicalAntecedents');
//    $HeteroCollateralAntecedents = $this->form->post('HeteroCollateralAntecedents');
//    $MediumConditions = $this->form->post('MediumConditions');
//    $PresentStatus = $this->form->post('PresentStatus');
//    $VascularAparatus = $this->form->post('VascularAparatus');
//    $LocalComplementaryExams = $this->form->post('LocalComplementaryExams');
//    $PersonalAntecedents = $this->form->post('PersonalAntecedents');
//    $ConsultReasons = $this->form->post('ConsultReasons');
//    $Remarks = $this->form->post('Remarks');
//    $Diagnostic = $this->form->post('Diagnostic');
//    $Recommendations = $this->form->post('Recommendations');
//    $Treatment = $this->form->post('Treatment');
////    $date = $this->form->post('Date');
//    $id_patient = $_SESSION['id_patient'];
//    $id_employee = $_SESSION['id_employee'];
    if ($consult['Id_consult'] > 0) {
      $sql = "";
    } else {
      $sql = "INSERT INTO `consult` (`physiological_antecedents`, `pathological_antecedents`, `hetero_collateral_antecedents`, `medium_conditions`, `present_status`, `vascular_apparatus`, `local_complementary_exams`, `personal_antecedents`, `consult_reasons`, `remarks`, `diagnostic`, `recommendations`, `treatment`, `date`, `id_patient`, `id_employee`) "
              . "VALUES ('" . $consult['PhysiologicalAntecedents'] . "', '" . $consult['PathologicalAntecedents'] . "', '" . $consult['HeteroCollateralAntecedents'] . "', '" . $consult['MediumConditions'] . "', '" . $consult['PresentStatus'] . "', '" . $consult['VascularAparatus'] . "', '" . $consult['LocalComplementaryExams'] . "', '" . $consult['PersonalAntecedents'] . "', '" . $consult['ConsultReasons'] . "', '" . $consult['Remarks'] . "', '" . $consult['Diagnostic'] . "', '" . $consult['Recommendations'] . "', '" . $consult['Treatment'] . "', CURRENT_TIMESTAMP, '" . $consult['id_patient'] . "', '" . $consult['id_employee'] . "')";
    }
    $this->db->queryUpdate($sql);
    if ($consult['Id_consult'] == 0) {
      $consult['Id_consult'] = $this->db->lastInsertId();
    }
    // TREBUIE FĂCUT UPDATE LA ANALIZE_CONSULT
  }

}
