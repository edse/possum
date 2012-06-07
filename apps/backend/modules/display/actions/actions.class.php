<?php

require_once dirname(__FILE__).'/../lib/displayGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/displayGeneratorHelper.class.php';

/**
 * display actions.
 *
 * @package    astolfo
 * @subpackage display
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class displayActions extends autoDisplayActions
{

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $display = $form->save();
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

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $display)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@display_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);
        $this->redirect($this->generateUrl("homepage")."block/".$form->getObject()->getBlockId()."/ListDisplays");

        //$this->redirect($this->generateUrl('default', array('module' => 'block', 'action' => $form->getObject()->getBlockId(), 'ListDisplays' => '')));
        //$this->redirect(array('sf_route' => 'display_edit', 'sf_subject' => $display));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

  public function executeIndex(sfWebRequest $request)
  {
    parent::executeIndex($request);
    try{
      $this->block = $this->getRoute()->getObject();
      $this->query = Doctrine_Core::getTable('Display')->createQuery()->addWhere('block_id = ?', (int)$this->block->getId());
      $this->pager = $this->getPager();
    }catch(Exception $e){
      print $e->getMessage();
      //$this->forward('@block', 'index');
    }
    /*
    if($request->getParameter('block_id') > 0){
      	$this->filters->bind(array('block_id'=>$request->getParameter('block_id')));
      	if ($this->filters->isValid())
      	{
        		$this->setFilters($this->filters->getValues());
        		$this->redirect('@display');
        }
    }else{
    	$block = Doctrine::getTable('Block')->find($this->filters["block_id"]->getValue());
    	$this->pager->blockTitle = $block->getTitle();
    	$this->pager->sectionTitle = $block->Section->getTitle();
    	$this->pager->siteTitle = $block->Section->Site->getTitle();
    }
    */
  }

  protected function getPager()
  {
    $pager = $this->configuration->getPager('Display');
    $pager->setQuery($this->query);
    $pager->setPage($this->getPage());
    $pager->init();
    return $pager;
  }

  public function executeNew(sfWebRequest $request)
  {
  	if($request->getParameter('block_id') > 0){
      $obj = new Display();
      $obj->setBlockId($request->getParameter('block_id'));
      $this->form = new DisplayForm($obj);
      $this->display = $obj;
      //$this->setLayout("layout_min");
  	}else
      parent::executeNew($request);
  }

  public function executeAjaxupdate(sfWebRequest $request)
  {
    $this->setLayout(false);
    $this->block = Doctrine::getTable('Block')->find($request->getParameter('block_id'));
    $this->query = Doctrine_Query::create()
      ->select('d.*')
      ->from('Display d')
      ->where('d.block_id = ?', $request->getParameter('block_id'))
      ->orderBy('d.display_order');
    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function executeAjaxorder(sfWebRequest $request)
  {
    $order = 0;
    foreach($request->getParameter('listItem') as $i){
      $display = Doctrine::getTable('Display')->find($i);
      if($display){
        $display->setDisplayOrder($order);
        $display->save();
        $order++;
      }
    }
    die();
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $id = $this->getRoute()->getObject()->getBlockId();
    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
    if ($this->getRoute()->getObject()->delete()) {
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }
    $this->redirect($this->generateUrl("homepage")."block/".$id."/ListDisplays");
  }

  public function executeAjaxdelete(sfWebRequest $request)
  {
    $this->setLayout(false);
    $display = Doctrine::getTable('Display')->find($request->getParameter('id'));
    if($display)
      $display->delete();
    die();
  }

  public function executeListDeactivate(sfWebRequest $request)
  {
    $this->setLayout(false);
    if($request->getParameter('id') > 0){
      $obj = Doctrine::getTable('Display')->find($request->getParameter('id'));
      if($obj){
        $obj->setIsActive(0);
        $obj->save();
        //$this->forward('block/', 'ListDisplays', array('id' => $obj->getBlockId()));
        //$this->redirect('block/'.$obj->getBlockId(), '/ListDisplays');
        //$this->forward('@block', 'list_displays', array('block_id' => $obj->getBlockId()));
      }
    }
    $this->redirect($this->generateUrl("homepage")."block/".$request->getParameter('block_id')."/ListDisplays");
  }

  public function executeListActivate(sfWebRequest $request)
  {
    $this->setLayout(false);
    if($request->getParameter('id') > 0){
      $obj = Doctrine::getTable('Display')->find($request->getParameter('id'));
      if($obj){
        $obj->setIsActive(1);
        $obj->save();
        //$this->forward('block/', 'ListDisplays', array('id' => $obj->getBlockId()));
        //$this->forward('display', 'index', array('id' => $obj->getBlockId()));
      }
    }
    $this->redirect($this->generateUrl("homepage")."block/".$request->getParameter('block_id')."/ListDisplays");
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');

    $records = Doctrine_Query::create()
      ->from('Display')
      ->whereIn('id', $ids)
      ->execute();

    foreach ($records as $record)
    {
      $record->delete();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    $this->redirect($this->generateUrl("homepage")."block/".$request->getParameter('block_id')."/ListDisplays");
    //$this->redirect('@display');
  }


  public function executeBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');
      $this->redirect($this->generateUrl("homepage")."block/".$request->getParameter('block_id')."/ListDisplays");
      //$this->redirect('@display');
    }

    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');
      $this->redirect($this->generateUrl("homepage")."block/".$request->getParameter('block_id')."/ListDisplays");
      //$this->redirect('@display');
    }

    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }

    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }

    $validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Display'));
    try
    {
      // validate ids
      $ids = $validator->clean($ids);

      // execute batch
      $this->$method($request);
    }
    catch (sfValidatorError $e)
    {
      $this->getUser()->setFlash('error', 'A problem occurs when deleting the selected items as some items do not exist anymore.');
    }

    $this->redirect($this->generateUrl("homepage")."block/".$request->getParameter('block_id')."/ListDisplays");
    //$this->redirect('@display');
  }

}