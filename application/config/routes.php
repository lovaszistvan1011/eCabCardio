<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Redefineing routes for our application 
$route['home'] = 'HomeController';
$route['patient'] = 'PacientController';
$route['patient/design'] = 'PacientController/design';
$route['consult'] = 'ConsultController';
$route['consult/save'] = 'ConsultController/save';
$route['consult/view/(:num)'] = 'ConsultController/view/$1';
$route['design'] = 'HomeController';
