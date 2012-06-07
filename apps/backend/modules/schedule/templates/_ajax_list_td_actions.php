<td colspan="2">
  <ul class="sf_admin_td_actions">
    <?php echo $helper->linkToEdit($schedule, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <!-- <li class="sf_admin_action_edit"><a href="<?php echo url_for('homepage')?>schedule/<?php echo $schedule->id ?>/edit?channel_id=<?php echo $channel->id?>&date=<?php echo $date?>">New</a></li> -->
    <script>
    $(function() {
      $(".sf_admin_action_edit a").fancybox({
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

    <?php //echo $helper->linkToDelete($schedule, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <li class="sf_admin_action_delete"><a href="javascript:;" onclick="deleteSchedule('<?php echo $schedule->id ?>', '<?php echo $channel->id ?>', '<?php echo $date ?>');">Remover</a></li>
  <ul>
</td>
