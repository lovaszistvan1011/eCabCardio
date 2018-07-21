<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<br>Sesiune: <?php print_r( $session); ?>
<br>
<br>

<div class="container-fluid">
  <div class="col-md-12 col-sm-12">
    <div class="row">
      <div class="col-md-4 col-sm-4">
        <div class="row">
          <div class="service-block text-center mb5">
            <?php echo $demographicalData; ?>
          </div>
        </div>
        <h3>Consultații efectuate</h3>
        <div class="row">
          <div class="service-block text-justify mb5">
            <?php echo $consultsList; ?>
          </div>
        </div>
      </div>
      <div class="col-md-7 col-sm-7">
        <?php
        $this->load->view('consult_form');
        ?>
      </div>
    </div>
  </div>
</div>