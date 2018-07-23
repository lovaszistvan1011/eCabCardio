<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/css/bootstrap.min.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/css/style.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/js/quill/quill.bubble.css" media="screen"/>

    <!--jQuery 3.3.1-->
    <script src="<?php echo base_url(); ?>appearance/js/jquery-3.3.1.min.js"></script>
    <!--Bootstrap-->
    <script src="<?php echo base_url(); ?>appearance/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>appearance/js/popper.min.js"></script>


    <script src="<?php echo base_url(); ?>appearance/ajax/consult.js"></script>

  </head>
  <body>
    <div class="container">
      <div clas="row align-items-center">
        <div class="col-5 text-left">
          <h1>
            <img class="pull-left eCabCardioLogo img-circle img-responsive" src="<?php echo base_url(); ?>appearance/images/HealthyHeart.png" alt="Imprimați scrisoarea" title="Imprimați scrisoarea" aria-label="Imprimați scrisoarea" aria-hidden="true">
            eCabCardio app
          </h1>
        </div>
        <div class="col-1 text-center text">
        </div>
        <div class="col-6 text-right">
          <p>
            <span class="pull-left">Cabinet</span> <span class="pull-right">eCabCardio</span>
            <br><span class="pull-left">Medic</span> <span class="pull-right">Popescu Avram</span>
            <br><span class="pull-left">Specialitate</span> <span class="pull-right">specialist cardiolog</span>
          </p>
        </div>

      </div>
      <div clas="row align-items-center mt-3">

        <div class="col-12">
          <h1 class="text-center">Scrisoare medicală</h1>
          <div class="qEditor eCabCardioLetterTextArea {
               ">
              <p>Domnul(a) <strong>NUME</strong> în vârstă de <strong>xx ani</strong> cu domiciliul în <strong>localitatea, județul, adresa</strong>, s-a prezentat pentru consult la data de <strong>DATA</strong>.</p>
              <p>Pacientul(a) a fost examinat(ă) clinic, constatându-se:</p>
              <p><strong>Motivul consultului</strong></p>
              <p>... va urma ...</p>
              <p><strong>Diagnostic</strong></p>
              <p>... va urma ...</p>
              <p><strong>Observații</strong></p>
              <p>... va urma ...</p>
              <p><strong>Recomandări</strong></p>
              <p>... va urma ...</p>
              <p><strong>Analize recomandate</strong></p>
              <p>... va urma ...</p>
              <p>... va urma ...</p>

            </div>
          </div>

        </div>
        <div clas="row align-items-center">

          <div clas="col-12">
            <p><span class="pull-left">Data,</span> <span class="pull-right">Semnătura</span></p>
          </div>

        </div>
        <div clas="row align-items-center">

          <div clas="col-12 text-center">
            <button class="btn btn-primary" type="button">
              <img class="pull-left consultIconSize img-circle img-responsive" src="<?php echo base_url(); ?>appearance/images/icons/icon_print.png" alt="Imprimați scrisoarea" title="Imprimați scrisoarea" aria-label="Imprimați scrisoarea" aria-hidden="true">
              Imprimați
            </button>
          </div>

          <div clas="w-100"><p>&nbsp;</p></div>
        </div> 
      </div>
      <!--Header columns container-->

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