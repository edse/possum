<?php use_helper('I18N', 'Date') ?>

        <div id="alerts">
        </div>
        <div id="header">
            <h1>
              <a href="<?php echo url_for('homepage')?>sony"><?php echo __('All Categories', array(), 'messages') ?></a>
              /
              <a href="<?php echo url_for('homepage')?>sony/<?php echo $category->getId() ?>/ListAssets"><?php echo $category->getTitle()?></a>
              /
              <?php echo __('Asset List', array(), 'messages') ?>
            </h1>
        </div>

        <div id="content">

<?php include_partial('sony_category_assets/assets') ?>

<div id="sf_admin_container">
	
  <?php include_partial('sony_category_assets/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('sony_category_assets/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('sony_category_assets_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('sony_category_assets/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'category' => $category)) ?>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('sony_category_assets/list_footer', array('pager' => $pager)) ?>
  </div>
</div>
