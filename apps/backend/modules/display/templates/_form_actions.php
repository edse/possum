<ul class="sf_admin_actions">
<?php if ($form->isNew()): ?>
  <?php echo $helper->linkToDelete($form->getObject(), array('block_id' => $form->getObject()->Block->getId(), 'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <li class="sf_admin_action_list"><a href="<?php echo url_for('homepage')?>block/<?php echo $form->getObject()->Block->getId() ?>/ListDisplays">Back to list</a></li>  
  <?php //echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save_and_add',  'label' => 'Save and add',)) ?>
<?php else: ?>
  <?php echo $helper->linkToDelete($form->getObject(), array('block_id' => $form->getObject()->Block->getId(), 'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  <li class="sf_admin_action_list"><a href="<?php echo url_for('homepage')?>block/<?php echo $form->getObject()->Block->getId() ?>/ListDisplays">Back to list</a></li>  
  <?php //echo $helper->linkToList(array(  'params' =>   array(  ),  'class_suffix' => 'list',  'label' => 'Back to list',)) ?>
  <?php echo $helper->linkToSave($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save',  'label' => 'Save',)) ?>
  <?php echo $helper->linkToSaveAndAdd($form->getObject(), array(  'params' =>   array(  ),  'class_suffix' => 'save_and_add',  'label' => 'Save and add',)) ?>
<?php endif; ?>
</ul>
