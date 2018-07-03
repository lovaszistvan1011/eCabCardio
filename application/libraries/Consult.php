<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/**
 * Description of Consult
 *
 * @author stefa
 */
class Consult {

  var $ci;

  function __construct() {
    $this->ci = & get_instance();
    $this->ci->load->model('ConsultModel');
  }

  public function printDemographicalData() {
    $demographicalData = $this->ci->ConsultModel->getDemographicalData();
    $ret = '<h3>' . $demographicalData['first_name'] . ' ' . $demographicalData['last_name'] . '</h3>';
    $ret .= '<p>' . $demographicalData['cnp'];
    $ret .= '<br>' . $demographicalData['birth_date'] . ' ' . $demographicalData['marital_status'];
    $ret .= '<br>' . $demographicalData['job'] . ' ' . $demographicalData['occupation'];
    $ret .= '<br>' . $demographicalData['email'] . ' ' . $demographicalData['phone'];
    $ret .= '<br>' . $demographicalData['address'] . ', ' . $demographicalData['locality_name'] . ', ' . $demographicalData['county_name'] . '</p>';
    return $ret;
  }
  
  public function printConsultsList(){
    $ret = '';
    $ret .= '';
    $ret .= '';
    $ret .= '';
    $ret .= '';
    $ret .= '';
    return $ret;
  }

}
