<?php use_helper('I18N', 'Date') ?>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('display_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('display/ajax_list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'block' => $block)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('display/list_batch_actions', array('helper' => $helper, 'block_id' => $block->id)) ?>
      <?php include_partial('display/list_actions', array('helper' => $helper, 'block' => $block)) ?>
    </ul>
    </form>
  </div>

</div>
