<div class="sf_admin_list">
  <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('No result', array(), 'sf_admin') ?></p>
  <?php else: ?>
    <table cellspacing="0">
      <thead>
        <tr>
          <th class="sf_admin_text sf_admin_list_th_id"> </th>
          <th id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
          <?php include_partial('block/list_th_tabular', array('sort' => $sort)) ?>
          <th id="sf_admin_list_th_actions"><?php echo __('Actions', array(), 'sf_admin') ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="10">
            <?php if ($pager->haveToPaginate()): ?>
              <?php include_partial('block/pagination', array('pager' => $pager)) ?>
            <?php endif; ?>

            <?php echo format_number_choice('[0] no result|[1] 1 result|(1,+Inf] %1% results', array('%1%' => $pager->getNbResults()), $pager->getNbResults(), 'sf_admin') ?>
            <?php if ($pager->haveToPaginate()): ?>
              <?php echo __('(page %%page%%/%%nb_pages%%)', array('%%page%%' => $pager->getPage(), '%%nb_pages%%' => $pager->getLastPage()), 'sf_admin') ?>
            <?php endif; ?>
          </th>
          <th class="sf_admin_text sf_admin_list_th_id"> </th>
        </tr>
      </tfoot>
      <tbody id="sort-list">
        <?php foreach ($pager->getResults() as $i => $block): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
          <tr id="listItem_<?php echo $block->id ?>" class="sf_admin_row <?php echo $odd ?>">
            <?php include_partial('block/list_td_batch_actions', array('block' => $block, 'helper' => $helper)) ?>
            <?php include_partial('block/ajax_list_td_tabular', array('block' => $block)) ?>
            <?php include_partial('block/ajax_list_td_actions', array('block' => $block, 'helper' => $helper)) ?>
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
