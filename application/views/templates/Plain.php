<?php
$this->load->view("templates/header");
?>
<div class="intro-section"> <!-- intro section -->
  <?php
  $this->load->view("templates/menu");
  ?>

</div>
<!-- /.intro section -->
<div class="container-fluid">
  <h2><?php echo $title; ?></h2>

  <?php echo $body; ?>
</div>
<?php
$this->load->view("templates/footer");
?>