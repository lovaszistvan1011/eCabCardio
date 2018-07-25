<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/css/bootstrap.min.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/css/style.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/js/quill/quill.bubble.css" media="screen"/>
    <title>eCabCardio - scrisoare medicală</title>
  </head>
  <body>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 container-fluid">
      <div clas="row">
        <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 text-left">
          <!--<h1>-->
          <span class="title pull-right">eCabCardio</span>
          <!--</h1>-->
        </div>

        <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5 mb20">
          <p>
            <span class="pull-left">Cabinet</span> <span class="pull-right">eCabCardio</span></p>
          <p><span class="pull-left">Medic</span> <span class="pull-right"><?php echo $letter['employee_first_name'] . ' ' . $letter['employee_last_name']; ?></span></p>
          <p class="mb0"><span class="pull-left">Specialitate</span> <span class="pull-right"><?php echo $letter['employee_title']; ?></span>
          </p>
        </div>
      </div>
      <div clas="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-40">
          <h1 class="text-center mt30 mb30">Scrisoare medicală</h1>
          <div class="qEditor eCabCardioLetterTextArea">
            <p>&emsp;
              <?php echo $letter['patient_sex']; ?> 
              <strong>
                <?php echo $letter['patient_first_name'] . ' ' . $letter['patient_last_name']; ?>
              </strong> 
              în vârstă de 
              <strong>
                <?php echo $letter['patient_age']; ?> ani
              </strong> 
              cu domiciliul în 
              <strong>
                <?php echo $letter['patient_address'] . ', loc. ' . $letter['patient_locality'] . ', jud. ' . $letter['patient_county']; ?>
              </strong>, s-a prezentat pentru consult la data de 
              <strong>
                <?php echo $today; ?>
              </strong>.</p>
            <p>&emsp;Pacientul(a) a fost examinat(ă) clinic, constatându-se:</p>
            <p>&emsp;&emsp;<strong>Motivul consultului</strong></p>
            <p>&emsp;
              <?php echo $letter['consult_reasons']; ?>
            </p>

            <p class="eCabCardioIndent mt-20"><strong>Diagnostic</strong></p>
            <p class="eCabCardioIndent">
              <?php echo $letter['diagnostic']; ?>
            </p>
            <p class="eCabCardioIndent mt-20"><strong>Observații</strong></p>
            <p class="eCabCardioIndent">
              <?php echo $letter['remarks']; ?>
            </p>
            <p class="eCabCardioIndent mt-20 title"><strong>Recomandări</strong></p>
            <p class="eCabCardioIndent">
              <?php echo $letter['recommendations']; ?>
            </p>
            <p class="eCabCardioIndent title"><strong>Analize recomandate</strong></p>
            <ul>
              <?php foreach ($analizes as $analize) { ?>
                <li><?php echo $analize['name']; ?></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
      <div clas="row">
        <div clas="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
          <p><span class="text-center">Data, <?php echo $today; ?></span> 
        </div>
        <div clas="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center"></div>
        <div clas="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
          <span class="text-center">Semnătura</span></p>
        </div>
      </div>
      <div clas="row">
        <div clas="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
          <button class="btn btn-primary" type="button">
            <img class="pull-left consultIconSize img-circle img-responsive" src="<?php echo base_url(); ?>appearance/images/icons/icon_print.png" alt="Imprimați scrisoarea" title="Imprimați scrisoarea" aria-label="Imprimați scrisoarea" aria-hidden="true">Imprimați
          </button>
        </div>
      </div> 
    </div>
    <!--Header columns container-->


    <!--jQuery 3.3.1-->
    <script src="<?php echo base_url(); ?>appearance/js/jquery-3.3.1.min.js"></script>
    <!--Bootstrap-->
    <script src="<?php echo base_url(); ?>appearance/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>appearance/js/popper.min.js"></script>


    <script src="<?php echo base_url(); ?>appearance/ajax/consult.js"></script>

    <script src="<?php echo base_url(); ?>appearance/js/quill/quill.min.js"></script>
    <script>
      var quill = new Quill('.qEditor', {
        modules: {
//            toolbar: '#toolbar'
        },
//          placeholder: 'Compose an epic...',
        theme: 'bubble'
      });
    </script>
  </body>
</html>