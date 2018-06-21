<?php
  $this->load->view("templates/header");
  ?>
<div class="intro-section"> <!-- intro section -->
  <?php
  $this->load->view("templates/menu");
  ?>
  
</div>
<!-- /.intro section -->
<?php
  echo $body;
  ?>
<?php
  $this->load->view("templates/footer");
  ?>