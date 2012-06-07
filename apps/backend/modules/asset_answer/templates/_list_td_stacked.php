<td colspan="5">
  <?php echo __('%%id%% - %%asset_id%% - %%asset_question_id%% - %%answer%% - %%votes%%', array('%%id%%' => link_to($asset_answer->getId(), 'asset_answer_edit', $asset_answer), '%%asset_id%%' => $asset_answer->getAssetId(), '%%asset_question_id%%' => $asset_answer->getAssetQuestionId(), '%%answer%%' => $asset_answer->getAnswer(), '%%votes%%' => $asset_answer->getVotes()), 'messages') ?>
</td>
