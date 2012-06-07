<td>
  <ul class="sf_admin_td_actions">
    <?php //echo $helper->linkToEdit($asset, array(  'params' =>   array(  ),  'class_suffix' => 'edit',  'label' => 'Edit',)) ?>
    <?php //echo $helper->linkToDelete($asset, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
    <?php if($parentAsset->AssetType->slug == "content"): ?>
      <?php if(($asset->AssetType->slug == "video") && ($asset->AssetVideo->youtube_id != "")): ?>
        <li class="sf_admin_action">
          <label><input type="radio" id="size_<?php echo $asset->id ?>" name="size_<?php echo $asset->id ?>" value="310" onchange="updateEmbed_<?php echo $asset->id ?>();" /> 310x206</label> 
          <label><input type="radio" id="size_<?php echo $asset->id ?>" name="size_<?php echo $asset->id ?>" value="640" onchange="updateEmbed_<?php echo $asset->id ?>();" checked="checked" /> 640x390</label>
        </li>          
        <li class="sf_admin_action">
          Start at: <input type="text" id="start_<?php echo $asset->id ?>" style="width:40px;" value="00:00" onblur="updateEmbed_<?php echo $asset->id ?>();" /> (mm:ss)
        </li>          
        <li class="sf_admin_action"><a href="javascript: appendEmbed_<?php echo $asset->id ?>();">Insert Embed</a></li>
        <br />
        <li class="sf_admin_action">
          <textarea id="embed_<?php echo $asset->id ?>"><iframe title="<?php echo $asset->getTitle() ?>" width="640" height="390" src="http://www.youtube.com/embed/<?php echo $asset->AssetVideo->getYoutubeId(); ?>?wmode=transparent&rel=0#t=0m0s" frameborder="0" allowfullscreen></iframe></textarea>
        </li>
      <?php /*
        <li class="sf_admin_action"><a href="javascript: appedToTextarea('<img align=\'\' border=\'\' style=\'\' src=\'/images/video-420.png\' alt=\'<?php echo $asset->AssetVideo->getId(); ?>\' youtubeid=\'<?php echo $asset->AssetVideo->getYoutubeId(); ?>\' />');">Insert HTML(1)</a></li>          
        <li class="sf_admin_action"><a href="javascript: appedToTextarea('<img align=\'\' border=\'\' style=\'\' src=\'/images/video-640.png\' alt=\'<?php echo $asset->AssetVideo->getId(); ?>\' youtubeid=\'<?php echo $asset->AssetVideo->getYoutubeId(); ?>\' />');">Insert HTML(2)</a></li>
            */ ?>
      <?php elseif($asset->AssetType->slug == "video-gallery"): ?>
        <li class="sf_admin_action"><a href="javascript: appedToTextarea('<iframe title=\'<?php echo $asset->getTitle() ?>\' width=\'310\' height=\'206\' src=\'http://www.youtube.com/embed/videoseries?list=PL<?php echo $asset->AssetVideoGallery->getYoutubeId(); ?>&amp;wmode=transparent&amp;rel=0#t=0m0s\' frameborder=\'0\' allowfullscreen></iframe>');">Insert HTML (1)</a></li>
        <li class="sf_admin_action"><a href="javascript: appedToTextarea('<iframe title=\'<?php echo $asset->getTitle() ?>\' width=\'640\' height=\'390\' src=\'http://www.youtube.com/embed/videoseries?list=PL<?php echo $asset->AssetVideoGallery->getYoutubeId(); ?>&amp;wmode=transparent&amp;rel=0#t=0m0s\' frameborder=\'0\' allowfullscreen></iframe>');">Insert HTML (2)</a></li>
      <?php elseif($asset->AssetType->slug == "image"): ?>
        <li class="sf_admin_action"><a href="javascript: appedToTextarea('<?php echo $asset->AssetImage->getImage2(4)?>');">Insert HTML(1)</a></li>
        <li class="sf_admin_action"><a href="javascript: appedToTextarea('<?php echo $asset->AssetImage->getImage2(6)?>');">Insert HTML(2)</a></li>
      <?php elseif($asset->AssetType->slug == "audio"): ?>
        <li class="sf_admin_action"><a href="javascript: appedToTextarea('<img align=\'\' border=\'\' style=\'\' src=\'/images/audio.png\' alt=\'<?php echo $asset->AssetAudio->getFile(); ?>\' title=\'<?php echo str_replace('&#039;', '&#8217;', str_replace('\'', '&#8217;', $asset->getTitle())); ?>\' />');">Insert HTML(1)</a></li>          
      <?php elseif($asset->AssetType->slug == "file"): ?>
        <li class="sf_admin_action"><a href="javascript: appedToTextarea('<a href=\'http://midia.cmais.com.br/assets/file/original/<?php echo $asset->AssetFile->getFile() ?>.<?php echo $asset->AssetFile->getExtension() ?>\' alt=\'<?php echo str_replace(array('\'','"'), '', $asset->getTitle()); ?>\' title=\'<?php echo str_replace('"', '', $asset->getTitle()); ?>\'><?php echo $asset->getTitle() ?></a>');">Insert Link</a></li>          
      <?php elseif($asset->AssetType->slug == "image-gallery"): ?>
        <li class="sf_admin_action"><a href="javascript: appendImageGallery_<?php echo $asset->id ?>();">Insert Gallery</a></li>          
      <?php endif;?>
    <?php endif;?>
    <li class="sf_admin_action_delete"><a href="javascript: deleteRelatedAssets('<?php echo $parentAsset->id ?>', '<?php echo $asset->id ?>');">Delete</a></li>
  </ul>
</td>

<script>
<?php if($asset->AssetType->slug == "image-gallery"): ?>
function appendImageGallery_<?php echo $asset->id ?>(){
  //var embed = '<link type="text/css" href="/portal/js/orbit/orbit-1.2.3.css" rel="stylesheet" />';
  //var embed += '<script type="text/javascript" src="/portal/js/orbit/jquery.orbit-1.2.3.min.js"><\/script>';
  var embed = "$(window).load(function() { $('#featured').orbit({'bullets' : true, 'bulletThumbs': true }); });";
  var embed += '<!-- GALERIA DE FOTOS --><div class="container galeriaNew" style="float: left; margin-bottom: 10px; width: 640px;"><div id="featured">';
  <?php $related = $asset->retriveRelatedAssetsByAssetTypeId(2); ?>
  <?php if(count($related)>0): ?>
    <?php foreach($related as $d): ?>
    var embed += '<img src="<?php echo $d->retriveImageUrlByImageUsage('image-6') ?>" alt="<?php echo $d->getTitle() ?>" data-thumb="<?php echo $d->retriveImageUrlByImageUsage('image-1') ?>" data-caption="#html<?php echo $d->getSlug() ?>" />';
    <?php endforeach; ?>
  <?php endif; ?>
  var embed += '</div>';
  var embed += '<!-- THUMBNAILS -->';
  <?php if(count($related)>0): ?>
    <?php foreach($related as $d): ?>
    <?php $related_content = $d->retriveRelatedAssetsByAssetTypeId(1); ?>
    var embed += '<span class="orbit-caption" id="html<?php echo $d->getSlug() ?>">';
    var embed += '<span class="espaco"><?php echo $d->getDescription() ?><?php if($d->AssetImage->getHeadline()!="") echo "<br>".$d->AssetImage->getHeadline() ?><?php if($d->AssetImage->getAuthor()!="") echo "<br>Foto: ".$d->AssetImage->getAuthor() ?><?php if(count($related_content)>0): ?><br /><a href="<?php echo $related_content[0]->retriveUrl()?>" target="_blank">Saiba mais</a><?php endif; ?>';
    var embed += '</span></span>';
    <?php endforeach; ?>
  <?php endif; ?>
  var embed += '</div><!-- /GALERIA DE FOTOS -->';
}
<?php endif;?>

function updateEmbed_<?php echo $asset->id ?>(){
  var s = $('#size_<?php echo $asset->id ?>:checked').val();
  var sf = $('#start_<?php echo $asset->id ?>').val();
  var aux = sf.split(':');
  var width = 640;
  var height = 390;
  if(parseInt(s) == 310){
    width = 310;
    height = 206;
  }
  var embed = '<iframe title="<?php echo $asset->getTitle() ?>" width="'+width+'" height="'+height+'" src="http://www.youtube.com/embed/<?php echo $asset->AssetVideo->getYoutubeId(); ?>?wmode=transparent&rel=0#t='+aux[0]+'m'+aux[1]+'s" frameborder="0" allowfullscreen></iframe>'
  $('#embed_<?php echo $asset->id ?>').val(embed);
}
function appendEmbed_<?php echo $asset->id ?>(){
  appedToTextarea($('#embed_<?php echo $asset->id ?>').val());
}

</script>