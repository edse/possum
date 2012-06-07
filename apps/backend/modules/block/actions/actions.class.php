<?php

require_once dirname(__FILE__).'/../lib/blockGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/blockGeneratorHelper.class.php';

/**
 * block actions.
 *
 * @package    astolfo
 * @subpackage block
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class blockActions extends autoBlockActions
{
	
  public function executeIndex(sfWebRequest $request)
  {
    parent::executeIndex($request);	
    try{
      $this->section = $this->getRoute()->getObject();
      $this->query = Doctrine_Core::getTable('Block')->createQuery()->addWhere('section_id = ?', (int)$this->section->getId());
      $this->pager = $this->getPager();
    }catch(Exception $e){
      $this->forward('@section', 'index');
    }
  }

  protected function getPager()
  {
    $pager = $this->configuration->getPager('Block');
    $pager->setQuery($this->query);
    $pager->setPage($this->getPage());
    $pager->init();
    return $pager;
  }

  public function executeListDisplays(sfWebRequest $request){
  	$this->forward('display', 'index', array('block_id' => $request->getParameter('id')));
  }
  
  public function executeNew(sfWebRequest $request)
  {
    parent::executeNew($request);
    $this->section = Doctrine::getTable('Section')->find($request->getParameter('section_id'));  
    $this->block = new Block();
    $this->block->setSectionId($this->section->id);
    $this->form = new BlockForm($this->block);
  }

  public function executeAjaxupdate(sfWebRequest $request)
  {
    $this->setLayout(false);
    $this->section = Doctrine::getTable('Section')->find($request->getParameter('section_id'));
    $this->query = Doctrine_Query::create()
      ->select('b.*')
      ->from('Block b')
      ->where('b.section_id = ?', $request->getParameter('section_id'))
      ->orderBy('b.display_order');
    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function executeAjaxorder(sfWebRequest $request)
  {
    $order = 0;
    foreach($request->getParameter('listItem') as $i){
      $block = Doctrine::getTable('Block')->find($i);
      if($block){
        $block->setDisplayOrder($order);
        $block->save();
        $order++;
      }
    }
    die();
  }
  
  public function executeAjaxdelete(sfWebRequest $request)
  {
    $this->setLayout(false);
    $block = Doctrine::getTable('Block')->find($request->getParameter('id'));
    if($block)
      $block->delete();
    die();
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $block = $form->save();
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

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $block)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@block_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);
        //$this->redirect($this->generateUrl('default', array('module' => 'section', 'action' => $form->getObject()->getSectionId(), 'ListBlocks' => '')));
        $this->redirect($this->generateUrl("homepage")."section/".$form->getObject()->getSectionId()."/ListBlocks");

      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

}