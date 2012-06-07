<?php if(($fieldset == "Asset")&&(!$form->isNew())): ?>
  <?php include_partial('asset/form_actions', array('asset' => $asset, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
<?php endif; ?>

<fieldset id="sf_fieldset_<?php echo preg_replace('/[^a-z0-9_]/', '_', strtolower($fieldset)) ?>">
  <?php if ('NONE' != $fieldset): ?>
    <?php if($fieldset == "Asset"): ?>
      <h2><?php echo __($asset->getAssetType(), array(), 'messages') ?></h2>
    <?php elseif($fieldset == "Availability"): ?>
      <h2><?php echo __($fieldset, array(), 'messages') ?></h2>
    <?php else: ?>
      <h2><?php echo __($fieldset, array(), 'messages') ?></h2>
    <?php endif; ?>
  <?php endif; ?>

  <?php foreach ($fields as $name => $field): ?>
    <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
    <?php include_partial('asset/form_field', array(
      'asset'      => $asset,
      'name'       => $name,
      'attributes' => $field->getConfig('attributes', array()),
      'label'      => $field->getConfig('label'),
      'help'       => $field->getConfig('help'),
      'form'       => $form,
      'field'      => $field,
      'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_form_field_'.$name,
    )) ?>
  <?php endforeach; ?>
  
</fieldset>

<?php if(($fieldset == "Asset")&&(!$form->isNew())): ?>
  <?php include_partial('asset/form_actions', array('asset' => $asset, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
<?php endif; ?>

<?php if(($fieldset == "Asset") && ($asset->getAssetType()->getSlug() == "questionnaire")): ?>
<fieldset id="sf_fieldset_asset_questionnarie">
  <h2><?php echo __("Asset Options", array(), 'messages') ?></h2>
  <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_asset">
    <div>
      <div class="content5">
        <ul style="margin: 15px 0pt 0pt 35px;" class="sf_admin_actions">
          <li class="sf_admin_action_new">
            <a href="<?php echo url_for("asset_question/new") ?>?asset_id=<?php echo $asset->id ?>&asset_questionnaire_id=<?php echo $asset->AssetQuestionnaire->getId() ?>"><?php echo __("Add Question", array(), 'messages') ?></a>
          </li>
        </ul>
        <br />
      </div>
    </div>
  </div>
</fieldset>
<?php endif; ?>

<?php if(($fieldset == "Asset") && ($asset->getAssetType()->getSlug() == "question")): ?>
<fieldset id="sf_fieldset_asset_questionnarie">
  <h2><?php echo __("Asset Options", array(), 'messages') ?></h2>
  <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_asset">
    <div>
      <div class="content5">
        <ul style="margin: 15px 0pt 0pt 35px;" class="sf_admin_actions">
          <li class="sf_admin_action_new">
            <a href="<?php echo url_for("asset_answer/new") ?>?asset_id=<?php echo $asset->id ?>&asset_question_id=<?php echo $asset->AssetQuestion->getId() ?>"><?php echo __("Add Answer", array(), 'messages') ?></a>
          </li>
        </ul>
        <br />
      </div>
    </div>
  </div>
</fieldset>
<?php endif; ?>

<?php if((strtolower($fieldset) == "asset")&&(!$form->isNew())): ?>
  <script>
  function updateRelatedAssets(id){
    $.ajax({
      url: '<?php echo url_for("related_assets/ajaxupdate")?>',
      data: "asset_id="+id,
      dataType: 'html',
      success: function(data){
        $("#sf_fieldset_asset_relationships").html(data);
        $.fancybox.close();
        setSortable(id);
      }
    });
  }
  function deleteRelatedAssets(id, aid){
    if(confirm('Are you sure?')){
      $.ajax({
        url: '<?php echo url_for("related_assets/ajaxdelete")?>',
        data: "asset_id="+aid+"&parent_asset_id="+id,
        dataType: 'html',
        success: function(){
          updateRelatedAssets(id);
        }
      });
    }
  }
  // When the document is ready set up our sortable with it's inherant function(s)
  function setSortable(id) {
    $("#sort-list").sortable({
      handle : '.ui-button',
      update : function () {
        var order = $('#sort-list').sortable('serialize');
        $.ajax({
          url: '<?php echo url_for("related_assets/ajaxorder")?>',
          data: 'asset_id='+id+'&'+order,
          dataType: 'html'
        });
      }
    });
  }

  function editRelatedAssetType(asset_id, id) {
    var e = $("#rp_"+id);
    $.ajax({
      url: '<?php echo url_for("related_assets/ajaxedit")?>',
      data: 'related_asset_id='+id+'&type='+e.val(),
      dataType: 'html',
      success: function(){
        updateRelatedPerson(asset_id);
      }
    });
  }
  </script>

  <style>
  .sf_admin_form_field_asset .content table {
    width: 100%;
  }
  #sf_admin_container .sf_admin_form_field_asset .content {
    padding-left: 0px;
  }
  #sort-list li {
    height: 130px;
  }
  </style>

  <fieldset id="sf_fieldset_asset2">
    <h2>Asset Relationship</h2>               
    <div class="sf_admin_form_row sf_admin_text sf_admin_form_field_asset"><div>
        <!-- <label for="asset_AssetImageGallery">Relationships</label> --> 
        <div class="content">
          <div id="sf_fieldset_asset_relationships"></div>
          <ul class="sf_admin_actions" style="margin: 15px 0 0 35px;">
            <li class="sf_admin_action_new"><?php echo link_to('New', 'related_assets/index?iframe=1&asset_id='.$asset->getId()); ?></li>
          </ul>
          <?php $relatedAssets = Doctrine::getTable('RelatedAsset')->findByParentAssetId($form->getObject()->getId()); ?>
          <br />
          <script>
          $(document).ready(function() {
            updateRelatedAssets(<?php echo $form->getObject()->getId() ?>);
            $(".sf_admin_action_new a").fancybox({
              'hideOnContentClick'  : false,
              'transitionIn'        : 'elastic',
              'transitionOut'       : 'elastic',
              'speedIn'             : 600, 
              'speedOut'            : 200, 
              'overlayShow'         : true,
              'type'                : 'iframe',
              'centerOnScroll'      : true,
              'showCloseButton'     : true,
              'width'               : 900,
              'height'              : 600
            });
          });
          </script>
        </div>
      </div>
    </div>
  </fieldset>

<?php endif; ?>
