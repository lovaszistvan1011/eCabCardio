<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Authentification
 *
 * @author stefa
 */
class Authentification {
  
  var $ci;

  function __construct() {
    $this->ci = & get_instance();
    $this->ci->load->model('ConsultModel');
    $this->ci->load->helper('url', 'form');
  }
  
//  return password_hash($password, PASSWORD_BCRYPT);
//  password_verify("pass", $hash);
}
