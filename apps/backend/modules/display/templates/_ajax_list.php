<div class="sf_admin_list">
  <?php if (!$pager->getNbResults()): ?>
    <p><?php echo __('No result', array(), 'sf_admin') ?></p>
  <?php else: ?>
    <table cellspacing="0">
      <thead>
        <tr>
          <th class="sf_admin_text sf_admin_list_th_id"> </th>
          <th id="sf_admin_list_batch_actions"><input id="sf_admin_list_batch_checkbox" type="checkbox" onclick="checkAll();" /></th>
          <?php include_partial('display/list_th_tabular', array('sort' => $sort)) ?>
          <th id="sf_admin_list_th_actions"><?php echo __('Actions', array(), 'sf_admin') ?></th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th colspan="9">
            <?php if ($pager->haveToPaginate()): ?>
              <?php include_partial('display/pagination', array('pager' => $pager)) ?>
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
        <?php foreach ($pager->getResults() as $i => $display): $odd = fmod(++$i, 2) ? 'odd' : 'even' ?>
          <tr id="listItem_<?php echo $display->id ?>" class="sf_admin_row <?php echo $odd ?>">
            <?php include_partial('display/list_td_batch_actions', array('display' => $display, 'helper' => $helper)) ?>
            <?php include_partial('display/ajax_list_td_tabular', array('display' => $display)) ?>
            <?php include_partial('display/ajax_list_td_actions', array('display' => $display, 'helper' => $helper)) ?>
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