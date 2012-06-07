<?php

require_once dirname(__FILE__).'/../lib/sectionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sectionGeneratorHelper.class.php';

/**
 * section actions.
 *
 * @package    astolfo
 * @subpackage section
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sectionActions extends autoSectionActions
{

  public function executeIndex(sfWebRequest $request)
  {
  	parent::executeIndex($request);	
    try{
  		$this->site = $this->getRoute()->getObject();
  		$this->query = Doctrine_Core::getTable('Section')->createQuery()->addWhere('site_id = ?', (int)$this->site->getId());
  		$this->pager = $this->getPager();
  	}catch(Exception $e){
  		print $e->getMessage();
  		//$this->forward('@site', 'index');
  	}
  }

  public function executeNew(sfWebRequest $request)
  {
    //$this->form = $this->configuration->getForm();
    //$this->section = $this->form->getObject();
    $this->site = Doctrine::getTable('Site')->find($request->getParameter('site_id'));	
    $this->section = new Section();
    $this->section->setSiteId($this->site->id);
    $this->form = new SectionForm($this->section);
  }

  protected function getPager()
  {
    $pager = $this->configuration->getPager('Section');
    $pager->setQuery($this->query);
    $pager->setPage($this->getPage());
    $pager->init();
    return $pager;
  }
  
  public function executeListAssets(sfWebRequest $request){
  	//$this->redirect('@asset?section_id='.$request->getParameter('id'));
  	//$this->forward('asset', 'index', array('section_id' => $request->getParameter('id')));
  	$this->forward('section_assets', 'index', array('section_id' => $request->getParameter('id'), 'section' => $this->getRoute()->getObject()));
  }

  public function executeListBlocks(sfWebRequest $request){
    //$this->redirect('@block?section_id='.$request->getParameter('id'));
    $this->forward('block', 'index', array('section_id' => $request->getParameter('id')));
  }
  
  public function executeAjaxupdate(sfWebRequest $request)
  {
    $this->setLayout(false);
    $this->site = Doctrine::getTable('Site')->find($request->getParameter('site_id'));
    $this->query = Doctrine_Query::create()
      ->select('s.*')
      ->from('Section s')
      ->where('s.site_id = ?', $request->getParameter('site_id'))
      ->orderBy('s.display_order');
    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }

  public function executeAjaxorder(sfWebRequest $request)
  {
    $order = 0;
    foreach($request->getParameter('listItem') as $i){
      $section = Doctrine::getTable('Section')->find($i);
      if($section){
        $section->setDisplayOrder($order);
        $section->save();
        $order++;
      }
    }
    die();
  }
  
  public function executeAjaxdelete(sfWebRequest $request)
  {
    $this->setLayout(false);
    $section = Doctrine::getTable('Section')->find($request->getParameter('id'));
    if($section)
      $section->delete();
    die();
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
      
      $section = $form->getObject();
      $assets = $section->Assets;

      try {
        $section = $form->save();
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

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $section)));

      if($request->hasParameter('_save_and_add')){
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');
        $this->redirect('@section_new');
      }
      else{
        $this->getUser()->setFlash('notice', $notice);
		    $this->redirect($this->generateUrl('default', array('module' => 'site', 'action' => $form->getObject()->getSiteId(), 'ListSections' => '')));
      }
    }
    else{
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));
	
	$site_id = $this->getRoute()->getObject()->getSiteId();

    if ($this->getRoute()->getObject()->delete())
    {
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }

	$this->redirect($this->generateUrl('default', array('module' => 'site', 'action' => $site_id, 'ListSections' => '')));
    //$this->redirect('@section');
  }


}
