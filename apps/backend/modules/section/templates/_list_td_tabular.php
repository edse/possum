<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($section->getId(), 'section_edit', $section) ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_active">
  <?php echo get_partial('section/list_field_boolean', array('value' => $section->getIsActive())) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_Site">
  <?php echo $section->getSite() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_parent_section_id">
  <?php echo $section->Section->__toString() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo link_to($section->getTitle(), 'section_edit', $section) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_slug">
  <?php echo $section->getSlug() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($section->getCreatedAt()) ? format_date($section->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($section->getUpdatedAt()) ? format_date($section->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
