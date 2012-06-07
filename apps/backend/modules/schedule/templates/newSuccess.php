<?php use_helper('I18N', 'Date') ?>
<?php include_partial('schedule/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Schedule', array(), 'messages') ?></h1>

  <?php include_partial('schedule/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('schedule/form_header', array('schedule' => $schedule, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('schedule/form', array('schedule' => $schedule, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('schedule/form_footer', array('schedule' => $schedule, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>


<script>
  $("#schedule_channel_id").change(function () {
    var str = "";
    $("#schedule_channel_id option:selected").each(function () {
      str = $(this).val();
    });
    if((str != "")&&(str != "<?php echo $_REQUEST["channel_id"] ?>")){
      self.location.href="<?php echo url_for("homepage") ?>schedule/new?channel_id="+str+"&date=<?php echo $_REQUEST["date"] ?>";
    }
  }).change();
</script>