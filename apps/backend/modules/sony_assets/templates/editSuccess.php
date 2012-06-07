<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sony_assets/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Sony assets', array(), 'messages') ?></h1>

  <?php include_partial('sony_assets/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('sony_assets/form_header', array('sony_asset' => $sony_asset, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('sony_assets/form', array('sony_asset' => $sony_asset, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('sony_assets/form_footer', array('sony_asset' => $sony_asset, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

<script>
$(document).ready(function(){
  $('#sony_asset_title_counter').val($('#sony_asset_title').val().length);
  $('#sony_asset_title').keydown(function() { 
    $('#sony_asset_title_counter').val($(this).val().length);
  });

  $('#sony_asset_description_counter').val($('#sony_asset_description').val().length);
  $('#sony_asset_description').keydown(function() { 
    $('#sony_asset_description_counter').val($(this).val().length);
  });

});
</script>
