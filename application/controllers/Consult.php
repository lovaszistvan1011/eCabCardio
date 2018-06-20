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
class Consult extends CI_Controller {

  public function index() {
    $this->load->view('consult');
  }

  public function home() {
    $data = array(
        'title' => 'Title goes here',
    );

//    $this->load->library('template');
    $this->template->load('home', 'content', $data);
  }

}
