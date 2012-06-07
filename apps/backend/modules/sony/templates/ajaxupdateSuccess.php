<?php use_helper('I18N', 'Date') ?>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('sony_category', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('sony/ajax_list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('sony/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('sony/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

</div>
