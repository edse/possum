<?php if(count($todos) > 0): ?>
<div class="sf_admin_form_row">
<div>
<label>Todo List (<?php print count($todos)?>)</label>
<div class="content">
<div class="taglist">
<?php foreach($todos as $t): ?>
  <span><nobr><?php echo link_to($t->getTitle(), 'asset/?id='.$t->getAssetId().'&action=edit') ?>&nbsp;</nobr></span>
<?php endforeach; ?>
</div>
</div>
</div>
</div>
<br />
<?php endif; ?>
