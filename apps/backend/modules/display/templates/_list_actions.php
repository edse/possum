<?php //echo $helper->linkToNew(array('params' => array('block_id' => $filters["block_id"]->getValue()), 'class_suffix' => 'new', 'label' => 'New', 'block_id' => $filters["block_id"]->getValue())) ?>

<li class="sf_admin_action_new"><?php echo link_to('New', 'asset_display_assets', array('block_id' => $block->getId(), 'sort' => 'id', 'sort_type' => 'desc')); ?></li>

<li class="sf_admin_action_new2"><?php echo link_to('New Generic', 'display/new?block_id='.$block->getId(), array('block_id' => $block->getId())); ?></li>

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
		'width'               : 950,
		'height'              : 450
    });
  });
</script>