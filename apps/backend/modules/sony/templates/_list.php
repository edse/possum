<div id="sf_admin_list2" style="width: 100%;">
	<?php include_partial('global/loading') ?>
	<div id="admin_list" style="padding:5px; display: none;"></div>
</div>

<script>
  $(document).ready(function() {
    updateCategories();
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
  });

  function updateCategories(){
    $.fancybox.close();
    $.ajax({
      url: '<?php echo url_for("sony/ajaxupdate")?>',
      dataType: 'html',
      success: function(data){
		    $("#admin_list").html(data);
		    $("#admin_loading").fadeOut();
		    $("#admin_list").fadeIn(250);
        $.fancybox.close();
        setSortable();
      }
    });
  }
  function deleteCategory(id){
    if(confirm('Are you sure?')){
      $.ajax({
        url: '<?php echo url_for("sony/ajaxdelete")?>',
        data: "id="+id,
        dataType: 'html',
        success: function(){
          updateSection();
        }
      });
    }
  }
  // When the document is ready set up our sortable with it's inherant function(s)
  function setSortable() {
    $("#sort-list").sortable({
      handle : '.ui-button',
      update : function () {
        var order = $('#sort-list').sortable('serialize');
        $.ajax({
          url: '<?php echo url_for("sony/ajaxorder")?>',
          data: 'id=1&'+order,
          dataType: 'html'
        });
      }
    });
  }
</script>
<script type="text/javascript">
/* <![CDATA[ */
function checkAll()
{
  var boxes = document.getElementsByTagName('input'); for(var index = 0; index < boxes.length; index++) { box = boxes[index]; if (box.type == 'checkbox' && box.className == 'sf_admin_batch_checkbox') box.checked = document.getElementById('sf_admin_list_batch_checkbox').checked } return true;
}
/* ]]> */
</script>
<style>
  .sf_admin_form_field_asset .content table {
    width: 100%;
  }
  #sort-list  {
    padding-left: 0px;
  }

  #sort-list li {
    height: 135px;
  }
</style>