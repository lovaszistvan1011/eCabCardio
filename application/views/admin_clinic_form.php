<?php

$clinicForm = array('id' => 'consultfrm', 'accept-charset' => 'utf-8', 'method' => 'post');
$btnSubmit = array('name' => 'btnSubmit', 'id' => 'clinicfrm_submit', 'value' => 'true', 'type' => 'submit', 'class' => 'btn btn-primary', 'content' => 'Salvează');

function inputData($key, $prop) {
  global $clinicHumanColumns;
  $data = array(
      'name' => $key,
      'id' => 'clinicfrm_' . $key,
      'placeholder' => $clinicHumanColumns[$key],
      'value' => $prop
  );
  return $data;
}

unset($clinic['id_clinic']);
echo form_open('admin/clinic/save', $clinicForm);
foreach ($clinic as $key => $prop) {
  echo form_input(inputData($key, $prop));
}
echo '<br>' . form_button($btnSubmit) . '<br><br>';
echo form_close();
