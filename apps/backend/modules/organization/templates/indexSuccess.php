<?php use_helper('I18N', 'Date') ?>

<div class="page-header">
  <h1><?php echo __('Organization List', array(), 'messages') ?></h1>
</div>

<div class="row-fluid">

  <?php include_partial('organization/assets') ?>
  <?php include_partial('organization/flashes') ?>

  <div class="span9">
    
    <div id="sf_admin_container">
    
      <div id="sf_admin_header">
        <?php include_partial('organization/list_header', array('pager' => $pager)) ?>
      </div>
    
      <div id="sf_admin_content">
        <form action="<?php echo url_for('organization_collection', array('action' => 'batch')) ?>" method="post">
        <?php include_partial('organization/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
        <ul class="sf_admin_actions">
          <?php include_partial('organization/list_batch_actions', array('helper' => $helper)) ?>
          <?php include_partial('organization/list_actions', array('helper' => $helper)) ?>
        </ul>
        </form>
      </div>
    
      <div id="sf_admin_footer">
        <?php include_partial('organization/list_footer', array('pager' => $pager)) ?>
      </div>
    </div>

  </div>
  
  
  <div class="span3">
    <?php include_partial('organization/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>


</div>