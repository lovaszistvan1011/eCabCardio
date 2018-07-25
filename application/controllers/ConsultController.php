<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper(['url', 'form']);
    $this->load->model('ConsultModel');
    $this->load->library(['session', 'template', 'consult']);
    $this->setDemoEmployeeAndPatient();
    setlocale(LC_ALL, "ro_RO.UTF-8");
  }

  private function setDemoEmployeeAndPatient() {
    If (!$this->session->id_employee) {
      $this->session->set_userdata('id_employee', 2);
    }
  }

  public function index($patientSelected = 0) {
    if ($patientSelected > 0) {
      $data = [
          'title' => 'Consult',
          'selectedPatient' => $patientSelected,
          'demographicalData' => $this->consult->printDemographicalData($patientSelected),
          'consultsList' => $this->consult->printConsultsList($patientSelected),
          'analizesList' => $this->consult->printAnalyzesList(),
          'investigationsList' => $this->consult->printInvestigationsList(),
          'consultDetails' => '',
          'consultPrice' => ''
      ];
      $this->template->load('Plain', 'consult', $data);
    } else {
      $data = [
          'title' => 'Consult',
          'body' => 'Nu ați selectat vreun pacient!'
      ];
      $this->template->load('Plain', null, $data);
    }
  }

  public function letter($letterId = 0) {
    $medical_letter = $this->ConsultModel->getMedicalLetter($letterId);
    if ($letterId > 0) {
      $data = [
          'clinic' => $this->ConsultModel->getClinic(),
          'letter' => $this->consult->medicalLetterProcess($medical_letter),
          'analizes' => $this->ConsultModel->getAnalyzesByConsultId($letterId),
          'today' => strftime("%#d.%B.%Y", strtotime(date("Y-m-d")))
      ];
      $this->template->load('txt', 'consult_letter', $data);
    } else {
      $data = [
          'title' => 'Scrisoare medicală',
          'body' => 'Regretăm, nu este o scrisoare medicală validă!'
      ];
      $this->template->load('txt', null, $data);
    }
  }

  public function save() {
    $dataToBeSaved = $this->utilFormReadConsult();
    $lastInsertId = 0;
    if ($dataToBeSaved['id_patient'] > 0) {
      $lastInsertId = $this->ConsultModel->saveConsult($dataToBeSaved, $this->utilFormReadConsultInvestigations(), $this->utilFormReadConsultAnalyzes());
    }
    $dbrez = $this->ConsultModel->getConsultById($lastInsertId);
    if ($lastInsertId > 1) {
      $userData['status'] = 'ok';
      $userData['liid'] = $lastInsertId;
      $userData['result'] = $dbrez['consult'];
    } else {
      $userData['status'] = 'err';
      $userData['liid'] = 0;
      $userData['result'] = "Nu am putut salva datele!";
    }
    $data = [
        'title' => '',
        'body' => json_encode($userData)
    ];
    $this->template->load('txt', null, $data);
  }

  public function view($id = 0) {
    if ($id > 0) {
      $dbrez = $this->ConsultModel->getConsultById($id);
      $data = [
          'title' => 'Consult',
          'demographicalData' => $this->consult->printDemographicalData($dbrez['consult']['id_patient']),
          'consultsList' => $this->consult->printConsultsList($dbrez['consult']['id_patient']),
          'consultDetails' => $this->utilFormEditConsult($dbrez['consult']),
          'consultPrice' => $dbrez['consultPrice'],
          'analizesList' => $this->consult->printAnalyzesList($dbrez['analyzes']),
          'investigationsList' => $this->consult->printInvestigationsList($dbrez['investigations']),
          'selectedPatient' => $dbrez['consult']['id_patient']
      ];
      $this->template->load('Plain', 'consult', $data);
    } else {
      $data = [
          'title' => 'Fișă negăsită',
          'body' => 'Putem afișa doar o fișă de consult valide!'
      ];
      $this->template->load('Plain', null, $data);
    }
  }

  /////////////////////////////////////
  /// Utils methods
  private function utilFormReadConsult() {
    $ret['id_consult'] = $this->input->post('id_consult');
    $ret['physiological_antecedents'] = $this->input->post('physiological_antecedents');
    $ret['pathological_antecedents'] = $this->input->post('pathological_antecedents');
    $ret['hetero_collateral_antecedents'] = $this->input->post('hetero_collateral_antecedents');
    $ret['medium_conditions'] = $this->input->post('medium_conditions');
    $ret['present_status'] = $this->input->post('present_status');
    $ret['vascular_apparatus'] = $this->input->post('vascular_apparatus');
    $ret['local_complementary_exams'] = $this->input->post('local_complementary_exams');
    $ret['personal_antecedents'] = $this->input->post('personal_antecedents');
    $ret['consult_reasons'] = $this->input->post('consult_reasons');
    $ret['remarks'] = $this->input->post('remarks');
    $ret['diagnostic'] = $this->input->post('diagnostic');
    $ret['recommendations'] = $this->input->post('recommendations');
    $ret['treatment'] = $this->input->post('treatment');
    $ret['id_patient'] = $this->input->post('id_patient');
    $ret['id_employee'] = $this->session->id_employee;
    return $ret;
  }

  private function utilFormEditConsult($consult = array()) {
    $ret['id_consult'] = $consult['id_consult'];
    $ret['physiological_antecedents'] = $consult['physiological_antecedents'];
    $ret['pathological_antecedents'] = $consult['pathological_antecedents'];
    $ret['hetero_collateral_antecedents'] = $consult['hetero_collateral_antecedents'];
    $ret['medium_conditions'] = $consult['medium_conditions'];
    $ret['present_status'] = $consult['present_status'];
    $ret['vascular_apparatus'] = $consult['vascular_apparatus'];
    $ret['local_complementary_exams'] = $consult['local_complementary_exams'];
    $ret['personal_antecedents'] = $consult['personal_antecedents'];
    $ret['consult_reasons'] = $consult['consult_reasons'];
    $ret['remarks'] = $consult['remarks'];
    $ret['diagnostic'] = $consult['diagnostic'];
    $ret['recommendations'] = $consult['recommendations'];
    $ret['treatment'] = $consult['treatment'];
    $ret['id_patient'] = $consult['id_patient'];
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
