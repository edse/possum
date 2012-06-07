<?php if ($sf_user->hasFlash('notice')): ?>
  <div class="alert alert-success">
    <a class="close" data-dismiss="alert" href="#">×</a>
    <h4 class="alert-heading">Ok!</h4>
    <?php echo html_entity_decode(__($sf_user->getFlash('notice'), array(), 'sf_admin')) ?>
  </div>
<?php endif; ?>

<?php if ($sf_user->hasFlash('error')): ?>
  <div class="alert alert-error">
    <a class="close" data-dismiss="alert" href="#">×</a>
    <h4 class="alert-heading">Atenção!</h4>
    <?php echo html_entity_decode(__($sf_user->getFlash('error'), array(), 'sf_admin')) ?>
  </div>
<?php endif; ?>
