<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($category->getId(), 'sony_category', $category) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_active">
  <?php echo get_partial('sony/list_field_boolean', array('value' => $category->getIsActive())) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_active">
  <img src="/uploads/storage/sony/categories/<?php echo $category->getImage() ?>">
</td>
<td class="sf_admin_text sf_admin_list_td_category">
  <?php echo $category->Parent->getTitle() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo link_to($category->getTitle(), 'sony/edit?id='.$category->getId(), array()) ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at" colspan="3">
  <?php echo false !== strtotime($category->getUpdatedAt()) ? format_date($category->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
