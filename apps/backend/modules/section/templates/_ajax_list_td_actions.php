<td>
  <ul class="sf_admin_td_actions" style="width: 270px;">
    <li class="sf_admin_action_assets">
      <?php //echo link_to(__('Assets', array(), 'messages'), 'section/ListAssets?id='.$section->getId(), array()) ?>
    </li>
    <li class="sf_admin_action_blocks">
      <?php echo link_to(__('Assets ('.count($section->Assets).')', array(), 'messages'), 'section/ListAssets?id='.$section->getId(), array()) ?>
    </li>
    <li class="sf_admin_action_blocks">
      <?php echo link_to(__('Blocks', array(), 'messages'), 'section/ListBlocks?id='.$section->getId(), array()) ?>
    </li>
    
    <?php echo $helper->linkToEdit($section, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    
    <li class="sf_admin_action_delete">
      <a href="javascript:;" onclick="deleteSection('<?php echo $section->getId()?>', '<?php echo $section->getSiteId()?>');">Delete</a>
    </li>
    
    <?php //echo $helper->linkToDelete($section, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  </ul>
</td>
