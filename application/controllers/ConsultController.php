<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Consult
 *
 * @author Stefan Halus
 */
class ConsultController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper(['url', 'form']);
    $this->load->model('ConsultModel');
//    $this->load->library('form_validation');
    $this->load->library(['session', 'template', 'consult']);
    $this->setDemoEmployeeAndPatient();
  }

  private function setDemoEmployeeAndPatient() {
    If (!isset($_SESSION['id_patient'])) {
      $_SESSION['id_patient'] = 3;
    }
    If (!isset($_SESSION['id_patient'])) {
      $_SESSION['id_employee'] = 2;
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
        'title' => 'Se salvează consult-ul',
        'body' => $this->form->post("PhysiologicalAntecedents")
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
    $ret['id_patient'] = $_SESSION['id_patient'];
    $ret['id_employee'] = $_SESSION['id_employee'];
    return $ret;
  }

  private function utilFormReadConsultAnalyzes() {
    return $this->input->post('analyzes');
  }

  private function utilFormReadConsultInvestigations() {
    return $this->input->post('investigations');
  }

}
