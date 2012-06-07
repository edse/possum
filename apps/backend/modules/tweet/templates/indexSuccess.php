<?php use_helper('I18N', 'Date') ?>

<div id="alerts"></div>
<div id="header">
    <h1><?php echo __('Todo List', array(), 'messages') ?></h1>
</div>
<div id="content">
    <div id="dashboard-main">

<?php include_partial('tweet/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('Tweet List', array(), 'messages') ?></h1>

  <?php include_partial('tweet/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('tweet/list_header', array('pager' => $pager)) ?>
  </div>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('tweet_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('tweet/list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper)) ?>
    <ul class="sf_admin_actions">
      <?php include_partial('tweet/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('tweet/list_actions', array('helper' => $helper)) ?>
    </ul>
    </form>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('tweet/list_footer', array('pager' => $pager)) ?>
  </div>
</div>

</div>
<div id="dashboard-side">
  <div id="dashboard-blog" class="module">
    <h3>Filtros</h3>
    <div class="module-info">
      <div id="sf_admin_bar">
        <?php include_partial('tweet/filters', array('form' => $filters, 'configuration' => $configuration)) ?>
      </div>
    </div>
  </div>
</div>