<?php use_helper('I18N', 'Date') ?>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('sony_category_assets_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('sony_category_assets/ajax_list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'category' => $category)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('sony_category_assets/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('sony_category_assets/list_actions', array('helper' => $helper, 'category' => $category)) ?>
    </ul>
    </form>
  </div>

</div>
