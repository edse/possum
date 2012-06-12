<?php use_helper('I18N', 'Date') ?>
<div class="page-header">
  <h1><?php echo __('Asset List', array(), 'messages') ?><!-- <small>Assets são todas as mídias gerenciadas pelo Astolfo (imagens, áudio, vídeo...)</small> --></h1>
</div>

<?php include_partial('asset/flashes') ?>

<div class="row-fluid">

  <?php //include_partial('asset/assets') ?>

  <div class="span9">
    
    <div id="sf_admin_container">
    
      <div id="sf_admin_header">
        <?php include_partial('asset/list_header', array('pager' => $pager)) ?>
      </div>
    
      <div id="sf_admin_content">
        <form action="<?php echo url_for('asset_collection', array('action' => 'batch')) ?>" method="post">
        <?php /*
        <ul class="sf_admin_actions">
          <?php include_partial('asset/list_batch_actions', array('helper' => $helper)) ?>
          <?php include_partial('asset/list_actions', array('helper' => $helper)) ?>
        </ul>*/ ?>
        <?php include_partial('asset/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>

        <?php /*
        <ul class="sf_admin_actions">
          <?php //include_partial('asset/list_actions', array('helper' => $helper)) ?>
        </ul>
         */ ?>
        </form>
      </div>
    
      <div id="sf_admin_footer">
        <?php include_partial('asset/list_footer', array('pager' => $pager)) ?>
      </div>
    </div>

  </div>
  
  
  <div class="span3">

    <?php /*
    <div class="well sidebar-nav">
      <ul class="nav nav-list">
        <li class="nav-header">Novo Asset</li>
        <?php include_partial('asset/list_actions', array('helper' => $helper)) ?>
      </ul>
    </div>
    */ ?>
    
    <!--<div class="well sidebar-nav">
      <ul class="nav nav-list">
        <li class="nav-header">Filtros</li>-->
        <?php include_partial('asset/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
      <!-- </ul>
    </div> -->
  </div>


</div>