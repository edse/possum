<td>
  <ul class="sf_admin_td_actions" style="width: 300px;">

  <?php if($category->Parent->getId() > 0): ?>

    <?php if(!$category->getIsActive()): ?>
    <li class="sf_admin_action_activate">
      <a href="<?php echo url_for('homepage')?>sony/<?php echo $category->getId() ?>/ListActivate?id=<?php echo $category->getId() ?>">Ativar</a>
    </li>
    <?php else: ?>
    <li class="sf_admin_action_activate">
      <a href="<?php echo url_for('homepage')?>sony/<?php echo $category->getId() ?>/ListDeactivate?id=<?php echo $category->getId() ?>">Desativar</a>
    </li>
    <?php endif; ?>

    <li class="sf_admin_action_blocks">
      <?php echo link_to(__('Assets ('.count($category->Assets).')', array(), 'messages'), 'sony/ListAssets?id='.$category->getId(), array()) ?>
    </li>
  <?php endif; ?>
    <?php echo $helper->linkToEdit($category, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit')) ?>
    
    <li class="sf_admin_action_delete">
      <a href="javascript:;" onclick="deleteCategory('<?php echo $category->getId()?>');">Delete</a>
    </li>   
    
    <?php //echo $helper->linkToDelete($section, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    
  </ul>
</td>
