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
    $this->load->helper('url');
    $this->load->model('ConsultModel');
    $this->load->library('session');
    $this->load->library('template');
    $this->load->library('consult');
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
    ];
    $this->template->load('Plain', 'consult', $data);
  }
  
  public function save(){
    $data = [
        'title' => 'Se salvează consult-ul'
    ];
    $this->template->load('Plain', 'content', $data);
  }

}
