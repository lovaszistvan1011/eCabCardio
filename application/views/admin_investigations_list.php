<ul>
  <?php foreach ($listItems as $item): ?>
    <li class="mx-2 my-4"><?php echo $item['name'] . ' (' . $item['price'] . 'lei)  <span class="pull-right"><a href="/eCabCardio/admin/investigations/edit/' . $item['id_investigations'] . '"><img class="img-circle img-responsive alignleft consultIconSize" src="' . base_url() . 'appearance/images/icons/icon_edit.png" alt="Actualizează investigație" title="Actualizează investigație" aria-label="Actualizează investigație" aria-hidden="true"></a></span>'; ?></li>
  <?php endforeach; ?>

</ul>
<p class="my-4">
  <a class="pull-right" href="/eCabCardio/admin/investigations/edit"><img class="img-circle img-responsive alignleft consultIconSize" src="<?php echo base_url(); ?>appearance/images/icons/icon_add.png" alt="Investigație nouă" title="Investigație nouă" aria-label="Investigație nouă" aria-hidden="true"></a>
</p>