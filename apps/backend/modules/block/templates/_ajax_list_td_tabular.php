<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($block->getId(), 'block_edit', $block) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_Section">
  <?php echo $block->getSection() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_slug">
  <?php echo $block->getSlug() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $block->getTitle() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $block->getDescription() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_query">
  <?php echo $block->getQuery() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($block->getCreatedAt()) ? format_date($block->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($block->getUpdatedAt()) ? format_date($block->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
