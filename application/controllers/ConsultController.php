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
    $this->load->library('session');
    $this->load->library('template');
  }

  public function index() {
    $_SESSION['id_patient'] = 3;
    $_SESSION['id_employee'] = 2;
    $data = [
        'title' => 'Consult',
        'session' => $this->session->userdata()
    ];
    $this->template->load('Plain', 'consult', $data);
  }

}
