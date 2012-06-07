<td>
  <ul class="sf_admin_td_actions">

    <?php if(!$SonyCategory->getIsActive()): ?>
    <li class="sf_admin_action_activate">
      <a href="/backend.php/display/<?php echo $SonyCategory->getId() ?>/ListActivate?id=<?php echo $SonyCategory->getId() ?>">Ativar</a>
    </li>
    <?php else: ?>
    <li class="sf_admin_action_activate">
      <a href="<?php echo url_for('homepage')?>sony/<?php echo $SonyCategory->getId() ?>/ListDeactivate?id=<?php echo $SonyCategory->getId() ?>">Desativar</a>
    </li>
    <?php endif; ?>

    <?php echo $helper->linkToEdit($SonyCategory, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php echo $helper->linkToDelete($SonyCategory, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  </ul>
</td>
