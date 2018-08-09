<div id="consultForm" class="util-full-width">
  <?php
  if (!isset($consultDetails)) {
    $consultDetails = array();
  }
  $formAtribs = array('id' => 'consultfrm', 'accept-charset' => 'utf-8', 'method' => 'post');
  $hidden = array();
  if (isset($consultDetails['id_consult']) && $consultDetails['id_consult'] > 0) {
    $hidden['id_consult'] = $consultDetails['id_consult'];
  } else {
    $hidden['id_consult'] = 0;
  }
  if (isset($consultDetails['id_patient'])) {
    $hidden['id_patient'] = $consultDetails['id_patient'];
  } else {
    $hidden['id_patient'] = $selectedPatient;
  }
  if (isset($consultDetails['id_employee']) && $consultDetails['id_employee'] > 0) {
    $hidden['id_employee'] = $consultDetails['id_employee'];
  } else {
    $hidden['id_employee'] = $this->session->id_employee;
  }
  $btnLetter = array(
      'name' => 'medicalLetter',
      'id' => 'consultfrm_medical_letter',
      'value' => 'true',
      'type' => 'button',
      'class' => 'btn btn-default pull-right',
      'content' => 'Scrisoare medicală'
  );
  $btnSubmit = array(
      'name' => 'btnSubmit',
      'id' => 'consultfrm_submit',
      'value' => 'true',
      'type' => 'submit',
      'class' => 'btn btn-primary',
      'content' => 'Salvează'
  );

  function taConsult($name, $placeholder, $value = '') {
    $ta = array();
    $ta['data'] = array(
        'name' => $name,
        'placeholder' => $placeholder,
        'id' => 'consultfrm_' . $name,
        'class' => 'form-control',
        'style' => 'height:7rem;'
    );
    if (isset($value[$name])) {
      $ta['value'] = $value[$name];
    } else {
      $ta['value'] = '';
    }
//    $ta['value'] = $value;
    return $ta;
  }

  $ta[] = taConsult('physiological_antecedents', 'Antecedente fizice', $consultDetails);
  $ta[] = taConsult('pathological_antecedents', 'Antecedente patologice', $consultDetails);
  $ta[] = taConsult('hetero_collateral_antecedents', 'Antecedente hetero-coaterale', $consultDetails);
  $ta[] = taConsult('medium_conditions', 'Condiții de mediu', $consultDetails);
  $ta[] = taConsult('present_status', 'Starea prezentă', $consultDetails);
  $ta[] = taConsult('vascular_apparatus', 'Status personal', $consultDetails);
  $ta[] = taConsult('local_complementary_exams', 'Examen complementar local', $consultDetails);
  $ta[] = taConsult('personal_antecedents', 'Antecedente personale', $consultDetails);
  $ta[] = taConsult('consult_reasons', 'Motivul consultului', $consultDetails);
  $ta[] = taConsult('remarks', 'Observații', $consultDetails);
  $ta[] = taConsult('diagnostic', 'Diagnostic', $consultDetails);
  $ta[] = taConsult('recommendations', 'Recomandări', $consultDetails);
  $ta[] = taConsult('treatment', 'Tratament', $consultDetails);

  echo form_open('eCabCardio/consult/save', $formAtribs, $hidden);
  echo form_fieldset('Datele consultului');
//  echo form_hidden($hidden);
  foreach ($ta as $taItem) {
    echo '<div class="form-group">';
    echo form_textarea($taItem['data'], $taItem['value']);
    echo '</div>';
  }
  echo '<div class="row">';
  echo '<div class="col-md-6 col-sm-6 form-group">';
  echo '<h5>Investigații efectuate</h5>';
  echo $investigationsList;
  echo '</div>';
  echo '<div class="col-md-6 col-sm-6 form-group">';
  echo '<h5>Analize recomandate</h5>';
  echo $analizesList;
  echo '</div>';
  echo '<p>&nbsp;</p>';
  echo '</div>';
  echo '<div class="form-group">';
  echo form_button($btnSubmit);
  echo form_button($btnLetter);
  echo '</div>';
  echo '<div class="form-group">';
  echo '<div class="alert-info text-center">' . $consultPrice . ' lei</div>';
  echo '</div>';
  echo form_fieldset_close();
  echo form_close();
  ?>

</form>
</div>