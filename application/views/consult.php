<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="col-md-12 col-sm-12 container-fluid">
  <div class="row">
    <div class="col-md-6 col-sm-6">
      <div class="row">
        <div class="service-block text-center mb5 container-fluid">
          <?php echo $demographicalData; ?>
        </div>
      </div>
      <h3>Consultații efectuate <a class="pull-right" href="/eCabCardio/consult/<?php echo $selectedPatient; ?>"><img class="img-circle img-responsive alignleft consultIconSize" src="<?php echo base_url(); ?>appearance/images/icons/icon_add.png" alt="Consult nou" title="Consult nou" aria-label="Consult nou" aria-hidden="true"></a></h3>
      <div class="row">
        <div class="text-justify mb0 container-fluid">
          <?php echo $consultsList; ?>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 container-fluid">
      <?php $this->load->view('consult_form', [$selectedPatient, $consultDetails]); ?>
    </div>
  </div>
</div>