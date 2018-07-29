<ul>
  <?php foreach ($listItems as $item): ?>
    <li class="mx-2 my-4">
      <?php echo $item['name'] . ' (' . $item['price'] . 'lei)'; ?>

      <div class="pull-right">
        <a href="/eCabCardio/admin/investigations/edit/<?php echo $item['id_investigations']; ?>">
          <img class="img-circle img-responsive alignleft consultIconSize" src="<?php echo base_url(); ?>appearance/images/icons/icon_edit.png" alt="Actualizează investigație" title="Actualizează investigație" aria-label="Actualizează investigație" aria-hidden="true">
        </a>
        <a href="#" class="btnDelInvestigations" data-investigation="<?php echo $item['id_investigations']; ?>">
          <img class="img-circle img-responsive alignleft consultIconSize" src="<?php echo base_url(); ?>appearance/images/icons/icon_del.png" alt="Ștergere investigație" title="Ștergere investigație" aria-label="Ștergere investigație" aria-hidden="true">
        </a>
      </div>
    </li>
  <?php endforeach; ?>
</ul>
<p class="my-4">
  <a class="pull-right" href="/eCabCardio/admin/investigations/edit"><img class="img-circle img-responsive alignleft consultIconSize" src="<?php echo base_url(); ?>appearance/images/icons/icon_add.png" alt="Investigație nouă" title="Investigație nouă" aria-label="Investigație nouă" aria-hidden="true"></a>
</p>