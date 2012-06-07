<?php use_helper('I18N', 'Date') ?>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('asset_section_assets_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('section_assets/ajax_list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'section' => $section)) ?>
    <ul class="sf_admin_actions">
      <?php // include_partial('section_assets/list_batch_actions', array('helper' => $helper)) ?>
      <?php include_partial('section_assets/list_actions', array('helper' => $helper, 'section' => $section)) ?>
    </ul>
    </form>
  </div>

</div>
