<?php use_helper('I18N', 'Date') ?>

<div class="page-header">
  <h1><?php echo __('Sony Trebuchet Category List', array(), 'messages') ?></h1>
</div>

  <span style="float: right; margin-right: 10px;"><input type="button" value="<?php echo __('Push XML to Sony Trebuchet', array(), 'messages') ?>" onclick="self.open('<?php echo $push_url?>');" /></span>
  <span style="float: right; margin-right: 10px;"><input type="button" value="<?php echo __('Generate XML', array(), 'messages') ?>" onclick="self.location.href='<?php echo url_for('homepage')?>sony/generateXML';" /></span>
  <span style="float: right; margin-right: 10px;"><input type="button" value="<?php echo __('Assets to be included', array(), 'messages') ?>" onclick="self.location.href='<?php echo url_for('homepage')?>sony_assets/tobeincluded';" /></span>

  <?php include_partial('sony/assets') ?>
  <?php include_partial('sony/flashes') ?>

<div class="row-fluid">

  <div class="span11">
    
    <div id="sf_admin_container">
    
      <div id="sf_admin_header">
        <?php include_partial('sony/list_header', array('pager' => $pager)) ?>
      </div>
    
      <div id="sf_admin_content">
        <form action="<?php echo url_for('sony_collection', array('action' => 'batch')) ?>" method="post">
        <?php include_partial('sony/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
        <ul class="sf_admin_actions">
          <?php //include_partial('sony/list_batch_actions', array('helper' => $helper)) ?>
          <?php //include_partial('sony/list_actions', array('helper' => $helper)) ?>
        </ul>
        </form>
      </div>
    
      <div id="sf_admin_footer">
        <?php include_partial('sony/list_footer', array('pager' => $pager)) ?>
      </div>
    </div>

  </div>
  
</div>
