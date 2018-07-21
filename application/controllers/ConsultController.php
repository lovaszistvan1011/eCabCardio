<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper(['url', 'form']);
    $this->load->model('ConsultModel');
    $this->load->library(['session', 'template', 'consult']);
    $this->setDemoEmployeeAndPatient();
  }

  private function setDemoEmployeeAndPatient() {
    If (!$this->session->id_patient) {
      $this->session->set_userdata('id_patient', 3);
    }
    If (!$this->session->id_employee) {
      $this->session->set_userdata('id_employee', 2);
    }
  }

  public function index() {
    $data = [
        'title' => 'Consult',
        'session' => $this->session->userdata(),
        'demographicalData' => $this->consult->printDemographicalData(),
        'consultsList' => $this->consult->printConsultsList(),
        'analizesList' => $this->consult->printAnalyzesList(),
        'investigationsList' => $this->consult->printInvestigationsList(),
    ];
    $this->template->load('Plain', 'consult', $data);
  }

  public function save() {
    $this->ConsultModel->saveConsult(
            $this->utilFormReadConsult(), $this->utilFormReadConsultInvestigations(), $this->utilFormReadConsultAnalyzes()
    );
    $data = [
        'title' => 'Se salvează consult-ul' . "<br>ID emp ctrl:  [<b>" . $this->session->id_employee . '</b>]',
        'body' => ""
    ];
    $this->template->load('Plain', 'content', $data);
  }

  /////////////////////////////////////
  /// Utils methods

  private function utilFormReadConsult() {
    $ret['Id_consult'] = $this->input->post('id_consult');
    $ret['PhysiologicalAntecedents'] = $this->input->post('PhysiologicalAntecedents');
    $ret['PathologicalAntecedents'] = $this->input->post('PathologicalAntecedents');
    $ret['HeteroCollateralAntecedents'] = $this->input->post('HeteroCollateralAntecedents');
    $ret['MediumConditions'] = $this->input->post('MediumConditions');
    $ret['PresentStatus'] = $this->input->post('PresentStatus');
    $ret['VascularAparatus'] = $this->input->post('VascularAparatus');
    $ret['LocalComplementaryExams'] = $this->input->post('LocalComplementaryExams');
    $ret['PersonalAntecedents'] = $this->input->post('PersonalAntecedents');
    $ret['ConsultReasons'] = $this->input->post('ConsultReasons');
    $ret['Remarks'] = $this->input->post('Remarks');
    $ret['Diagnostic'] = $this->input->post('Diagnostic');
    $ret['Recommendations'] = $this->input->post('Recommendations');
    $ret['Treatment'] = $this->input->post('Treatment');
    $ret['id_patient'] = $this->session->id_patient;
//    $ret['id_employee'] = 2;
    $ret['id_employee'] = $this->session->id_employee;
    return $ret;
  }

  private function utilFormReadConsultAnalyzes() {
    return $this->input->post('analyzes');
  }

  private function utilFormReadConsultInvestigations() {
    return $this->input->post('investigations');
  }

}
