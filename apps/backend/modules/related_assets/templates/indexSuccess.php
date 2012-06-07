<?php use_helper('I18N', 'Date') ?>
<?php include_partial('related_assets/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('', array(), 'messages') ?></h1>

  <?php include_partial('related_assets/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('related_assets/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('related_assets/filters', array('form' => $filters, 'configuration' => $configuration, 'parentAsset' => $parentAsset)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('asset_related_assets_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('related_assets/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'parentAsset' => $parentAsset)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('related_assets/list_batch_actions', array('helper' => $helper, 'parentAsset' => $parentAsset )) ?>
      <?php include_partial('related_assets/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('related_assets/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
