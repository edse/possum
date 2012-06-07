<td style="width: 215px;">
  <ul class="sf_admin_td_actions">
    <li class="sf_admin_action_sections">
      <?php echo link_to(__('Sections', array(), 'messages'), 'site/ListSections?id='.$site->getId(), array()) ?>
    </li>
    <?php echo $helper->linkToEdit($site, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php if ($sf_user->hasCredential(array(  0 => 'admin',))): ?>
      <?php echo $helper->linkToDelete($site, array(  'credentials' =>   array(    0 => 'admin',  ),  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <?php endif; ?>
  </ul>
</td>