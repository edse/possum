<?php if($name == 'tags'): ?>
	<?php include_partial('tags', array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif($name == 'asset'): ?>
  <?php if($asset->getAssetType()->getModel() == "TweetMonitor"):?>
    <?php include_partial('tweet', array('asset' => $asset, 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
  <?php else:?>
    <?php include_partial('asset', array('asset' => $asset, 'form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
  <?php endif; ?>
<?php else: ?>
	<?php if ($field->isPartial()): ?>
	  <?php include_partial('asset/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
	<?php elseif ($field->isComponent()): ?>
	  <?php include_component('asset', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
	<?php else: ?>
	  <div class="<?php echo $class ?><?php $form[$name]->hasError() and print ' errors' ?>">
	    <?php echo $form[$name]->renderError() ?>
	    <div>
	      <?php echo $form[$name]->renderLabel($label) ?>
	
	      <div class="content">
	        <?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
	        <?php if($name == 'title'): ?>
	          <input type="text" name="asset_title_counter" id="asset_title_counter" value="" style="width: 50px" />
	        <?php elseif($name == 'description'): ?>
	          <input type="text" name="asset_description_counter" id="asset_description_counter" value="" style="width: 50px" />
	        <?php endif; ?>
	      </div>
	
	      <?php if ($help): ?>
	        <div class="help"><?php echo __($help, array(), 'messages') ?></div>
	      <?php elseif ($help = $form[$name]->renderHelp()): ?>
	        <div class="help"><?php echo $help ?></div>
	      <?php endif; ?>
	    </div>
	  </div>
	<?php endif; ?>
<?php endif; ?>

<?php flush(); ?>
