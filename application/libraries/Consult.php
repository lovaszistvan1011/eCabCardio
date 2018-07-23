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

  public function printAnalyzesList($check = array()) {
    $analyzesList = $this->ci->ConsultModel->getAnalysesList();
    $ret = '';
    if (count($analyzesList) > 0) {
      foreach ($analyzesList as $analyze) {
        if (array_key_exists($analyze['id_analyze'], $check)) {
          $checkStatus = ' checked="yes"';
        } else {
          $checkStatus = '';
        }
        $ret .= '<p><input type="checkbox" name="analyzes[]" value="' . $analyze['id_analyze'] . '"' . $checkStatus . '>' . $analyze['name'] . '</p>';
      }
    }
    $ret .= '';
    return $ret;
  }

  public function printInvestigationsList($check = array()) {
    $investigationsList = $this->ci->ConsultModel->getInvestigationsList();
    $ret = '';
    if (count($investigationsList) > 0) {
      foreach ($investigationsList as $investigation) {
        if (array_key_exists($investigation['id_investigations'], $check)) {
          $checkStatus = ' checked';
        } else {
          $checkStatus = '';
        }
        $ret .= '<p><input type="checkbox" name="investigations[]" value="' . $investigation['id_investigations'] . '"' . $checkStatus . '>' . $investigation['name'] . '</p>';
      }
    }
    $ret .= '';
    return $ret;
  }

  public function printDemographicalData($patient) {
    $demographicalData = $this->ci->ConsultModel->getDemographicalData($patient);
    $ret = '<h3>' . $demographicalData['first_name'] . ' ' . $demographicalData['last_name'] . '</h3>';
    $ret .= '<p>' . $demographicalData['cnp'];
    $ret .= '<br>' . $demographicalData['birth_date'] . ' ' . $demographicalData['marital_status'];
    $ret .= '<br>' . $demographicalData['job'] . ' ' . $demographicalData['occupation'];
    $ret .= '<br>' . $demographicalData['email'] . ' ' . $demographicalData['phone'];
    $ret .= '<br>' . $demographicalData['address'] . ', ' . $demographicalData['locality_name'] . ', ' . $demographicalData['county_name'] . '</p>';
    return $ret;
  }

  public function printConsultsList($patient) {
    $consultsList = $this->ci->ConsultModel->getConsultsList($patient);
    $ret = '';
    if (count($consultsList) > 0) {
      $ret .= '<div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">';
      $i = 0;
      foreach ($consultsList as $consult) {
        $ret .= '<div class="card">';
        $ret .= '<div class="card-header" role="tab" id="heading' . $i . '">
            <a data-toggle="collapse" data-parent="#accordionConsultHistory" href="#collapse' . $i . '" aria-expanded="false" aria-controls="collapse' . $i . '">
                <h5 class="mb-0">' . $consult['date'] . '</h5>
            </a></div>';
        $ret .= '<div id="collapse' . $i . '" class="collapse " role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionConsultHistory">
  <div class="card-body">
  <em>Motiv:</em> ' . $consult['consult_reasons'] . ' '
                . '<br><em>Observații:</em> ' . $consult['remarks'] . ' '
                . '<br><em>Recomandări:</em> ' . $consult['recommendations'] . ' '
                . '<br><em>Tratament:</em> ' . $consult['treatment'] . ' '
                . '<br><em>Medic:</em> ' . $consult['employee_title'] . ' ' . $consult['employee_first_name'] . ' ' . $consult['employee_last_name'] . '
  </div></div>';
        $ret .= '</div>';
        $i++;
      }
      unset($i);
      $ret .= '</div> <!-- Accordion wrapper -->';
    }
    return $ret;
  }

}
