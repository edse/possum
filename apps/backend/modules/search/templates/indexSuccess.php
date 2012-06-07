<?php use_helper('I18N', 'Date') ?>
<div class="page-header">
  <h1><?php echo __('Search for assets', array(), 'messages') ?></h1>
</div>

<div id="header">
  <?php /*
  <form action="<?php echo url_for('homepage')?>search/do" method="post" id="form">
      <span class="search">
    <span id="basic-search-controls">
    <a onclick="$('#advanced-options').toggle(); return false;" href="#" id="advanced-link">advanced</a>
    &nbsp;&nbsp;
      <input type="text" onfocus="if (this.value=='<?php echo __('Search term or asset property', array(), 'messages') ?>') this.value=''; this.style.color = '';" style="color: rgb(153, 153, 153);" value="<?php if($sf_request->getParameter('search_query')) echo $sf_request->getParameter('search_query'); else echo __('Search term or asset property', array(), 'messages') ?>" class="txt" id="video-search-query" name="search_query" size="30">

    <button aria-pressed="false" role="button" class=" yt-uix-button yt-uix-button-primary" onclick="$('#form').submit();" id="video-search-button" type="button"><span class="yt-uix-button-content">Search</span></button>
    </span>
  </span>
  <div class="clear"></div>
  </form>
  */ ?>
</div>
        
        
        




<?php /*
<div class="video-search-controls">
      <div style="margin-bottom: 0.5em; display: none;" id="advanced-options" class="module-advanced">
        <div class="close-link">
          <a onclick="$('#advanced-options').toggle(); return false;" href="#">Close</a><img alt="" src="/images/close.png" onclick="$('#advanced-options').toggle();">
        </div>

        <div class="advanced-col">
          <p><strong>Asset Type</strong></p>
          <select id="search_filters_asset_type_id" name="search_filters[asset_type_id]">
            <option value="">Any</option>
            <?php foreach($asset_types as $at): ?>
            <option value="<?php echo $at->getId() ?>"<?php if($asset_type->getId() == $at->getId()) echo " selected=\"selected\""; ?>><?php echo $at->getTitle() ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="advanced-col">
          <p><strong>Created date between dates</strong></p>
          <input type="text" value="" id="search_filters_date_min" name="search_filters[date_min]" maxlength="10" size="10"> and<br>
          <input type="text" value="" id="search_filters_date_max" name="search_filters[date_max]" maxlength="10" size="10"><br>
        </div>

        <div class="advanced-col">
          <p><strong>Category</strong></p>
          <select id="search_filters_category_id" name="search_filters[category_id]">
            <option value="">Any</option>
            <?php foreach($categories as $c): ?>
            <option value="<?php echo $c->getId() ?>"<?php if($category->getId() == $c->getId()) echo " selected=\"selected\""; ?>><?php echo $c->getTitle() ?></option>
            <?php endforeach; ?>
          </select>

        </div>

        <div class="advanced-col">
          <p><strong>Sort by</strong></p>
          <select id="video-search-controls-sort_by" name="search_sort_by">
            <option value="R">Relevance</option>
            <option value="D">Date</option>
            <!-- <option value="V">Views</option> -->
          </select>
        </div>

      </div>
    </div>
*/ ?>



        

        <div id="content">
            <div id="dashboard-main" style="border: none; width: 100%;">

<?php include_partial('search/assets') ?>

<div id="sf_admin_container">

  <?php if(!$sf_request->getParameter('search_query')): ?>
    <div class="video-search-message"><?php echo __('Search for assets.', array(), 'messages') ?></div>
  <?php else: ?>
    <?php include_partial('search/flashes') ?>
  
    <div id="sf_admin_header">
      <?php include_partial('search/list_header', array('pager' => $pager)) ?>
    </div>
  
    <div id="sf_admin_content">
      <form action="<?php echo url_for('asset_collection', array('action' => 'batch')) ?>" method="post">
      <?php include_partial('search/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
      <ul class="sf_admin_actions">
        <?php // include_partial('search/list_batch_actions', array('helper' => $helper)) ?>
        <?php // include_partial('search/list_actions', array('helper' => $helper)) ?>
      </ul>
      </form>
    </div>
  
    <div id="sf_admin_footer">
      <?php include_partial('search/list_footer', array('pager' => $pager)) ?>
    </div>
  <?php endif; ?>

</div>

            </div>
