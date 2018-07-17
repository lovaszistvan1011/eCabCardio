<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
  <!--  <div class="col-md-12 col-sm-12 text-center mb60">
      <h1>Cardiology Services</h1>
      <p>Aliquam sodales in lacus ut diamuspendisse imperdiet enimass</p> 
    </div>-->
  <div class="col-md-12 col-sm-12">
    <div class="row">
      <div class="col-md-5 col-sm-5">
        <div class="row">
          <div class="service-block text-center mb3">
            <!--<div class="service-img mb30"><a href="service-detail.html" class="imghover"><img src="images/service-1.jpg" class="img-responsive" alt=""></a></div>-->
            <!--<h2><a href="#" class="heading-title">Diagnostic Cardiac</a></h2>-->
            <?php echo $demographicalData; ?>
          </div>
        </div>
        <div class="row">
          <h3>Consultații efectuate</h3>
          <?php echo $consultsList; ?>
        </div>
      </div>

      <div class="col-md-7 col-sm-7">
        <!--<div class="service-block text-center">-->
          <?php 
          $this->load->view('consult_form'); 
//          echo $analizesList;
          ?>
        <!--</div>-->
      </div>

      <!--      <div class="col-md-4 col-sm-4">
              <div class="service-block text-center">
                <div class="service-img mb30"><a href="service-detail.html" class="imghover"><img src="images/service-3.jpg" class="img-responsive" alt=""></a></div>
                <h2><a href="#" class="heading-title">Invasive Procedures</a></h2>
              </div>
            </div>-->
    </div>

    <!--    <div class="row">
            <div class="col-md-4 col-sm-4">
              <div class="service-block text-center">
                  <div class="service-img mb30"><a href="service-detail.html" class="imghover"><img src="images/service-4.jpg" class="img-responsive" alt=""></a></div>
                  <h2><a href="#" class="heading-title">Heart Conditions Treated</a></h2>
                </div>
            </div>
    
            <div class="col-md-4 col-sm-4">
              <div class="service-block text-center">
                  <div class="service-img mb30"><a href="service-detail.html" class="imghover"><img src="images/service-5.jpg" class="img-responsive" alt=""></a></div>
                  <h2><a href="#" class="heading-title">Vein Clinic Services</a></h2>
                </div>
            </div>
    
            <div class="col-md-4 col-sm-4">
              <div class="service-block text-center">
                  <div class="service-img mb30"><a href="service-detail.html" class="imghover"><img src="images/service-6.jpg" class="img-responsive" alt=""></a></div>
                  <h2><a href="#" class="heading-title">Diagonstic Cardiac</a></h2>
                </div>
            </div>
        </div>-->
  </div>
</div>