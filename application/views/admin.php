<div class="container-fluid rounded">
  <div class="row">
    <div class="col bg-primary m-3 p-1 text-center">
      <h3 class="title"><a href="/eCabCardio/admin/investigations">Investigații</a></h3>
    </div>
    <div class="col bg-primary m-3 p-1 text-center">
      <h3 class="title"><a href="/eCabCardio/admin/analyzes">Analize</a></h3>
    </div>
  </div>
  <div class="row">
    <div class="col m-3 p-1 text-center">
      <h3 class="title">Cabinet</h3>
      <?php $this->load->view('admin_clinic_form', [$clinicHumanColumns, $clinic]); ?>
    </div>
    <div class="col m-3 px-1 py-3 text-center">
      <h3 class="title">Angajați</h3>
      <div class="text-left eCabCardioScroll">
        <ul>
          <?php foreach ($employees as $emp): ?>
            <li class="mx-2 my-4"><?php echo $emp['first_name'] . ' ' . $emp['last_name'] . ' <span class="pull-right"><a href="admin/employee/' . $emp['id_employee'] . '"><img class="img-circle img-responsive alignleft consultIconSize" src="' . base_url() . 'appearance/images/icons/icon_edit.png" alt="Actualizează angajat" title="Actualizează angajat" aria-label="Actualizează angajat" aria-hidden="true"></a></span>'; ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <a class="pull-right" href="admin/employee"><img class="img-circle img-responsive alignleft consultIconSize" src="<?php echo base_url(); ?>appearance/images/icons/icon_add.png" alt="Angajat nou" title="Angajat nou" aria-label="Angajat nou" aria-hidden="true"></a>
    </div>
  </div>

</div>
</div>