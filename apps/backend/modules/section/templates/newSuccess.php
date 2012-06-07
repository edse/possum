<?php use_helper('I18N', 'Date') ?>
<?php include_partial('section/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New Section', array(), 'messages') ?></h1>

  <?php include_partial('section/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('section/form_header', array('section' => $section, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('section/form', array('section' => $section, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('section/form_footer', array('section' => $section, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
