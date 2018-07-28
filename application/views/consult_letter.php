<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/js/quill/quill.bubble.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/css/bootstrap.min.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/css/style.css" media="screen"/>


    <title>eCabCardio - scrisoare medicală</title>
  </head>
  <body>

    <div class="container-fluid">
      <!--Clinic, doctor-->
      <div class="row text-center mb30">
        <div class="col-6">
          <h1><img class="eCabCardioLogo img-circle img-responsive" src="<?php echo base_url(); ?>appearance/images/<?php echo $clinic['logo']; ?>" alt="Logo <?php echo $clinic['name']; ?>" title="Logo <?php echo $clinic['name']; ?>" aria-label="Logo <?php echo $clinic['name']; ?>" aria-hidden="true">
            <?php echo $clinic['name']; ?>
          </h1>
          <?php echo $clinic['address']; ?> | <?php echo $clinic['phone']; ?>
          <br>
          <?php echo $clinic['email']; ?> | <?php echo $clinic['www']; ?>
        </div>
        <div class="col-6">

          <!--Contained grid with details-->
          <div class="container-fluid">
            <div class="row mt10">
              <div class="col-4 text-right">Cabinet</div>
              <div class="col-8 text-left bg-light border border-1 border-primary rounded">eCabCardio</div>
            </div>
            <div class="row mt10">
              <div class="col-4 text-right">Medic</div>
              <div class="col-8 text-left bg-light border border-1 border-primary rounded"><?php echo $letter['employee_first_name'] . ' ' . $letter['employee_last_name']; ?></div>
            </div>
            <div class="row mt10">
              <div class="col-4 text-right">Specialitate</div>
              <div class="col-8 text-left bg-light border border-1 border-primary rounded"><?php echo $letter['employee_title']; ?></div>
            </div>
          </div>
        </div>
      </div>

      <!--Title-->
      <div class="row text-center mt40 mb30">
        <div class="col-12">
          <h1 class="title">Scrisoare medicală</h1>
        </div>
      </div>

      <!--Content-->
      <div class="row text-center">
        <div class="col-12">
          <div id="letterContent" class="qEditor eCabCardioLetterTextArea">
            <p>
              <?php echo $letter['patient_sex']; ?> 
              <strong>
                <?php
                echo $letter['patient_first_name'] . ' ' . $letter['patient_last_name'];
                ?>
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
              </strong>.
            </p>
            <p>Pacientul(a) a fost examinat(ă) clinic, constatându-se:</p>
            <p>
              <strong>Motivul consultului</strong>
            </p>
            <p>
              <?php
              echo $letter['consult_reasons'];
              ?>
            </p>

            <p class="eCabCardioIndent mt-20">
              <strong>Diagnostic</strong>
            </p>
            <p class="eCabCardioIndent">
              <?php 
              echo $letter['diagnostic']; 
              ?>
            </p>
            <p class="eCabCardioIndent mt-20">
              <strong>Observații</strong>
            </p>
            <p class="eCabCardioIndent">
              <?php echo $letter['remarks']; ?>
            </p>
            <p class="eCabCardioIndent mt-20 title">
              <strong>Recomandări</strong>
            </p>
            <p class="eCabCardioIndent">
              <?php echo $letter['recommendations']; ?>
            </p>
            <p class="eCabCardioIndent title">
              <strong>Analize recomandate</strong>
            </p>
            <ul>
              <?php foreach ($analizes as $analize) { ?>
                <li>
                  <?php 
                  echo $analize['name']; ?>
                </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
      <!--</div>-->

      <!--Data, semnătura-->
      <div class="row text-center">
        <div class="col-1"></div>
        <div class="col-4">
          Data, 
          <br>
          <?php echo $today; ?>
        </div>
        <div class="col-2"></div>
        <div class="col-4">
          Semnătura,
          <br>
          <?php echo $letter['employee_first_name'] . ' ' . $letter['employee_last_name']; ?>
        </div>
        <div class="col-1"></div>
      </div>

      <!--Buton printare-->
      <form>
        <input type="hidden" name="id_consult" value="<?php echo $letter['id_consult']; ?>">
        <input type="hidden" name="id_employee" value="<?php echo $this->session->id_employee; ?>">
      </form>
      <div class="row text-center mt30 mt40">
        <div class="col-12">
          <button id="btnSaveLetter" class="btn btn-primary" type="button">
            <img class="pull-left consultIconSize img-circle img-responsive" src="<?php echo base_url(); ?>appearance/images/icons/icon_print.png" alt="Imprimați scrisoarea" title="Imprimați scrisoarea" aria-label="Imprimați scrisoarea" aria-hidden="true">Imprimați
          </button>
        </div>
      </div>

    </div>

    <!--jQuery 3.3.1-->
    <script src="<?php echo base_url(); ?>appearance/js/jquery-3.3.1.min.js"></script>
    <!--Bootstrap-->
    <script src="<?php echo base_url(); ?>appearance/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>appearance/js/popper.min.js"></script>

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

    <script src="<?php echo base_url(); ?>appearance/ajax/consult.js"></script>

  </body>
</html>