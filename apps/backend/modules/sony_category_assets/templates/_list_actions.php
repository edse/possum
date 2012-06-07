<!-- <li class="sf_admin_action_new"><a href="<?php echo url_for('homepage')?>sony_assets?iframe=1&category_id=<?php echo $category->getId() ?>">Add</a></li> -->
<li class="sf_admin_action_new"><a href="<?php echo url_for('homepage')?>sony_category_assets_add?iframe=1&category_id=<?php echo $category->getId() ?>">Add</a></li>

<script>
  $(document).ready(function() {
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
</script>
