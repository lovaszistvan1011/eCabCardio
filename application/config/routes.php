<?php

defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Redefineing routes for our application 
$route['home'] = 'HomeController';
$route['patient'] = 'PacientController';
<<<<<<< HEAD
$route['patient/results'] = 'PacientController/search_keyword';
$route['patient/add'] = 'PacientController/insert_data';
$route['patient/design'] = 'PacientController/design';
$route['login'] = 'LoginController/login';
=======
$route['patient/add'] = 'PacientController/insert_data';
$route['patient/design'] = 'PacientController/design';
>>>>>>> 14f94083ad2e380dbf480189929230c4f1025500

//Consult
$route['consult'] = 'ConsultController/index';
$route['consult/(:num)'] = 'ConsultController/index/$1';
$route['consult/letter/(:num)'] = 'ConsultController/letter/$1';
$route['consult/letter'] = 'ConsultController/letter';
$route['consult/letter/save'] = 'ConsultController/letterSave';
$route['consult/letter/view/(:num)/(:num)'] = 'ConsultController/letterView/$1/$2';
$route['consult/save'] = 'ConsultController/save';
$route['consult/view/(:num)'] = 'ConsultController/view/$1';
$route['consult/view'] = 'ConsultController/view';

$route['finance'] = 'FinanceController';

$route['preferences'] = 'PreferencesController';

//Admin routes
$route['admin'] = 'AdminController';
$route['admin/clinic/save'] = 'AdminController/clinicSave';
$route['admin/employee'] = 'AdminController/employee';
$route['admin/employee/(:num)'] = 'AdminController/employee/$1';
$route['admin/employee/save'] = 'AdminController/employeeSave';
$route['admin/employee/delete'] = 'AdminController/employeeDelete';
$route['admin/investigations'] = 'AdminController/investigations';
$route['admin/investigations/edit'] = 'AdminController/investigationsEdit';
$route['admin/investigations/edit/(:num)'] = 'AdminController/investigationsEdit/$1';
$route['admin/investigations/save'] = 'AdminController/investigationsSave';
$route['admin/investigations/delete'] = 'AdminController/investigationsDelete';

$route['admin/analyzes'] = 'AdminController/analyzes';
$route['admin/analyzes/edit'] = 'AdminController/analyzesEdit';
$route['admin/analyzes/edit/(:num)'] = 'AdminController/analyzesEdit/$1';
$route['admin/analyzes/save'] = 'AdminController/analyzesSave';
$route['admin/analyzes/delete'] = 'AdminController/analyzesDelete';

