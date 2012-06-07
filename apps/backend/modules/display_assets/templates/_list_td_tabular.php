<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($asset->getId(), 'asset_related_assets_edit', $asset) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_AssetType">
  <?php echo $asset->getAssetType() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_Site">
  <?php echo $asset->getSite() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_thumbnail">
  <img src="<?php echo $asset->getThumbnail2() ?>">
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $asset->getTitle() ?>
</td>