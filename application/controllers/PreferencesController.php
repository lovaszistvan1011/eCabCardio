<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PreferencesController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper(['url', 'form']);
//    $this->load->model('');
    $this->load->library(['session', 'template', 'consult']);
  }

  public function index() {
    $data = [
        'title' => 'Hello World',
        'body' => 'This controller is working properly'
    ];
    $this->template->load('Plain', 'content', $data);
  }

}
