<?php use_helper('I18N', 'Date') ?>

<?php include_partial('imagecrop/flashes') ?>

<button class="btn btn-large btn-danger pull-right" type="button" id="cancel" href="<?php echo url_for('@homepage') ?>asset/<?php echo $asset->getId() ?>/edit">
  <i class="icon-remove icon-white"></i> <?php echo __('Cancel', array(), 'messages') ?>
</button>
<script>
$(document).ready(function(){
  $("#cancel").click(function(){
    self.location.href= $(this).attr("href");
  });
});
</script>

<div class="page-header">
  <h1><?php echo __('Image Crop Tool', array(), 'messages') ?></h1>
</div>

<p>Move the image or the crop with the pointer, resize the crop with the pointer, use the zoom bar to scale the image or set your values into the inputs.</p>

<div class="row-fluid">

  <?php include_partial('imagecrop/assets') ?>

  <div class="span12">
    <div class="pane clearfix">
      <img src="<?php echo $asset->AssetImage->getJPG()?>" alt="<?php echo $asset->getTitle()?>" />
    </div>
  </div>
  
  <form action="" method="post" id="form" class="well form-inline pane2 pull-left">
    <div class="coords">
      <input type="hidden" name="asset_id" value="<?php echo $asset->getId()?>" />
      <input type="text" class="input-small" name="cx" placeholder="crop x" />
      <input type="text" class="input-small" name="cy" placeholder="crop y" />
      <input type="text" class="input-small" name="cw" placeholder="crop width" />
      <input type="text" class="input-small" name="ch" placeholder="crop height" />
      <input type="text" class="input-small" name="iw" placeholder="image width" />
      <input type="text" class="input-small" name="ih" placeholder="image height" />
      <label class="checkbox">
        <input type="checkbox" checked="checked" /> lock proportion
      </label>
    </div>
  </form>
    
  <button class="btn btn-large btn-primary" type="button" id="crop">
    <i class="icon-picture icon-white"></i> <?php echo __('Create New Image', array(), 'messages') ?>
  </button>
    
      <!--<a class="btn-large btn-primary" href="/backend_dev.php/upload" style="margin-right: 15px;"><i class="icon-picture icon-white"></i> <?php echo __('Create New Image', array(), 'messages') ?></a>-->

</div>








    <script type="text/javascript">
      <!--//--><![CDATA[//><!--
      $(document).ready(function(){

        $("#crop").click(function(){
          var url = "<?php echo url_for('@homepage') ?>imagecrop/do?";
          $(".coords input:text").each(function(){
            url+=$(this).attr('name')+"="+$(this).val()+"&";
          });
          //alert(url);
          $('#form').attr('action',url);
          $('#form').submit();
        });
  
        // Apply jrac on some image.
        $('.pane img').jrac({
          'crop_width': 628,
          'crop_height': 383,
          'crop_x': 100,
          'crop_y': 100,
          'viewport_onload': function() {
            var $viewport = this;
            var inputs = $('.pane2').find('.coords input:text');
            var events = ['jrac_crop_x','jrac_crop_y','jrac_crop_width','jrac_crop_height','jrac_image_width','jrac_image_height'];
            for (var i = 0; i < events.length; i++) {
              var event_name = events[i];
              // Register an event with an element.
              $viewport.observator.register(event_name, inputs.eq(i));
              // Attach a handler to that event for the element.
              inputs.eq(i).bind(event_name, function(event, $viewport, value) {
                $(this).val(value);
              })
              // Attach a handler for the built-in jQuery change event, handler
              // which read user input and apply it to relevent viewport object.
              .change(event_name, function(event) {
                var event_name = event.data;
                $viewport.$image.scale_proportion_locked = $('.pane2').find('.coords input:checkbox').is(':checked');
                $viewport.observator.set_property(event_name,$(this).val());
              });
            }
            $viewport.$container.append('<div>Image size: '
              +$viewport.$image.originalWidth+' x '
              +$viewport.$image.originalHeight+'</div>')
          }
        })
        // React on all viewport events.
        .bind('jrac_events', function(event, $viewport) {
          var inputs = $('.pane2').find('.coords input');
          inputs.css('background-color',($viewport.observator.crop_consistent())?'chartreuse':'salmon');
        });
      });
      //--><!]]>
    </script>