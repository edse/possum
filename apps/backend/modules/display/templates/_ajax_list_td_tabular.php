<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($display->getId(), 'display_edit', $display) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_active">
  <?php echo get_partial('display/list_field_boolean', array('value' => $display->getIsActive())) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_Block">
  <?php echo $display->getBlock() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_Asset">
  <img src="<?php echo $display->getAsset()->getThumbnail2() ?>">
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo link_to($display->getTitle(), 'display_edit', $display) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $display->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_image">
  <a href="/uploads/displays/<?php echo $display->getImage() ?>" target="_blank"><img src="/uploads/displays/<?php echo $display->getImage() ?>" width="100" /></a>
</td>
