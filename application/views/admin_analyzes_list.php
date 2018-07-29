<ul>
  <?php foreach ($listItems as $item): ?>
    <li class="mx-2 my-4">
      <?php echo $item['name']; ?> 
      <div class="pull-right">
        <a href="/eCabCardio/admin/analyzes/edit/<?php echo $item['id_analyze']; ?>">
          <img class="img-circle img-responsive alignleft consultIconSize" src="<?php echo base_url(); ?>appearance/images/icons/icon_edit.png" alt="Actualizează analiză" title="Actualizează analiză" aria-label="Actualizează analiză" aria-hidden="true">
        </a>
        <a href="#" class="btnDelAnalyzes" data-analyze="<?php echo $item['id_analyze']; ?>">
          <img class="img-circle img-responsive alignleft consultIconSize" src="<?php echo base_url(); ?>appearance/images/icons/icon_del.png" alt="Ștergere analiză" title="Ștergere analiză" aria-label="Ștergere analiză" aria-hidden="true">
        </a>
      </div>
    </li>
  <?php endforeach; ?>
</ul>
<p class="my-4">
  <a class="pull-right" href="/eCabCardio/admin/analyzes/edit"><img class="img-circle img-responsive alignleft consultIconSize" src="<?php echo base_url(); ?>appearance/images/icons/icon_add.png" alt="Analiză nouă" title="Analiză nouă" aria-label="Analiză nouă" aria-hidden="true"></a>
</p>