<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
  }
  public function index() {
    $data = array(
        'title' => 'Title goes here',
    );
    $this->load->library('template');
    $this->template->load('home', 'content', $data);
  }

  public function home() {
    $data = array(
        'title' => 'Title goes here',
    );
    $this->load->library('template');
    $this->template->load('home', 'content', $data);
  }
  
}
