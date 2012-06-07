<?php use_helper('I18N') ?>
<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($asset->getId(), 'asset_section_assets_edit', $asset) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_AssetType">
  <?php echo $asset->getAssetType() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_thumbnail">
  <?php $a = $asset->getThumbnail2(); if($a!=""):?>
  <img src="<?php echo $a ?>" />
  <?php endif;?>
</td>
<td class="sf_admin_text sf_admin_list_td_Site">
  <?php echo $asset->getSite() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo link_to($asset->getTitle(), 'asset_section_assets_edit', $asset) ?>
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
