<?php /* <td class="sf_admin_text sf_admin_list_td_id">
  <?php echo $asset->getId() ?>
</td> */ ?>
<td class="sf_admin_text sf_admin_list_td_thumbnail">
  <img src="<?php echo $asset->getThumbnail22() ?>">
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php echo $asset->getTitle() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_AssetType">
  <?php echo $asset->getAssetType() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_Site" colspan="2">
  <?php echo $asset->getSite() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
<?php 
$select  = '<select id="rp_'.$asset->related_asset_id.'" onChange="editRelatedAssetType(\''.$asset->id.'\', \''.$asset->related_asset_id.'\')">';
$select .= '<option value=""></option>';
foreach($relatedAssetTypes as $rat){
  $select .= '<option value="'.$rat->title.'"';
  if($asset->related_asset_type == $rat->title)
    $select .= ' selected="selected"';
  $select .= '>'.$rat->title.'</option>';
}
$select .= '</select>';
?>
<?php echo $select ?>
