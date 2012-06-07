<?php use_helper('I18N', 'Date') ?>
<?php include_partial('display_assets/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('', array(), 'messages') ?></h1>

  <?php include_partial('display_assets/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('display_assets/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('display_assets/filters', array('form' => $filters, 'configuration' => $configuration, 'block' => $block)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('asset_display_assets_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('display_assets/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'block' => $block)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('display_assets/list_batch_actions', array('helper' => $helper, 'block' => $block)) ?>
      <?php include_partial('display_assets/list_actions', array('helper' => $helper, 'block' => $block)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('display_assets/list_footer', array('pager' => $pager, 'block' => $block)) ?>
  </div>
</div>
