<?php

if (!isset($employee)) {
  $employee = array('id_employee' => '', 'first_name' => '', 'last_name' => '', 'user' => '', 'pass' => '', 'title' => '');
}
$employeeForm = array('id' => 'employeefrm', 'accept-charset' => 'utf-8', 'method' => 'post');
$btnSubmit = array('name' => 'btnSubmit', 'id' => 'employeefrm_submit', 'value' => 'true', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => 'Salvează');

$first_name = array(
    'name' => 'first_name',
    'id' => 'clinicfrm_first_name',
    'placeholder' => 'Prenume',
    'value' => $employee['first_name'],
    'class' => 'form-control'
);
$last_name = array(
    'name' => 'last_name',
    'id' => 'clinicfrm_last_name',
    'placeholder' => 'Nume de familie',
    'value' => $employee['last_name'],
    'class' => 'form-control'
);
$user = array(
    'name' => 'user',
    'id' => 'clinicfrm_user',
    'placeholder' => 'Utilizator',
    'value' => $employee['user'],
    'class' => 'form-control'
);
$pass = array(
    'name' => 'pass',
    'id' => 'clinicfrm_pass',
    'placeholder' => 'Parolă',
    'value' => '',
    'class' => 'form-control'
);
$title = array(
    'name' => 'title',
    'id' => 'clinicfrm_title',
    'placeholder' => 'Titlu',
    'value' => $employee['title'],
    'class' => 'form-control'
);

echo form_open('admin/employee/save', $employeeForm, ['id_employee' => $employee['id_employee']]);
echo '<p>' . form_input($first_name) . '</p>';
echo '<p>' . form_input($last_name) . '</p>';
echo '<p>' . form_input($user) . '</p>';
echo '<p>' . form_password($pass) . '<span class="bg-info">Parolela nu se modifică dacă lăsați câmpul `Parolă` necompletat.</span></p>';
echo '<p>' . form_input($title) . '</p>';
//echo form_input();
echo '<br>' . form_button($btnSubmit) . '<br><br>';
echo form_close();
