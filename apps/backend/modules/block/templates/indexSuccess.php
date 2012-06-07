<?php use_helper('I18N', 'Date') ?>

<div class="page-header">
  <h1><?php echo __('Block List', array(), 'messages') ?> - <?php echo $section->getTitle()?></h1>
</div>

<ul class="breadcrumb">
  <li>
    <a href="<?php echo url_for('homepage')?>site">Sites</a> <span class="divider">/</span>
  </li>
  <li>
    <a href="<?php echo url_for('homepage')?>site/<?php echo $section->Site->getId() ?>/ListSections"><?php echo $section->Site->getTitle()?></a> <span class="divider">/</span>
  </li>
  <li>
    <a href="<?php echo url_for('homepage')?>section/<?php echo $section->getId() ?>/ListAssets"><?php echo $section->getTitle()?></a> <span class="divider">/</span>
  </li>
  <li class="active"><?php echo __('Block List', array(), 'messages') ?></li>
</ul>

<div class="row-fluid">

  <?php include_partial('block/assets') ?>
  <?php include_partial('block/flashes') ?>

  <div class="span11">
    
    <div id="sf_admin_container">
    
      <div id="sf_admin_header">
        <?php include_partial('block/list_header', array('pager' => $pager)) ?>
      </div>
    
      <div id="sf_admin_content">
        <form action="<?php echo url_for('block_collection', array('action' => 'batch')) ?>" method="post">
        <?php include_partial('block/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'section' => $section)) ?>
        </form>
      </div>
    
      <div id="sf_admin_footer">
        <?php include_partial('block/list_footer', array('pager' => $pager)) ?>
      </div>
    </div>

  </div>
  
</div>
