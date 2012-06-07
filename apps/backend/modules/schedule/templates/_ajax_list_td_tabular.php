<td class="sf_admin_date sf_admin_list_td_date_start">
  <?php if(!$editAll): ?>
    <?php echo false !== strtotime($schedule->getDateStart()) ? format_date($schedule->getDateStart(), "t") : '&nbsp;' ?>
  <?php else: ?>
    <input type="hidden" name="schedule[]" id="schedule_<?php echo $schedule->getId() ?>" value="<?php echo $schedule->getId() ?>" />
    <input type="text" name="hour_start[]" id="hour_start_<?php echo $schedule->getId() ?>" value="<?php echo @end(explode(" ",$schedule->getDateStart())) ?>" class="hour_start" style="width: 55px;" />
  <?php endif; ?>
</td>
<td class="sf_admin_date sf_admin_list_td_date_end">
  <?php if(!$editAll): ?>
  <?php echo false !== strtotime($schedule->getDateEnd()) ? format_date($schedule->getDateEnd(), "t") : '&nbsp;' ?>
  <?php else: ?>
    <input type="text" name="hour_end[]" id="hour_end_<?php echo $schedule->getId() ?>" value="<?php echo @end(explode(" ",$schedule->getDateEnd())) ?>" class="hour_end" style="width: 55px;" />
  <?php endif; ?>
</td>
<td class="sf_admin_boolean sf_admin_list_td_is_live">
  <?php echo get_partial('schedule/list_field_boolean', array('value' => $schedule->getIsLive())) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_Program">
  <?php if(!$editAll): ?>
    <?php echo $schedule->getProgram() ?>
  <?php else: ?>
    <?php 
    $programs = Doctrine::getTable('Program')->findAll();
    $select  = '<select id="program_'.$schedule->getId().'" name="program[]" >';
    $select .= '<option value="">'.__('Select one program', array(), 'messages').'</option>';
    foreach($programs as $p){
      $select .= '<option value="'.$p->id.'"';
      if($schedule->program_id == $p->id)
        $select .= ' selected="selected"';
      $select .= '>'.$p->title.'</option>';
    }
    $select .= '</select>';
    ?>
    <?php echo $select ?>
  <?php endif; ?>
</td>
<td class="sf_admin_text sf_admin_list_td_title">
  <?php if(!$editAll): ?>
    <?php echo $schedule->getTitle() ?>
  <?php else: ?>
    <input type="text" name="title[]" id="title_<?php echo $schedule->getId() ?>" value="<?php echo $schedule->getTitle() ?>" style="width: 100px;" />
  <?php endif; ?>
</td>
<td class="sf_admin_text sf_admin_list_td_description">
  <?php if(!$editAll): ?>
    <?php echo $schedule->getDescription() ?>
  <?php else: ?>
    <textarea name="description[]" id="description_<?php echo $schedule->getId() ?>" style="width: 150px;" ><?php echo $schedule->getDescription() ?></textarea>
  <?php endif; ?>
</td>
<td class="sf_admin_text sf_admin_list_td_image">
  <?php if($schedule->getImage()): ?>
  <a href="/uploads/displays/<?php echo $schedule->getImage() ?>" target="_blank"><img src="/uploads/displays/<?php echo $schedule->getImage() ?>" width="100" /></a>
  <?php endif; ?>
</td>
