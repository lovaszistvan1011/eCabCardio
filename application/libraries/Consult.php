<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of Consult
 *
 * @author stefa
 */
class Consult {

  var $ci;

  function __construct() {
    $this->ci = & get_instance();
    $this->ci->load->model('ConsultModel');
//    $this->load->helper('url', 'form');
  }

  public function printAnalyzesList() {
    $analyzesList = $this->ci->ConsultModel->getAnalysesList();
    $ret = '';
    foreach ($analyzesList as $analyze) {
      $ret .= '<p><input type="checkbox" name="analyzes" value="' . $analyze['id_analyzes'] . '">' . $analyze['name'] . ' <span class="">' . $analyze['price'] . '</span></p>';
    }
    $ret .= '';
    return $ret;
  }

  public function printDemographicalData() {
    $demographicalData = $this->ci->ConsultModel->getDemographicalData();
    $ret = '<h3>' . $demographicalData['first_name'] . ' ' . $demographicalData['last_name'] . '</h3>';
    $ret .= '<p>' . $demographicalData['cnp'];
    $ret .= '<br>' . $demographicalData['birth_date'] . ' ' . $demographicalData['marital_status'];
    $ret .= '<br>' . $demographicalData['job'] . ' ' . $demographicalData['occupation'];
    $ret .= '<br>' . $demographicalData['email'] . ' ' . $demographicalData['phone'];
    $ret .= '<br>' . $demographicalData['address'] . ', ' . $demographicalData['locality_name'] . ', ' . $demographicalData['county_name'] . '</p>';
    return $ret;
  }

  public function printConsultsList() {
    $consultsList = $this->ci->ConsultModel->getConsultsList();
    $ret = '';
    if (count($consultsList) > 0) {
      $ret .= '<ul>';
      $ret .= '<li><a href="#">Consult nou</a></li>';
      foreach ($consultsList as $consult) {
        $ret .= '<hr><li>'
                . '<a href="#">' . $consult['date'] . '</a> '
                . '<br>' . $consult['consult_reasons'] . ' '
                . '<br>' . $consult['remarks'] . ' '
                . '<br>' . $consult['recommendations'] . ' '
                . '<br>' . $consult['treatment'] . ' '
                . '<br>' . $consult['employee_title'] . ' ' . $consult['employee_first_name'] . ' ' . $consult['employee_last_name'] . ''
                . '</li><hr>';
      }
      $ret .= '</ul>';
    }
    $ret .= '';
    return $ret;
  }
  
  
  public function utilFormReadConsult(){
    $ret = array();
    $ret['Id_consult'] = $this->form->post('id_consult');
    $ret['PhysiologicalAntecedents'] = $this->form->post('PhysiologicalAntecedents');
    $ret['PathologicalAntecedents'] = $this->form->post('PathologicalAntecedents');
    $ret['HeteroCollateralAntecedents'] = $this->form->post('HeteroCollateralAntecedents');
    $ret['MediumConditions'] = $this->form->post('MediumConditions');
    $ret['PresentStatus'] = $this->form->post('PresentStatus');
    $ret['VascularAparatus'] = $this->form->post('VascularAparatus');
    $ret['LocalComplementaryExams'] = $this->form->post('LocalComplementaryExams');
    $ret['PersonalAntecedents'] = $this->form->post('PersonalAntecedents');
    $ret['ConsultReasons'] = $this->form->post('ConsultReasons');
    $ret['Remarks'] = $this->form->post('Remarks');
    $ret['Diagnostic'] = $this->form->post('Diagnostic');
    $ret['Recommendations'] = $this->form->post('Recommendations');
    $ret['Treatment'] = $this->form->post('Treatment');
    $ret['id_patient'] = $_SESSION['id_patient'];
    $ret['id_employee'] = $_SESSION['id_employee'];
    return $ret;
  }
  
  public function utilFormReadConsultAnalyzes(){
    $ret = array();
    $ret = $this->form->post('analyzes');
    return $ret;
  }

}
