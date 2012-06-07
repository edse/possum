<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sony/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Sony', array(), 'messages') ?></h1>

  <?php include_partial('sony/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('sony/form_header', array('SonyCategory' => $SonyCategory, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('sony/form', array('SonyCategory' => $SonyCategory, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('sony/form_footer', array('SonyCategory' => $SonyCategory, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

<script>
$(document).ready(function(){
  $('#sony_category_description_counter').val($('#sony_category_description').val().length);
  $('#sony_category_description').keydown(function() { 
    $('#sony_category_description_counter').val($(this).val().length);
  });

  $('#sony_category_title_counter').val($('#sony_category_title').val().length);
  $('#sony_category_title').keydown(function() { 
    $('#sony_category_title_counter').val($(this).val().length);
  });

});
</script>
