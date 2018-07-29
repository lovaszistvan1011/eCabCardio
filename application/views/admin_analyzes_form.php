<div class="justify-content-center align-items-center">
  <?php
  
  $attributes = array('id' => 'investigationfrm', 'accept-charset' => 'utf-8', 'method' => 'post');
  $btnSubmit = array(
      'name' => 'btnSubmit',
      'id' => 'investigationfrm_submit',
      'value' => 'true',
      'type' => 'submit',
      'class' => 'btn btn-primary',
      'content' => 'Salvează'
  );
  $name = array(
      'name' => 'name',
      'id' => 'investigationfrm_name',
      'placeholder' => 'Nume',
      'value' => $analyzes['name'],
      'class' => 'form-control'
  );
  echo form_open('admin/analyzes/save', $attributes);
  echo form_hidden('id_analyze', $analyzes['id_analyze']);
  echo '<p>' . form_input($name) .'</p>';
  echo '<br>' . form_button($btnSubmit) .'</p>';
  echo form_close();
  ?>
</div>