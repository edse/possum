<?php use_helper('I18N', 'Date') ?>

  <div id="sf_admin_content">
    <form action="<?php echo url_for('asset_related_assets_collection', array('action' => 'batch')) ?>" method="post">
    <?php include_partial('related_assets/ajax_list', array('pager' => $pager, 'sort' => $sort, 'helper' => $helper, 'parentAsset' => $parentAsset, 'relatedAssetTypes' => $relatedAssetTypes)) ?>
    <!--
    <ul class="sf_admin_actions">
      <?php //include_partial('related_assets/list_batch_actions', array('helper' => $helper, 'parentAsset' => $parentAsset )) ?>
      <?php //include_partial('related_assets/list_actions', array('helper' => $helper)) ?>
    </ul>
    -->
    </form>
  </div>

</div>