<?php use_helper('I18N', 'Date') ?>

<div class="page-header">
  <h1><?php echo __('Assettype List', array(), 'messages') ?></h1>
</div>

<div class="row-fluid">

  <?php include_partial('assettype/assets') ?>
  <?php include_partial('assettype/flashes') ?>

  <div class="span9">
    
    <div id="sf_admin_container">
    
      <div id="sf_admin_header">
        <?php include_partial('assettype/list_header', array('pager' => $pager)) ?>
      </div>
    
      <div id="sf_admin_content">
        <form action="<?php echo url_for('asset_type_collection', array('action' => 'batch')) ?>" method="post">
        <?php include_partial('assettype/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
        <ul class="sf_admin_actions">
          <?php include_partial('assettype/list_batch_actions', array('helper' => $helper)) ?>
          <?php include_partial('assettype/list_actions', array('helper' => $helper)) ?>
        </ul>
        </form>
      </div>
    
      <div id="sf_admin_footer">
        <?php include_partial('assettype/list_footer', array('pager' => $pager)) ?>
      </div>
    </div>

  </div>
  
  
  <div class="span3">
    <?php include_partial('assettype/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

</div>
