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
    $lastInsertId = $this->ConsultModel->saveConsult($this->utilFormReadConsult(), $this->utilFormReadConsultInvestigations(), $this->utilFormReadConsultAnalyzes()
    );
    $dbrez = $this->ConsultModel->getConsultById($lastInsertId);
//    print_r($dbrez);
    if ($lastInsertId > 1) {
      $userData['status'] = 'ok';
      $userData['liid'] = $lastInsertId;
      $userData['result'] = $dbrez['consult'];
    } else {
      $userData['status'] = 'err';
      $userData['liid'] = 0;
      $userData['result'] = '';
    }

    $data = [
        'title' => '',
        'body' => json_encode($userData)
    ];
    $this->template->load('txt', null, $data);
  }

  public function view($id) {
    $dbrez = $this->ConsultModel->getConsultById($id);
    $dbConsult = $dbrez['consult'];
    $dbInvestigations = $dbrez['investigations'];
    $dbAnalyzes = $dbrez['analyzes'];
    $data = [
        'title' => 'Consult',
        'session' => $this->session->userdata(),
        'demographicalData' => $this->consult->printDemographicalData(),
        'consultsList' => $this->consult->printConsultsList(),
        'consultDetails' => $this->utilFormEditConsult($dbConsult),
        'analizesList' => $this->consult->printAnalyzesList($dbAnalyzes),
        'investigationsList' => $this->consult->printInvestigationsList($dbInvestigations),
    ];
    $this->template->load('Plain', 'consult', $data);
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
    if($this->input->post('id_patient') > 0) {
      $ret['id_patient'] = $this->input->post('id_patient');
    } else {
      $ret['id_patient'] = $this->session->id_patient;
    }

//    $ret['id_employee'] = 2;
    $ret['id_employee'] = $this->session->id_employee;
    return $ret;
  }

  private function utilFormEditConsult($consult = array()) {
    $ret['Id_consult'] = $consult['id_consult'];
    $ret['PhysiologicalAntecedents'] = $consult['physiological_antecedents'];
    $ret['PathologicalAntecedents'] = $consult['pathological_antecedents'];
    $ret['HeteroCollateralAntecedents'] = $consult['hetero_collateral_antecedents'];
    $ret['MediumConditions'] = $consult['medium_conditions'];
    $ret['PresentStatus'] = $consult['present_status'];
    $ret['VascularAparatus'] = $consult['vascular_apparatus'];
    $ret['LocalComplementaryExams'] = $consult['local_complementary_exams'];
    $ret['PersonalAntecedents'] = $consult['personal_antecedents'];
    $ret['ConsultReasons'] = $consult['consult_reasons'];
    $ret['Remarks'] = $consult['remarks'];
    $ret['Diagnostic'] = $consult['diagnostic'];
    $ret['Recommendations'] = $consult['recommendations'];
    $ret['Treatment'] = $consult['treatment'];
    $ret['Id_patient'] = $consult['id_patient'];
    return $ret;
  }

  private function utilFormReadConsultAnalyzes() {
    return $this->input->post('analyzes');
  }

  private function utilFormReadConsultInvestigations() {
    return $this->input->post('investigations');
  }

}
