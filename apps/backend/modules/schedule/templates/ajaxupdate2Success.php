<?php use_helper('I18N', 'Date') ?>
  <div id="sf_admin_content">
    <form action="<?php echo url_for('homepage') ?>schedule/editall" method="post">
      <input type="hidden" name="channel_id" id="channel_id" value="<?php echo $channel->id ?>" />
      <input type="hidden" name="date" id="date" value="<?php echo $date ?>" />
    <?php include_partial('schedule/ajax_list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'channel' => $channel, 'date' => $date, 'editAll' => $editAll, 'programs' => $programs)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('schedule/ajax_list_batch_actions', array('helper' => $helper, 'channel' => $channel, 'date' => $date)) ?>
      <?php include_partial('schedule/ajax_list_actions', array('helper' => $helper, 'channel' => $channel, 'date' => $date)) ?>
    </ul>
    </form>
  </div>

</div>

<script type="text/javascript">
/* <![CDATA[ */
$(function() {
  $('.hour_start').timeEntry({
    showSeconds: false,
    show24Hours: true,
    spinnerImage: '',  
    timeSteps: [1,1,1]
  });
  $('.hour_end').timeEntry({
    showSeconds: false,
    show24Hours: true,
    spinnerImage: '',  
    timeSteps: [1,1,1]
  });
});
/* ]]> */
</script>