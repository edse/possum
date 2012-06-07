<?php if ($field->isPartial()): ?>
  <?php include_partial('sony/'.$name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php elseif ($field->isComponent()): ?>
  <?php include_component('sony', $name, array('form' => $form, 'attributes' => $attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes)) ?>
<?php else: ?>
  <div class="<?php echo $class ?><?php $form[$name]->hasError() and print ' errors' ?>">
    <?php echo $form[$name]->renderError() ?>
    <div>
      <?php echo $form[$name]->renderLabel($label) ?>

      <div class="content">
        <?php echo $form[$name]->render($attributes instanceof sfOutputEscaper ? $attributes->getRawValue() : $attributes) ?>
        <?php if($name == 'description'): ?>
          <input type="text" name="sony_category_description_counter" id="sony_category_description_counter" value="" style="width: 50px" />
        <?php elseif($name == 'title'): ?>
          <input type="text" name="sony_category_title_counter" id="sony_category_title_counter" value="" style="width: 50px" />
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
