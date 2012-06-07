<?php use_helper('I18N', 'Date') ?>
<div class="page-header">
  <h1><?php echo __('Schedule List', array(), 'messages') ?></h1>
</div>

<?php include_partial('schedule/flashes') ?>

<div class="row-fluid">

  <?php include_partial('schedule/assets') ?>

  <div class="span9">
    
    <div id="sf_admin_container">
    
      <div id="sf_admin_header">
        <?php include_partial('schedule/list_header', array('pager' => $pager)) ?>
      </div>
    
      <div id="sf_admin_content">
        <form action="<?php echo url_for('schedule_collection', array('action' => 'batch')) ?>" method="post">
        <?php include_partial('schedule/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'date' => $date)) ?>
        <ul class="sf_admin_actions">
          <?php //include_partial('schedule/list_batch_actions', array('helper' => $helper)) ?>
          <?php include_partial('schedule/list_actions', array('helper' => $helper)) ?>
        </ul>
        </form>
      </div>
    
      <div id="sf_admin_footer">
        <?php include_partial('schedule/list_footer', array('pager' => $pager)) ?>
      </div>
    </div>

  </div>
  
  
  <div class="span3">
    <form method="post" action="<?php echo url_for('@homepage') ?>schedule" id="channelForm">
      <table cellspacing="0">
        <tbody>
          <tr class="sf_admin_form_row sf_admin_foreignkey sf_admin_filter_field_channel_id">
            <td>
              <label for="schedule_filters_channel_id"><?php echo __('Channel', array(), 'messages') ?></label>
            </td>
            <td>
              <select id="schedule_filters_channel_id" name="schedule_filters[channel_id]" onchange="self.location.href='?channel_id='+$('#schedule_filters_channel_id').val();">
                <option value=""></option>
                <?php foreach($channels as $c): ?>
                  <?php if($c->id > 0): ?>
                  <option value="<?php echo $c->id ?>"<?php if($channel->id == $c->id) echo " selected=\"selected\""; ?>><?php echo $c->getTitle() ?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>
          </td>
        </tr>
      </tbody>
      </table>
    </form>
    <div class="demo"><div id="datepicker"></div></div>

    
    <hr />

    <h3><?php echo __('Clone this schedule', array(), 'messages') ?></h3>
    <form method="post" action="<?php echo url_for("homepage") ?>schedule/clone">
      <input type="hidden" name="channel_id" value="<?php echo $channel->id ?>" />
      <input type="hidden" name="date" value="<?php echo $date ?>" />
      <table cellspacing="0">
        <tbody>
          <tr class="sf_admin_form_row sf_admin_foreignkey sf_admin_filter_field_channel_id">
            <td>
              <label for="schedule_filters_channel_id"><?php echo __('Target day', array(), 'messages') ?></label>
            </td>
            <td>
              <input type="text" name="clone_day" id="clone_day" />
            </td>
            <td>
              <input type="submit" value="<?php echo __('clone', array(), 'sf_admin') ?>" />
            </td>
          </tr>
        </tbody>
      </table>
    </form>

  </div>

</div>

<script>
$(function() {
 
  $.timeEntry.setDefaults({
    show24Hours: true,
    spinnerImage: 'img/spinnerDefault.png',
    timeSteps: [1,1,0]
  });

  $('#clone_day').datepicker({
    //minDate: new Date(),
    changeMonth: true,
    changeYear: true,
    showOtherMonths: true,
    dateFormat: 'yy/mm/dd',
    altFormat: 'yy-mm-dd',
    defaultDate: new Date("<?php echo $date; ?>")
  });

  $('#datepicker').datepicker({
    //minDate: new Date(),
    changeMonth: true,
    changeYear: true,
    showOtherMonths: true,
    dateFormat: 'yy/mm/dd',
    altFormat: 'yy-mm-dd',
    defaultDate: new Date("<?php echo $date; ?>"),
    onSelect: function(date, inst){
      self.location.href = '<?php echo url_for('homepage'); ?>schedule?channel_id='+$('#schedule_filters_channel_id').val()+'&date='+date;
    }
  });

});
</script>