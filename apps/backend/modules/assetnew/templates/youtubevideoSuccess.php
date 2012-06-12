<?php use_helper('I18N', 'Date') ?>

<?php include_partial('assetnew/flashes') ?>

<div class="page-header">
  <h1><?php echo __('New video from Youtube', array(), 'messages') ?></h1>
</div>

<div class="row-fluid">

  <?php include_partial('assetnew/assets') ?>

  <div class="span12">
  
    <form action="" method="post" id="form" class="well pane2">
      <input type="text" class="input-medium" name="url" id="url" placeholder="Youtube video URL" />
      <div>
      <button class="btn btn-primary" type="submit" id="import">
        <i class="icon-picture icon-white"></i> <?php echo __('Import Video', array(), 'messages') ?>
      </button>
      <button class="btn btn-danger" type="button" id="cancel">
        <i class="icon-remove icon-white"></i> <?php echo __('Cancel', array(), 'messages') ?>
      </button>
      </div>

    </form>
  
  </div>

  <script>
    $(document).ready(function(){
      $("#cancel").click(function() {
        self.location.href='<?php echo url_for('homepage')?>';
      });
      $('#form').validate({
        rules: {
          "url": {
            required: true
          }
        },
        highlight: function(label) {
          $("#url").addClass('error');
        }
      });
    });
  </script>
