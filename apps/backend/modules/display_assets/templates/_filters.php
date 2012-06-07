<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<div class="sf_admin_filter" style="margin-bottom:10px;">
  <?php if ($form->hasGlobalErrors()): ?>
    <?php echo $form->renderGlobalErrors() ?>
  <?php endif; ?>

  <form id="filter" action="<?php echo url_for('asset_display_assets_collection', array('action' => 'filter')) ?>" method="post">
    <input type="hidden" name="block_id" value="<?php echo $block ?>" />
    <table cellspacing="0" style="width: 100%">
      <tbody>
        <tr class="<?php //echo $class ?>">
        <?php foreach ($configuration->getFormFilterFields($form) as $name => $field): ?>
        <?php if ((isset($form[$name]) && $form[$name]->isHidden()) || (!isset($form[$name]) && $field->isReal())) continue ?>
          <?php include_partial('display_assets/filters_field', array(
            'name'       => $name,
            'attributes' => $field->getConfig('attributes', array()),
            'label'      => $field->getConfig('label'),
            'help'       => $field->getConfig('help'),
            'form'       => $form,
            'field'      => $field,
            'class'      => 'sf_admin_form_row sf_admin_'.strtolower($field->getType()).' sf_admin_filter_field_'.$name,
          )) ?>
        <?php endforeach; ?>
          <td colspan="2">
            <?php echo $form->renderHiddenFields() ?>
            
            <?php // echo link_to(__('Reset', array(), 'sf_admin'), 'asset_display_assets_collection', array('action' => 'filter', 'block_id' => $form->block_id), array('query_string' => '_reset', 'method' => 'post')) ?>

            <input type="button" value="Reset" onclick="$('#filter').action='/backend.php/display_assets/filter/action?_reset'; $('#filter').append('<input type=\'hidden\' name=\'_reset\' value=\'1\' /><input type=\'hidden\' name=\'block_id\' value=\'<?php echo $block ?>\' />');  $('#filter').submit();" />
            
            <input type="submit" value="<?php echo __('Filter', array(), 'sf_admin') ?>" />
          </td>
        <tr>
      </tbody>
    </table>
  </form>
</div>
