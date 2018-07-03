<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class HomeController extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->library('template');
    
  }
  public function index() {
    $data = array(
        'title' => '',
    );
    $this->template->load('plainwithoutmenu', 'home_page', $data);
  }

  public function home() {
    $data = array(
        'title' => 'Title goes here',
    );
    $this->load->library('template');
    $this->template->load('home', 'content', $data);
  }
  
}
