<!DOCTYPE html>
<html lang="ro">
  <head>
    <meta charset="UTF-8">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/css/bootstrap.min.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/css/animsition.min.css" media="screen"/>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/css/font-awesome.min.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/js/summernote/summernote-bs4.css" media="screen"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>appearance/css/style.css" media="screen"/>

    <!--jQuery 3.3.1-->
    <script src="<?php echo base_url(); ?>appearance/js/jquery-3.3.1.min.js"></script>
    <!--Bootstrap-->
    <script src="<?php echo base_url(); ?>appearance/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>appearance/js/popper.min.js"></script>
    <!--MenuMaker-->
    <script src="<?php echo base_url(); ?>appearance/js/menumaker.min.js"></script>
    <script type="text/javascript">
      $("#navigation").menumaker({
        title: "Meniu",
        format: "multitoggle"
      });
    </script>

    <!-- animsition --> 
    <script src="<?php echo base_url(); ?>appearance/js/animsition.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>appearance/js/animsition-script.js"></script> 

    <script src="<?php echo base_url(); ?>appearance/js/jquery.sticky.js"></script>
    <script src="<?php echo base_url(); ?>appearance/js/sticky-header.js"></script>

    <script src="<?php echo base_url(); ?>appearance/js/back-to-top.js"></script>
    <script src="<?php echo base_url(); ?>appearance/js/summernote/summernote-bs4.min.js"></script>
    <script>
      $(document).ready(function () {
        $('#summernote').summernote();
      });
    </script>

    <script src="<?php echo base_url(); ?>appearance/ajax/consult.js"></script>

    <title>eCabCardio app</title>
  </head>
  <body>
    <div class="container-fluid">
      <img class="pull-left eCabCardioLogo img-circle img-responsive" src="<?php echo base_url(); ?>appearance/images/HealthyHeart.png" alt="Imprimați scrisoarea" title="Imprimați scrisoarea" aria-label="Imprimați scrisoarea" aria-hidden="true">
      <h1 class="aligncenter">eCabCardio app</h1>
    </div>
