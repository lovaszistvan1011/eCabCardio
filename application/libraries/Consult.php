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

  private function checkBoxAnalyzes($text, $name, $value, $check) {
    $data = array(
        'name' => $name,
        'id' => 'consultfrm_' . $name,
        'value' => $value,
        'checked' => $check,
        'class' => 'pull-left consultIconSize'
    );
    $ret = '<div class="form-group">';
    $ret .= form_checkbox($data, $text);
    $ret .= $text;
    $ret .= '</div>';
    return $ret;
  }

  public function printAnalyzesList($check = array()) {
    $analyzesList = $this->ci->ConsultModel->getAnalysesList();
    $ret = '';
    if (count($analyzesList) > 0) {
      foreach ($analyzesList as $analyze) {
        if (in_array($analyze['id_analyze'], $check)) {
          $checkStatus = TRUE;
        } else {
          $checkStatus = FALSE;
        }
        $ret .= $this->checkBoxAnalyzes($analyze['name'], "analyzes[]", $analyze['id_analyze'], $checkStatus);
      }
    }
    return $ret;
  }

  public function printInvestigationsList($check = array()) {
    $investigationsList = $this->ci->ConsultModel->getInvestigationsList();

    $ret = '';
    if (count($investigationsList) > 0) {
      foreach ($investigationsList as $investigation) {
        if (in_array($investigation['id_investigations'], $check)) {
          $checkStatus = TRUE;
        } else {
          $checkStatus = FALSE;
        }
        $ret .= $this->checkBoxAnalyzes($investigation['name'], "investigations[]", $investigation['id_investigations'], $checkStatus);
      }
    }
    $ret .= '';
    return $ret;
  }

  public function printDemographicalData($patient) {
    $demographicalData = $this->ci->ConsultModel->getDemographicalData($patient);
    $ret = '<h3>' . $demographicalData['first_name'] . ' ' . $demographicalData['last_name'] . '</h3>';
    $ret .= '<p>' . $demographicalData['cnp'] . ' | ' . $demographicalData['birth_date'] . ' ' . $demographicalData['marital_status'];
    $ret .= '<br>' . $demographicalData['job'] . ' | ' . $demographicalData['occupation'];
    $ret .= '<br>' . $demographicalData['email'] . ' | ' . $demographicalData['phone'];
    $ret .= '<br>' . $demographicalData['address'] . ' | ' . $demographicalData['locality_name'] . ' | ' . $demographicalData['county_name'] . '</p>';
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
        $ret .= '<div class="card-header" role="tab" id="heading' . $i . '">';
        if ($consult['date'] == date('Y-m-d')) {
          $ret .= '<a class="pull-right" href="/eCabCardio/consult/view/' . $consult['id_consult'] . '"><img class="img-circle img-responsive alignleft consultIconSize" src="' . base_url() . 'appearance/images/icons/icon_edit.png" alt="Modificați" title="Modificați" aria-label="Modificați" aria-hidden="true"></a>';
        }
        $ret .= '<a data-toggle="collapse" data-parent="#accordionConsultHistory" href="#collapse' . $i . '" aria-expanded="false" aria-controls="collapse' . $i . '">';
        $ret .= '<span class="mb-0 title">' . $consult['date'] . '</span>';
        $ret .= '</a></div>';
        $ret .= '<div id="collapse' . $i . '" class="collapse " role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionConsultHistory">';
        $ret .= '<div class="card-body">';
        $ret .= '<em>Motiv:</em> ' . $consult['consult_reasons'];
        $ret .= '<br><em>Observații:</em> ' . $consult['remarks'];
        $ret .= '<br><em>Recomandări:</em> ' . $consult['recommendations'];
        $ret .= '<br><em>Tratament:</em> ' . $consult['treatment'];
        $ret .= '<br><em>Medic:</em> ' . $consult['employee_title'] . ' ' . $consult['employee_first_name'] . ' ' . $consult['employee_last_name'];
        $ret .= '</div></div>';
        $ret .= '</div>';
        $i++;
      }
      unset($i);
      $ret .= '</div> <!-- Accordion wrapper -->';
    }
    return $ret;
  }

  public function medicalLetterProcess($letter) {
    $date = new DateTime($letter['patient_birth_date']);
    $now = new DateTime();
    $interval = $now->diff($date);
    $letter['patient_age'] = $interval->y;
    $letter['patient_sex'] = (substr($letter['patient_cnp'], 0, 1)%2 == 0) ? 'Doamna': 'Domnul';
    return $letter;
  }

}
