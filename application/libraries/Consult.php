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
    $letter['patient_sex'] = (substr($letter['patient_cnp'], 0, 1) % 2 == 0) ? 'Doamna' : 'Domnul';
    return $letter;
  }

  public function generateMedicalLetter($clinic, $employee, $letter) {
    $css = '<style> p { text-indent: 50px; margin: 1px 1px; padding:0 0; } </style>';
    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->clinic = $clinic;
    $pdf->employee = $employee;
    $pdf->SetTitle('Scrisoare medicală');
    $pdf->SetHeaderMargin(0);
    $pdf->setFooterMargin(10);
    $pdf->SetTopMargin(10);
    $pdf->SetAutoPageBreak(TRUE, 10);
    $pdf->SetCreator('eCabCardio - app');
    $pdf->SetAuthor('eCabCardio');
    $pdf->SetSubject('Consult cardiologie');
    $pdf->SetKeywords('cardiologie, consult, scrisoare, medic, specialist, analize');
    $pdf->SetFillColor(255, 210, 210);
    $pdf->SetDisplayMode('real', 'default');

    // set font
    $pdf->AddPage();
    $pdf->SetFont('dejavuserif', 'b', 22);
    $pdf->MultiCell(190, 20, 'Scrisoare medicală', $border = 0, $align = 'C', $fill = '', $ln = true, $x = 10, $y = 40);
    $pdf->SetFont('dejavusans', '', 15);
    $pdf->Ln(0);
    $pdf->setFontSpacing(0);
    $pdf->MultiCell('', '', $css . $letter, $border = 0, $align = 'J', $fill = 0, $ln = 1, $x = 10, $y = 40, $reseth = true, $stretch = 0, $ishtml = true, $autopadding = false, $maxh = 40, $valign = 'M', $fitcell = false);
    $pdf->Ln(1);
    $this->letterSignatureCell($pdf, 25, "Data: \n" . strftime("%#d.%B.%Y", strtotime(date("Y-m-d"))));
    $this->letterSignatureCell($pdf, 123, "Semnătura: \n" . $employee['first_name'] . ' ' . $employee['last_name']);
    
    $pdf->Output('My-File-Name.pdf', 'I');
  }

  private function letterSignatureCell($pdf, $x = 0, $txt = '', $with = 65, $height = 15) {
    $pdf->MultiCell($with, $height, $txt, $border = 1, $align = 'C', $fil = 1, $ln = 0, $x, $y = '', $reseth = true, $stretch = 0, $ishtml = false, $autopadding = false, $maxh = 0, $valign = 'M', $fitcell = true);
  }

}
