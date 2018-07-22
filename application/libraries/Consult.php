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
    $this->ci->load->helper(['url', 'form']);
    $this->ci->load->model('ConsultModel');
  }

  public function printAnalyzesList() {
    $analyzesList = $this->ci->ConsultModel->getAnalysesList();
    $ret = '';
    if (count($analyzesList) > 0) {
      foreach ($analyzesList as $analyze) {
        $ret .= '<p><input type="checkbox" name="analyzes[]" value="' . $analyze['id_analyze'] . '">' . $analyze['name'] . '</p>';
      }
    }
    $ret .= '';
    return $ret;
  }

  public function printInvestigationsList() {
    $investigationsList = $this->ci->ConsultModel->getInvestigationsList();
    $ret = '';
    if (count($investigationsList) > 0) {
      foreach ($investigationsList as $investigation) {
        $ret .= '<p><input type="checkbox" name="investigations[]" value="' . $investigation['id_investigations'] . '">' . $investigation['name'] . '</p>';
      }
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
      $ret .= '<div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">';
//      $ret .= '<li><a href="#">Consult nou</a></li>';
      $i = 0;
      foreach ($consultsList as $consult) {
        $ret .= '<div class="card">';
        $ret .= '<div class="card-header" role="tab" id="heading' . $i . '">
            <a data-toggle="collapse" data-parent="#accordionConsultHistory" href="#collapse' . $i . '" aria-expanded="false" aria-controls="collapse' . $i . '">
                <h5 class="mb-0">' . $consult['date'] . '</h5>
            </a>
        </div>';
        $ret .= '<div id="collapse' . $i . '" class="collapse " role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionConsultHistory">
  <div class="card-body">
  <em>Motiv:</em> ' . $consult['consult_reasons'] . ' '
                . '<br><em>Observații:</em> ' . $consult['remarks'] . ' '
                . '<br><em>Recomandări:</em> ' . $consult['recommendations'] . ' '
                . '<br><em>Tratament:</em> ' . $consult['treatment'] . ' '
                . '<br><em>Medic:</em> ' . $consult['employee_title'] . ' ' . $consult['employee_first_name'] . ' ' . $consult['employee_last_name'] . '
  </div>
</div>';
        $ret .= '';
        $ret .= '';
        $ret .= '</div>';
        $i++;
      }
      unset($i);
      $ret .= '';
      $ret .= '</div>
    <!-- Accordion wrapper -->'; // /accordion
// ' . $consult['date'] . '
// <br>' . $consult['consult_reasons'] . ' <br>' . $consult['remarks'] . ' <br>' . $consult['recommendations'] . ' <br>' . $consult['treatment'] . ' <br>' . $consult['employee_title'] . ' ' . $consult['employee_first_name'] . ' ' . $consult['employee_last_name'] . '
    }

    $ret .= '
';
    return $ret;
  }

//  public function utilFormReadConsult(){
//    $ret = array();
//    $ret['Id_consult'] = $this->input->post('id_consult');
//    $ret['PhysiologicalAntecedents'] = $this->input->post('PhysiologicalAntecedents');
//    $ret['PathologicalAntecedents'] = $this->input->post('PathologicalAntecedents');
//    $ret['HeteroCollateralAntecedents'] = $this->input->post('HeteroCollateralAntecedents');
//    $ret['MediumConditions'] = $this->input->post('MediumConditions');
//    $ret['PresentStatus'] = $this->input->post('PresentStatus');
//    $ret['VascularAparatus'] = $this->input->post('VascularAparatus');
//    $ret['LocalComplementaryExams'] = $this->input->post('LocalComplementaryExams');
//    $ret['PersonalAntecedents'] = $this->input->post('PersonalAntecedents');
//    $ret['ConsultReasons'] = $this->input->post('ConsultReasons');
//    $ret['Remarks'] = $this->input->post('Remarks');
//    $ret['Diagnostic'] = $this->input->post('Diagnostic');
//    $ret['Recommendations'] = $this->input->post('Recommendations');
//    $ret['Treatment'] = $this->input->post('Treatment');
//    $ret['id_patient'] = $_SESSION['id_patient'];
//    $ret['id_employee'] = $_SESSION['id_employee'];
//    return $ret;
//  }
//  
//  public function utilFormReadConsultAnalyzes(){
//    return $this->input->post('analyzes');
//  }
//  
//  public function utilFormReadConsultInvestigations(){
//    return $this->input->post('analyzes');
//  }
}
