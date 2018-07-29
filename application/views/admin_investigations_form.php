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
      'value' => $investigation['name'],
      'class' => 'form-control'
  );
  $price = array(
      'name' => 'price',
      'id' => 'investigationfrm_price',
      'placeholder' => 'Preț',
      'value' => $investigation['price'],
      'class' => 'form-control'
  );
  echo form_open('admin/investigations/save', $attributes);
  echo form_hidden('id_investigations', $investigation['id_investigations']);
  echo '<p>' . form_input($name) .'</p>';
  echo '<p>' . form_input($price) .'</p>';
  echo '<br>' . form_button($btnSubmit) .'</p>';
  echo form_close();
  ?>
</div>