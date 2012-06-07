<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sony_category_assets_add/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('', array(), 'messages') ?></h1>

  <?php include_partial('sony_category_assets_add/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('sony_category_assets_add/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_bar">
    <?php include_partial('sony_category_assets_add/filters', array('form' => $filters, 'configuration' => $configuration, 'category' => $category)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('sony_asset_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('sony_category_assets_add/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'category' => $category)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('sony_category_assets_add/list_batch_actions', array('helper' => $helper, 'category' => $category)) ?>
      <?php include_partial('sony_category_assets_add/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('sony_category_assets_add/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
