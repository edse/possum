<?php use_helper('I18N') ?>
<div class="sf_admin_list">
  <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('No result', array(), 'sf_admin') ?></p>
  <?php else: ?>
    <table cellspacing="0" style="width: 98%">
      <thead>
        <tr>
          <th class="sf_admin_text sf_admin_list_th_id"> </th>
          <th id="sf_admin_list_batch_actions"><!-- <input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /> --></th>
          <?php include_partial('sony_category_assets/list_th_tabular', array('sort' => $sort)) ?>
          <th colspan="9" id="sf_admin_list_th_actions"><?php echo __('Actions', array(), 'sf_admin') ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="17">
            <?php if ($pager->haveToPaginate()): ?>
              <?php include_partial('sony_category_assets/pagination', array('pager' => $pager, 'category' => $category)) ?>
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
            <?php include_partial('sony_category_assets/list_td_batch_actions', array('asset' => $asset, 'helper' => $helper, 'category' => $category)) ?>
            <?php include_partial('sony_category_assets/ajax_list_td_tabular', array('asset' => $asset, 'category' => $category)) ?>
            <?php include_partial('sony_category_assets/ajax_list_td_actions', array('asset' => $asset, 'helper' => $helper, 'category' => $category)) ?>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endif; ?>
</div>
<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>
