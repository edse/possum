<td style="width: 200px;">
  <ul class="sf_admin_td_actions">
    
    <?php if(!$display->getIsActive()): ?>
    <li class="sf_admin_action_activate">
      <a href="/backend.php/display/<?php echo $display->getId() ?>/ListActivate?block_id=<?php echo $display->getBlockId() ?>">Ativar</a>
    </li>
    <?php else: ?>
    <li class="sf_admin_action_activate">
      <a href="/backend.php/display/<?php echo $display->getId() ?>/ListDeactivate?block_id=<?php echo $display->getBlockId() ?>">Desativar</a>
    </li>
    <?php endif; ?>

    <?php echo $helper->linkToEdit($display, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    
    <li class="sf_admin_action_delete">
      <a href="javascript:;" onclick="deleteDisplay('<?php echo $display->getId()?>', '<?php echo $display->getBlockId()?>');">Delete</a>
    </li>
    
    <?php //echo $helper->linkToDelete($display, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  </ul>
</td>
