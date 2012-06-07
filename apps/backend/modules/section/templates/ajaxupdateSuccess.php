<?php use_helper('I18N', 'Date') ?>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('section_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('section/ajax_list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'site' => $site)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('section/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('section/list_actions', array('helper' => $helper, 'site' => $site)) ?>
    </ul>
    </form>
  </div>

</div>
