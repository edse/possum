<?php use_helper('I18N', 'Date') ?>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('schedule_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('schedule/ajax_list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'channel' => $channel, 'date' => $date, 'editAll' => $editAll, 'programs' => $programs)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('schedule/ajax_list_batch_actions', array('helper' => $helper, 'channel' => $channel, 'date' => $date)) ?>
      <?php include_partial('schedule/ajax_list_actions', array('helper' => $helper, 'channel' => $channel, 'date' => $date)) ?>
    </ul>
    </form>
  </div>

</div>
