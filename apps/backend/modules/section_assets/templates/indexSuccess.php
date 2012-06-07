<?php use_helper('I18N', 'Date') ?>

<div class="page-header">
  <h1><?php echo __('Asset List', array(), 'messages') ?> - <?php echo $section->getTitle()?></h1>
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
  <li class="active"><?php echo __('Asset List', array(), 'messages') ?></li>
</ul>

<div class="row-fluid">

  <?php include_partial('section_assets/assets') ?>
  <?php include_partial('section_assets/flashes') ?>

  <div class="span11">
    
    <div id="sf_admin_container">
    
      <div id="sf_admin_header">
        <?php include_partial('section_assets/list_header', array('pager' => $pager)) ?>
      </div>
    
      <div id="sf_admin_content">
        <form action="<?php echo url_for('asset_section_assets_collection', array('action' => 'batch')) ?>" method="post">
        <?php include_partial('section_assets/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'section' => $section)) ?>
        </form>
      </div>
    
      <div id="sf_admin_footer">
        <?php include_partial('section_assets/list_footer', array('pager' => $pager)) ?>
      </div>
    </div>

  </div>
  
</div>