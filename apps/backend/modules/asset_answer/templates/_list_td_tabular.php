<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($asset_answer->getId(), 'asset_answer_edit', $asset_answer) ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_asset_id">
  <?php echo $asset_answer->getAssetId() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_asset_question_id">
  <?php echo $asset_answer->getAssetQuestionId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_answer">
  <?php echo $asset_answer->getAnswer() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_votes">
  <?php echo $asset_answer->getVotes() ?>
</td>
