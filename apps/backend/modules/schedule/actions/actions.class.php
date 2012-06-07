<?php

require_once dirname(__FILE__).'/../lib/scheduleGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/scheduleGeneratorHelper.class.php';

/**
 * schedule actions.
 *
 * @package    astolfo
 * @subpackage schedule
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class scheduleActions extends autoScheduleActions
{

  private function getParameters(sfWebRequest $request){
    if($request->getParameter('date'))
      $this->date = $request->getParameter('date');
    else
      $this->date = date("Y/m/d");
    
    if($request->getParameter('channel_id') > 0){
      $this->channel = Doctrine::getTable('Channel')->findOneById($request->getParameter('channel_id'));      
    }
    else{
      $this->channel = Doctrine::getTable('Channel')->findOneBySlug('tvcultura');
    }
    $this->channels = Doctrine::getTable('Channel')->findAll();
   
  }

  public function executeClone(sfWebRequest $request)
  {
    $this->getParameters($request);
    
    if($request->getParameter('clone_day')){

      $q = Doctrine_Query::create()
        ->select('s.*')
        ->from('Schedule s')
        ->where('s.channel_id = ?', $this->channel->id)
        ->andWhere('s.date_start >= ?', $this->date." 00:00:00")
        ->andWhere('s.date_start <= ?', $this->date." 23:59:59")
        ->orderBy('s.date_start');
      $schedules = $q->execute();

      foreach($schedules as $s){
        $start_hour = @end(explode(" ", $s->date_start));
        $end_hour = @end(explode(" ", $s->date_end));

        $newSchedule = new Schedule();
        $newSchedule->channel_id = $s->channel_id;
        $newSchedule->program_id = $s->program_id;
        $newSchedule->type = $s->type;
        $newSchedule->title = $s->title;
        $newSchedule->description = $s->description;
        $newSchedule->image = $s->image;
        $newSchedule->date_start = str_replace("/","-",$request->getParameter('clone_day'))." ".$start_hour;
        $newSchedule->date_end = str_replace("/","-",$request->getParameter('clone_day'))." ".$end_hour;
        $newSchedule->save();
      }
      
      $this->getUser()->setFlash('notice', 'The schedule was cloned successfully.');
      //die("<script>parent.updateSchedule('".$this->channel->id."','".$this->date."');</script>");

    }else{
      $this->getUser()->setFlash('error', 'You have to set the target day before cloning the schedule!');
    }
    
    $this->redirect('@schedule?channel_id='.$this->channel->id.'&date='.$request->getParameter('clone_day'));

  }

  public function executeIndex(sfWebRequest $request)
  {
    if((!$this->getUser()->getGuardUser()->hasPermission('admin'))&&(!$this->getUser()->getGuardUser()->hasPermission('editor')))
      $this->redirect('@homepage');

    $this->getParameters($request);
    $this->filters = $this->configuration->getFilterForm($this->getFilters());
    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->setLayout("layout_min");
    $this->getParameters($request);
    $this->schedule = new Schedule();
    $this->schedule->setChannelId($this->channel->id);
    $this->schedule->setDateStart($this->date);
    $this->schedule->setDateEnd($this->date);
    $this->schedule->is_important = false;
    $this->form = new ScheduleForm($this->schedule);
  }

  public function executeCreate(sfWebRequest $request){
    parent::executeCreate($request);
    $this->setLayout("layout_min");
  }

  public function executeEdit(sfWebRequest $request){
    parent::executeEdit($request);
    $this->setLayout("layout_min");
  }

  public function executeUpdate(sfWebRequest $request){
    parent::executeUpdate($request);
    $this->setLayout("layout_min");
  }

  public function executeAjaxupdate(sfWebRequest $request)
  {
    $this->editAll = false;
    $this->programs = false;
    $this->getParameters($request);
    $this->setLayout(false);
    $this->query = Doctrine_Query::create()
      ->select('s.*')
      ->from('Schedule s')
      ->where('s.channel_id = ?', $this->channel->id)
      ->andWhere('s.date_start >= ?', $this->date." 00:00:00")
      ->andWhere('s.date_start <= ?', $this->date." 23:59:59")
      ->orderBy('s.date_start');
    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function executeAjaxupdate2(sfWebRequest $request)
  {
    $this->executeAjaxupdate($request);
    $this->editAll = true;
    $this->programs = Doctrine::getTable('Program')->findAll();
  }

  public function executeAjaxdelete(sfWebRequest $request)
  {
    $this->setLayout(false);
    $schedule = Doctrine::getTable('Schedule')->findOneById($request->getParameter('schedule_id'));
    $schedule->delete();
    die();
  }
  
  protected function getPager()
  {
    $pager = $this->configuration->getPager('Schedule');
    $pager->setQuery($this->query);
    $pager->setPage($this->getPage());
    $pager->init();
    return $pager;
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $schedule = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $schedule)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@schedule_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        //$this->redirect(array('sf_route' => 'schedule', 'sf_subject' => $schedule));
        //$this->redirect('@schedule?channel_id='.$request->getParameter('channel_id').'&date='.$request->getParameter('date'));

        //die("<script>alert('".$schedule->channel_id." - ".$schedule->date_start."');</script>");
        $a = explode(" ",$schedule->date_start);
        die("<script>parent.updateSchedule('".$schedule->channel_id."','".str_replace("-","/",$a[0])."');</script>");
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
    $this->getParameters($request);

    $records = Doctrine_Query::create()
      ->from('Schedule')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $record->delete();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    
    $this->redirect('@schedule?channel_id='.$this->channel->id.'&date='.$this->date);
  }

  public function executeEditall(sfWebRequest $request)
  {
    $this->getParameters($request);
    $ids = $request->getParameter('schedule');
    $hours_start = $request->getParameter('hour_start');
    $hours_end = $request->getParameter('hour_end');
    $titles = $request->getParameter('title');
    $descriptions = $request->getParameter('description');
    $programs = $request->getParameter('program');

    for($i=0; $i<count($ids); $i++){
      $record = Doctrine::getTable('Schedule')->findOneById($ids[$i]);
      if($record){
        $record->setProgramId($programs[$i]);
        $record->setDateStart($this->date." ".$hours_start[$i]);
        if($hours_end[$i] != "00:00:00")
          $record->setDateEnd($this->date." ".$hours_end[$i]);
        else
          $record->setDateEnd($this->date." ".$hours_start[$i+1]);
        $record->setTitle($titles[$i]);
        $record->setDescription($descriptions[$i]);
        $record->save();
      }
    }

    $this->getUser()->setFlash('notice', 'The items have been updated successfully.');
    $this->redirect('@schedule?channel_id='.$this->channel->id.'&date='.$this->date);
  }

}