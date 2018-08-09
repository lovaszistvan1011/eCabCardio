<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper(['url', 'form']);
    $this->load->model(['ClinicModel', 'ConsultModel', 'EmployeeModel']);
    $this->load->library(['session', 'template']);
  }

  public function index() {
    $clinicHumanColumns = array(
        'name' => 'Denumire',
        'logo' => 'Sigla',
        'fiscal_numbar' => 'CIF (CUI)',
        'trade_number' => 'Reg.Com.',
        'address' => 'Adresa',
        'bank' => 'Banca',
        'iban' => 'IBAN',
        'phone' => 'Telefon',
        'email' => 'Email',
        'www' => 'Site web'
    );
    $data = [
        'title' => 'Administrare cabi9net',
        'clinicHumanColumns' => $clinicHumanColumns,
        'clinic' => $this->ClinicModel->getClinic(),
        'employees' => $this->EmployeeModel->getEmployeeList()
    ];
    $this->template->load('Plain', 'admin', $data);
  }

  public function clinicSave() {
    $this->ClinicModel->setClinic();
    redirect('admin');
  }

  public function employee($id_employee = null) {
    $employee = $this->EmployeeModel->getEmployeeById($id_employee);
    $data = [
        'title' => 'Angajat ',
        'employee' => $employee
    ];
    $this->template->load('Plain', 'admin_employee', $data);
  }

  public function employeeSave() {
    $this->EmployeeModel->setEmployee();
    redirect('admin');
  }
  
  public function employeeDelete() {
    $status['status'] = 'err';
    if ($this->input->post('id_employee')) {
      $status = $this->EmployeeModel->deleteEmployee();
      if ($status) {
        $status['status'] = 'ok';
      }
    }
    $data = ['body' => json_encode($status)];
    $this->template->load('txt', null, $data);
  }

  public function investigations() {
    $list = $this->ConsultModel->getInvestigationsList();
    $data = [
        'title' => 'Administrare investigații',
        'listType' => 'investigations',
        'listItems' => $list
    ];
    $this->template->load('Plain', 'admin_investigations_list', $data);
  }

  public function investigationsEdit($id_investigation = null) {
    $investigation = array('id_investigations' => '', 'name' => '', 'price' => '');
    if ($id_investigation > 0) {
      $investigation = $this->ConsultModel->getInvestigationsById($id_investigation);
    }
    $data = [
        'title' => 'Administrare investigații',
        'investigation' => $investigation,
    ];
    $this->template->load('Plain', 'admin_investigations_form', $data);
  }

  public function investigationsSave() {
    $this->ConsultModel->setInvestigations();
    redirect('admin/investigations');
  }
  
  public function investigationsDelete() {
    $status['status'] = 'err';
    if ($this->input->post('id_investigations')) {
      $status = $this->ConsultModel->deleteInvestigations();
      if ($status) {
        $status['status'] = 'ok';
      }
    }
    $data = ['body' => json_encode($status)];
    $this->template->load('txt', null, $data);
  }

  public function analyzes() {
    $list = $this->ConsultModel->getAnalysesList();
    $data = [
        'title' => 'Administrare analize recomandate',
        'listType' => 'analyzes',
        'listItems' => $list
    ];
    $this->template->load('Plain', 'admin_analyzes_list', $data);
  }

  public function analyzesEdit($id_analyzes = null) {
    $analizes = array('id_analyze' => '', 'name' => '');
    if ($id_analyzes > 0) {
      $analizes = $this->ConsultModel->getAnalyzesById($id_analyzes);
    }
    $data = [
        'title' => 'Administrare analize recomandate',
        'analyzes' => $analizes,
    ];
    $this->template->load('Plain', 'admin_analyzes_form', $data);
  }

  public function analyzesSave() {
    $this->ConsultModel->setAnalizes();
    redirect('admin/analyzes');
  }

  public function analyzesDelete() {
    $status['status'] = 'err';
    if ($this->input->post('id_analyze')) {
      $status = $this->ConsultModel->deleteAnalizes();
      if ($status) {
        $status['status'] = 'ok';
      }
    }
    $data = ['body' => json_encode($status)];
    $this->template->load('txt', null, $data);
  }

}
