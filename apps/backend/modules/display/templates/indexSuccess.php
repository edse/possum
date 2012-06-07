<?php use_helper('I18N', 'Date') ?>

<div class="page-header">
  <h1><?php echo __('Display List', array(), 'messages') ?> - <?php echo $block->Section->getTitle()?> - <?php echo $block->getTitle()?></h1>
</div>

<ul class="breadcrumb">
  <li>
    <a href="<?php echo url_for('homepage')?>site">Sites</a> <span class="divider">/</span>
  </li>
  <li>
    <a href="<?php echo url_for('homepage')?>site/<?php echo $block->Section->Site->getId() ?>/ListSections"><?php echo $block->Section->Site->getTitle()?></a> <span class="divider">/</span>
  </li>
  <li>
    <a href="<?php echo url_for('homepage')?>section/<?php echo $block->Section->getId() ?>/ListBlocks"><?php echo $block->Section->getTitle()?></a> <span class="divider">/</span>
  </li>
  <li>
    <a href="<?php echo url_for('homepage')?>block/<?php echo $block->getId() ?>/ListDisplays"><?php echo $block->getTitle()?></a> <span class="divider">/</span>
  </li>
  <li class="active"><?php echo __('Display List', array(), 'messages') ?></li>
</ul>

<div class="row-fluid">

  <?php include_partial('display/assets') ?>
  <?php include_partial('display/flashes') ?>

  <div class="span11">
    
    <div id="sf_admin_container">
    
      <div id="sf_admin_header">
        <?php include_partial('display/list_header', array('pager' => $pager)) ?>
      </div>
    
      <div id="sf_admin_content">
        <form action="<?php echo url_for('display_collection', array('action' => 'batch')) ?>" method="post">
        <?php include_partial('display/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'block' => $block)) ?>
        </form>
      </div>
    
      <div id="sf_admin_footer">
        <?php include_partial('display/list_footer', array('pager' => $pager)) ?>
      </div>
    </div>

  </div>
  
</div>