<?php use_helper('I18N', 'Date') ?>

<div class="page-header">
  <h1><?php echo __('Section List', array(), 'messages') ?> - <?php echo $site->getTitle()?></h1>
</div>

<ul class="breadcrumb">
  <li>
    <a href="<?php echo url_for('homepage')?>site">Sites</a> <span class="divider">/</span>
  </li>
  <li>
    <a href="<?php echo url_for('homepage')?>site/<?php echo $site->getId() ?>/ListSections"><?php echo $site->getTitle()?></a> <span class="divider">/</span>
  </li>
  <li class="active"><?php echo __('Section List', array(), 'messages') ?></li>
</ul>

<div class="row-fluid">

  <?php include_partial('section/assets') ?>
  <?php include_partial('section/flashes') ?>

  <div class="span11">
    
    <div id="sf_admin_container">
    
      <div id="sf_admin_header">
        <?php include_partial('section/list_header', array('pager' => $pager)) ?>
      </div>
    
      <div id="sf_admin_content">
        <form action="<?php echo url_for('section_collection', array('action' => 'batch')) ?>" method="post">
        <?php include_partial('section/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'site' => $site)) ?>
        <ul class="sf_admin_actions">
          <?php //include_partial('section/list_batch_actions', array('helper' => $helper)) ?>
          <?php include_partial('section/list_actions', array('helper' => $helper)) ?>
        </ul>
        </form>
      </div>
    
      <div id="sf_admin_footer">
        <?php include_partial('section/list_footer', array('pager' => $pager)) ?>
      </div>
    </div>

  </div>
  

</div>