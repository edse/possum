<div id="sf_admin_list2" style="width: 100%;">
  <?php include_partial('global/loading') ?>
  <div id="admin_list" style="padding:5px; display: none;"></div>
</div>

<script type="text/javascript">
/* <![CDATA[ */
$(document).ready(function() {
  updateSchedule($('#schedule_filters_channel_id').val(), '<?php echo $date ?>');
  /*
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
    'width'               : 750,
    'height'              : 450
  });
  */
});

function updateSchedule(channel_id, date){
  $.fancybox.close();
  $.ajax({
    url: '<?php echo url_for("schedule/ajaxupdate")?>',
    data: "channel_id="+channel_id+"&date="+date,
    dataType: 'html',
    success: function(data){
      $("#admin_list").html(data);
      $("#admin_loading").fadeOut();
      $("#admin_list").fadeIn(250);
      /*
      setTimeout(function(){
        $("#admin_loading").fadeOut(1000, function(){
          setTimeout(function(){
            $("#admin_list").fadeIn(250);
          }, 50);
        });
      }, 700);
      */
      $.fancybox.close();
      //setSortable(id);
    }
  });
}

function updateSchedule2(channel_id, date){
  $.fancybox.close();
  $.ajax({
    url: '<?php echo url_for("schedule/ajaxupdate2")?>',
    data: "channel_id="+channel_id+"&date="+date,
    dataType: 'html',
    success: function(data){
      $("#admin_list").html(data);
      $("#admin_loading").fadeOut();
      $("#admin_list").fadeIn(250);
      /*
      setTimeout(function(){
        $("#admin_loading").fadeOut(1000, function(){
          setTimeout(function(){
            $("#admin_list").fadeIn(250);
          }, 50);
        });
      }, 700);
      */
      $.fancybox.close();
      $(".sf_admin_actions").html('<li class="sf_admin_batch_actions_choice"><input type="submit" value="save" /><input type="button" value="cancel" onclick="updateSchedule(\''+channel_id+'\', \''+date+'\')" /></li>');
    }
  });
}

function deleteSchedule(id, channel_id, date){
  if(confirm('Are you sure?')){
    $.ajax({
      url: '<?php echo url_for("schedule/ajaxdelete")?>',
      data: "schedule_id="+id,
      dataType: 'html',
      success: function(){
        updateSchedule(channel_id, date);
      }
    });
  }
}

function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>