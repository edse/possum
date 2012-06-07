<td style="width: 200px;">
  <ul class="sf_admin_td_actions">
    <li class="sf_admin_action_displays">
      <?php echo link_to(__('Displays', array(), 'messages'), 'block/ListDisplays?id='.$block->getId(), array()) ?>
    </li>

    <?php echo $helper->linkToEdit($block, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>

    <li class="sf_admin_action_delete">
      <a href="javascript:;" onclick="deleteBlock('<?php echo $block->getId()?>', '<?php echo $block->getSectionId()?>');">Delete</a>
    </li>

    <?php //echo $helper->linkToDelete($block, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>

  </ul>
</td>
