<?php use_helper('I18N', 'Date') ?>
<?php include_partial('asset/assets') ?>

<?php if($asset->AssetType->getSlug()=="image"):?>
<button class="btn btn-large btn-primary pull-right" type="button" id="crop" href="<?php echo url_for('@homepage') ?>imagecrop/<?php echo $asset->getId() ?>">
  <i class="icon-picture icon-white"></i> <?php echo __('Crop Image', array(), 'messages') ?>
</button>
<script>
$(document).ready(function(){
  $("#crop").click(function(){
    self.location.href= $(this).attr("href");
  });
});
</script>
<?php endif;?>

<div id="sf_admin_container">
  <h1><?php echo __('Edit Asset', array(), 'messages') ?><?php if($asset->AssetType->getSlug()=="content" && $asset->AssetContent->getContent()):?><input type="button" value="Duplicar Asset" name="Duplicar Asset" style="float: right;" onclick="self.location.href='<?php echo url_for("homepage")?>asset/<?php echo $asset->getId()?>/duplicate';" /><?php endif;?></h1>
    
  <?php include_partial('asset/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('asset/form_header', array('asset' => $asset, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('asset/form', array('asset' => $asset, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('asset/form_footer', array('asset' => $asset, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>

<script>
$(document).ready(function(){
  $('#asset_title').keyup(function(){
    $.ajax({
      url: "<?php echo url_for('@homepage') ?>asset/getSlug",
      data: "id=<?php echo $asset->getId()?>&title="+$('#asset_title').val(),
      success: function(data) {
        $('#asset_slug').val(data);
      }
    });
  });

  $('#asset_site_id').change(function(){
    $.ajax({
      url: "<?php echo url_for('@homepage') ?>site/getSections",
      data: "asset_id=<?php echo $asset->getId()?>&site_id="+$('#asset_site_id option:selected').val(),
      success: function(data) {
        var obj = jQuery.parseJSON(data);
        /*
        var opts = new String();
        if(obj.a){
          $.each(obj.a, function(index,item) {
            //$('#asset_sections_list').append('<option value="'+item[0]+'">"'+item[1]+'"</option>');
            opts += '<option value="'+item[0]+'">'+item[1]+'</option>';
          });
        }
        $('#asset_sections_list').html(opts);
        */
        var opts = new String();
        if(obj.u){
          $.each(obj.u, function(index,item) {
            //$('#unassociated_asset_sections_list').append('<option value="'+key+'">'+val+'</option>');
            opts += '<option value="'+item[0]+'">'+item[1]+'</option>';
          });
        }
        $('#unassociated_asset_sections_list').html(opts);
      }
    });
  });
  $('#asset_site_id').trigger('change');

  $('#asset_title_counter').val($('#asset_title').val().length);
  $('#asset_title').keydown(function() { 
    $('#asset_title_counter').val($(this).val().length);
  });

  $('#asset_description_counter').val($('#asset_description').val().length);
  $('#asset_description').keydown(function() { 
    $('#asset_description_counter').val($(this).val().length);
  });

});
</script>
