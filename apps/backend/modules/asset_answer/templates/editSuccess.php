<?php use_helper('I18N', 'Date') ?>
<?php include_partial('asset_answer/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Asset answer', array(), 'messages') ?></h1>

  <?php include_partial('asset_answer/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('asset_answer/form_header', array('asset_answer' => $asset_answer, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('asset_answer/form', array('asset_answer' => $asset_answer, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('asset_answer/form_footer', array('asset_answer' => $asset_answer, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
