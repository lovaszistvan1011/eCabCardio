<div id="consultForm" class="util-full-width">

  <?php
  if (!isset($consultDetails)) {
    $consultDetails = array();
  }
  $formAtribs = array(
      'id' => 'consultForm',
      'accept-charset' => 'utf-8',
      'method' => 'post'
  );
  $hidden = array();
  if (isset($consultDetails['Id_consult']) && $consultDetails['Id_consult'] > 0) {
    $hidden['id_consult'] = $consultDetails['Id_consult'];
  } else {
    $hidden['id_consult'] = 0;
  }
  if (isset($consultDetails['Id_patient'])) {
    $hidden['id_patient'] = $consultDetails['Id_patient'];
  } else {
    $hidden['id_patient'] = $this->session->id_patient;
  }
  if (isset($consultDetails['Id_employee']) && $consultDetails['Id_employee'] > 0) {
    $hidden[''] = $consultDetails['Id_employee'];
  } else {
    $hidden[''] = $this->session->id_employee;
  }
  $btnLetter = array(
      'name' => 'medicalLetter',
      'id' => 'consultFormMedicalLetter',
      'value' => 'true',
      'type' => 'button',
      'content' => 'Scrisoare medicală'
  );
  $btnSubmit = array(
      'name' => 'btnSubmit',
      'id' => 'consultFormSubmit',
      'value' => 'true',
      'type' => 'submit',
      'content' => 'Scrisoare medicală'
  );

  function taConsult($name, $placeholder, $value = '') {
    $ta = array();
    $ta['data'] = array(
        'name' => $name,
        'placeholder' => $placeholder,
        'id' => 'consultForm' . $name,
        'class' => 'util-full-width textarea'
    );
    if (isset($value[$name])) {
      $ta['value'] = $value[$name];
    } else {
      $ta['value'] = '';
    }
//    $ta['value'] = $value;
    return $ta;
  }

  $ta[] = taConsult('PhysiologicalAntecedents', 'Antecedente fizice', $consultDetails);
  $ta[] = taConsult('PathologicalAntecedents', 'Antecedente patologice', $consultDetails);
  $ta[] = taConsult('HeteroCollateralAntecedents', 'Antecedente hetero-coaterale', $consultDetails);
  $ta[] = taConsult('MediumConditions', 'Condiții de mediu', $consultDetails);
  $ta[] = taConsult('PresentStatus', 'Starea prezentă', $consultDetails);
  $ta[] = taConsult('VascularAparatus', 'Status personal', $consultDetails);
  $ta[] = taConsult('LocalComplementaryExams', 'Examen complementar local', $consultDetails);
  $ta[] = taConsult('PersonalAntecedents', 'Antecedente personale', $consultDetails);
  $ta[] = taConsult('ConsultReasons', 'Motivul consultului', $consultDetails);
  $ta[] = taConsult('Remarks', 'Observații', $consultDetails);
  $ta[] = taConsult('Diagnostic', 'Diagnostic', $consultDetails);
  $ta[] = taConsult('Recommendations', 'Recomandări', $consultDetails);
  $ta[] = taConsult('Treatment', 'Tratament', $consultDetails);
//  $ta[] = taConsult('', '');
//  $ta[] = taConsult('', '');
//  echo var_dump($ta[0]);

  echo form_open('consult/save', $formAtribs, $hidden);
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
  echo form_button($btnLetter);
  echo form_button($btnSubmit);
  echo '</div>';
  echo '<div class="form-group">';
  echo form_error('consultFormError', '<div class="error">', '</div>');
  echo '</div>';
  echo form_fieldset_close();
  echo form_close();
  ?>

</form>
</div>