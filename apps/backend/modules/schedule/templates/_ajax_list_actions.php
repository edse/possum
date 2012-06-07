<?php //echo $helper->linkToNew(array(  'params' =>   array(  ),  'class_suffix' => 'new',  'label' => 'New',)) ?>
<li class="sf_admin_action_new"><a href="<?php echo url_for('homepage')?>schedule/new?channel_id=<?php echo $channel->id?>&date=<?php echo $date?>">New</a></li>
<script>
$(function() {
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
    'height'              : 580
  });
});
</script>

<li class="sf_admin_action_edit2"><a href="javascript:;" onclick="updateSchedule2('<?php echo $channel->id?>', '<?php echo $date?>');">Edit All</a></li>
