<td>
  <ul class="sf_admin_td_actions">
  	<?php if($video_dropbox->getStatus()=="Success"): ?>
	  <li class="sf_admin_action_check">
      <a href="http://www.youtube.com/watch?v=<?php echo $video_dropbox->AssetVideo->getYoutubeId() ?>" target="_blank">View</a>
    </li>
    <?php endif;?>
  	<?php if($video_dropbox->getStatus()=="Pendding"): ?>
    <li class="sf_admin_action_process">
      <?php echo link_to(__('Process', array(), 'messages'), 'video_dropbox/ListProcess?id='.$video_dropbox->getId(), array()) ?>
    </li>
    <?php endif;?>
  	<?php if($video_dropbox->getStatus()=="Waiting Youtube"): ?>
    <li class="sf_admin_action_check">
      <?php echo link_to(__('Check', array(), 'messages'), 'video_dropbox/ListCheck?id='.$video_dropbox->getId(), array()) ?>
    </li>
    <?php //if(substr($video_dropbox->getUpdatedAt(),0,10) < date('Y-m-d')):?>
    <?php if($video_dropbox->getStatus()!="Success" && $video_dropbox->getStatus()!="Pendding" && $video_dropbox->getStatus()!="Failure"): ?>
      <li class="sf_admin_action_check">
        <?php echo link_to(__('Reprocessar', array(), 'messages'), 'video_dropbox/ListReprocess?id='.$video_dropbox->getId(), array()) ?>
      </li>
    <?php endif;?>
    <?php endif;?>
  </ul>
</td>
