<?php use_helper('I18N') ?>
<td class="sf_admin_text sf_admin_list_td_id">
  <a href="<?php echo url_for('homepage')?>sony_asset/<?php echo $asset->getId()?>/edit"><?php echo $asset->getId()?></a>
</td>
<td class="sf_admin_text sf_admin_list_td_thumbnail">
  <img src="http://172.20.1.127/assets/<?php echo $asset->SonyCategories[0]->getSlug() ?>/<?php echo $asset->getImage() ?>" />
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <a href="<?php echo url_for('homepage')?>sony_asset/<?php echo $asset->getId()?>/edit"><?php echo $asset->getTitle()?></a>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php echo $asset->getDescription() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($asset->getCreatedAt()) ? format_date($asset->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($asset->getUpdatedAt()) ? format_date($asset->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
