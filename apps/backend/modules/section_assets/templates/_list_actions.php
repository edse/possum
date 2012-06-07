<?php //echo $helper->linkToNew(array(  'params' =>   array(  ),  'class_suffix' => 'new',  'label' => 'New',)) ?>

<?php //echo link_to('New', 'section_assets/new', array('iframe' => 1, 'section_id' => $section->getId())); ?>

<li class="sf_admin_action_new"><a href="<?php echo url_for('homepage')?>section_assets_add?iframe=1&section_id=<?php echo $section->getId() ?>">Add</a></li>

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
