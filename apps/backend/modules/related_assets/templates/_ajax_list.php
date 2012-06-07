<div class="sf_admin_list">
  <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('No result', array(), 'sf_admin') ?></p>
  <?php else: ?>
    <table cellspacing="0" style="width: 100%">
      <thead>
        <tr>
          <th id="sf_admin_list_batch_actions"><!-- <input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /> --></th>
          <?php include_partial('related_assets/list_th_tabular', array('sort' => $sort)) ?>
          <th id="sf_admin_list_th_actions2"><?php echo __('Relationship Type', array(), 'sf_admin') ?></th>
          <th id="sf_admin_list_th_actions"><?php echo __('Actions', array(), 'sf_admin') ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="8">
            <?php if ($pager->haveToPaginate()): ?>
              <?php include_partial('related_assets/pagination', array('pager' => $pager)) ?>
            <?php endif; ?>

            <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?>
            
            <?php if ($pager->haveToPaginate()): ?>
              <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
            <?php endif; ?>
          </th>
        </tr>
      </tfoot>
      <tbody id="sort-list">
        <?php foreach ($pager->getResults() as $i => $asset): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
          <tr id="listItem_<?php echo $asset->id ?>" class="sf_admin_row <?php echo $odd ?>">
            <?php include_partial('related_assets/ajax_list_td_batch_actions', array('asset' => $asset, 'helper' => $helper)) ?>
            <?php include_partial('related_assets/ajax_list_td_tabular', array('asset' => $asset, 'relatedAssetTypes' => $relatedAssetTypes)) ?>
            <?php include_partial('related_assets/ajax_list_td_actions', array('parentAsset' => $parentAsset, 'asset' => $asset, 'helper' => $helper)) ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>