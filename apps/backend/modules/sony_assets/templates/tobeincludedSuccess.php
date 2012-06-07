<?php use_helper('I18N', 'Date') ?>
<?php include_partial('sony_assets/assets') ?>

<div id="sf_admin_container">
<div id="header">
	<h1 style="float: left;"><?php echo __('Sony Trebuchet Category List', array(), 'messages') ?></h1>
	<span style="float: right;"><input type="button" value="<?php echo __('Generate XML', array(), 'messages') ?>" onclick="self.location.href='<?php echo url_for('homepage')?>sony/generateXML';" /></span>
	<span style="float: right; margin-right: 10px;"><input type="button" value="<?php echo __('Category List', array(), 'messages') ?>" onclick="self.location.href='<?php echo url_for('homepage')?>sony';" /></span>
</div>

  <?php include_partial('sony_assets/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('sony_assets/list_header', array('pager' => $pager)) ?>
  </div>

  <?php /*
  <div id="sf_admin_bar">
    <?php include_partial('sony_assets/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>
  */ ?>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('sony_asset_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('sony_assets/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('sony_assets/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('sony_assets/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('sony_assets/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
