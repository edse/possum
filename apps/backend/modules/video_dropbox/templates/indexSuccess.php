<?php use_helper('I18N', 'Date') ?>

<div class="page-header">
  <h1><?php echo __('Dropbox List', array(), 'messages') ?></h1>
</div>

<?php include_partial('video_dropbox/assets') ?>
<?php include_partial('video_dropbox/flashes') ?>

<div class="row-fluid">

  <div class="span9">
    
    <div id="sf_admin_container">
    
      <div id="sf_admin_header">
        <?php include_partial('video_dropbox/list_header', array('pager' => $pager)) ?>
      </div>
    
      <div id="sf_admin_content">
        <form action="<?php echo url_for('video_dropbox_collection', array('action' => 'batch')) ?>" method="post">
        <?php include_partial('video_dropbox/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
        <ul class="sf_admin_actions">
          <?php include_partial('video_dropbox/list_batch_actions', array('helper' => $helper)) ?>
          <?php include_partial('video_dropbox/list_actions', array('helper' => $helper)) ?>
        </ul>
        </form>
      </div>
    
      <div id="sf_admin_footer">
        <?php include_partial('video_dropbox/list_footer', array('pager' => $pager)) ?>
      </div>
    </div>

  </div>
  
  
  <div class="span3">
    <?php include_partial('video_dropbox/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
  </div>

</div>