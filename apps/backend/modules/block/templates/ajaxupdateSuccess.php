<?php use_helper('I18N', 'Date') ?>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('section_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('block/ajax_list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'section' => $section)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('block/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('block/list_actions', array('helper' => $helper, 'section' => $section)) ?>
    </ul>
    </form>
  </div>

</div>
