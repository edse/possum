<?php

require_once dirname(__FILE__).'/../lib/siteGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/siteGeneratorHelper.class.php';

/**
 * site actions.
 *
 * @package    astolfo
 * @subpackage site
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class siteActions extends autoSiteActions
{

  public function executeGetSections(sfWebRequest $request){
    $this->setLayout(false);
    $ss = Doctrine_Query::create()
      ->select('s.*')
      ->from('Section s')
      ->where('s.site_id = ?', $request->getParameter('site_id'))
      ->orderBy('s.title')
      ->execute();
    $ssa = Doctrine_Query::create()
      ->select('s.*')
      ->from('Section s, SectionAsset sa')
      ->where('sa.asset_id = ?', $request->getParameter('asset_id'))
      ->andWhere('sa.section_id = s.id')
      ->execute();

    $r = array();
    $in = array();
    foreach($ssa as $a){
      $in[] = $a->id;
      $r["a"][] = array($a->id, $a->Site->title." > ".$a->title);
    }

    foreach($ss as $s){
      if(!in_array($s->id, $in))
        $r["u"][] = array($s->id, $s->Site->title." > ".$s->title);
    }
    die(json_encode($r));
  }

  public function executeIndex(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }

    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
  }


/*
  public function executeIndex(sfWebRequest $request)
  {
    if((!$this->getUser()->getGuardUser()->hasPermission('admin')) && (!$this->getUser()->getGuardUser()->hasPermission('editor')))
      $this->redirect('@homepage');
      
    parent::executeIndex($request);
    
    try{
      $sites = array();
      foreach(sfContext::getInstance()->getUser()->getGuardUser()->getSites() as $s){
        $sites[] = $s->getId();
      }
      
      if(count($sites) > 0)
        $this->query = Doctrine_Core::getTable('Site')->createQuery()->whereIn('id', $sites)->orderby('title');
      else
        $this->query = Doctrine_Core::getTable('Site')->createQuery()->where('id = ?', -1)->orderby('title');
        
      $this->filters = $this->configuration->getFilterForm($this->getFilters());  
      $this->pager = $this->getPager();
    }catch(Exception $e){
      print $e->getMessage();
      //$this->forward('@site', 'index');
    }
  }
  
  protected function getPager()
  {
    $pager = $this->configuration->getPager('Site');
    $pager->setQuery($this->query);
    $pager->setPage($this->getPage());
    $pager->init();

    return $pager;
  }
*/

  public function executeListSections(sfWebRequest $request){
  	//$this->redirect('@section?site_id='.$request->getParameter('id'));
  	$this->forward('@section', 'index', array('site_id' => $request->getParameter('id')));
  }

}
