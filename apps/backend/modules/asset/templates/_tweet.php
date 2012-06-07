<?php if(!$asset->isNew()): ?>

  <?php  
  // much of this I copied and adapted from a cached admin generator template.
  $name = 'Asset'.ucwords($asset->getAssetType()->getModel()); $label = '' ; $help = '' ; 
  $class = 'sf_admin_form_row sf_admin_text sf_admin_form_field_asset' ;
  ?>
  <?php if($form[$name]): ?> 
  <div class="<?php echo $class ?><?php $form[$name]->hasError() and print ' errors'  ?>">
    <?php echo $form[$name]->renderError() ?>
    <div>
      <?php //echo $form[$name]->renderLabel($label) ?>
 
      <div class="content"><?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?></div>
 
      <?php if ($help): ?>
        <div class="help"><?php echo __($help, array(), 'messages' ) ?></div>
      <?php elseif ($help = $form[$name]->renderHelp()): ?>
        <div class="help"><?php echo $help ?></div>
      <?php endif; ?>
      
      <div class="content">
        <?php echo link_to(__('Tweets ('.count($asset->AssetTweetMonitor->Tweets).')', array(), 'messages'), 'tweet/ListTweets?id='.$asset->AssetTweetMonitor->getId(), array()) ?>
      </div>

    </div>
  </div>
  <?php endif; ?>

<?php endif; ?>
