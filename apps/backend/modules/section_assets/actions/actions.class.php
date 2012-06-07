<?php

require_once dirname(__FILE__).'/../lib/section_assetsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/section_assetsGeneratorHelper.class.php';

/**
 * section_assets actions.
 *
 * @package    astolfo
 * @subpackage section_assets
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class section_assetsActions extends autoSection_assetsActions
{

  public function executeNew(sfWebRequest $request)
  {
    if($request->getParameter('section_id') > 0){
  		$obj = new SectionAsset();
  		$obj->setSectionId($request->getParameter('section_id'));
  		$this->form = new SectionAssetForm($obj);
      $this->sectionAsset = $obj;
  		$this->setLayout("layout_min");
    }else
      parent::executeNew($request);
  }

  public function executeAdd(sfWebRequest $request)
  {
  	parent::executeIndex($request);	
    $this->setLayout("layout_min");
    $this->filters = $this->configuration->getFilterForm($this->getFilters());
	/*
	try{
		$this->section = Doctrine::getTable('Section')->find($request->getParameter('section_id'));
		$this->query = Doctrine_Query::create()
			->select('a.*')
			->from('Asset a, SectionAsset sa')
			->where('a.id = sa.asset_id')
			->andWhere('sa.section_id = ?', (int)$this->section->getId());
		$this->pager = $this->getPager();
	    $this->sort = $this->getSort();
		$this->filters = $this->configuration->getFilterForm($this->getFilters());
	}catch(Exception $e){
		//$request->getParameter('section_id')
		print ">>>".$e->getMessage();
		$this->forward('@site', 'index');
	}
	*/
  }

  public function executeIndex(sfWebRequest $request)
  {
    parent::executeIndex($request);	
    $this->filters = $this->configuration->getFilterForm($this->getFilters());
    if($this->section = $this->getRoute()->getObject()){
      $this->query = Doctrine_Query::create()
        ->select('a.*, sa.id section_asset_id')
        ->from('Asset a, SectionAsset sa')
        ->where('a.id = sa.asset_id')
        ->andWhere('sa.section_id = ?', (int)$this->section->getId())
        ->groupBy('sa.id')
        ->orderBy('sa.display_order');
      $this->pager = $this->getPager();
    }
  }

  protected function getPager()
  {
    $pager = $this->configuration->getPager('Asset');
    $pager->setQuery($this->query);
    $pager->setPage($this->getPage());
    $pager->init();
    return $pager;
  }

  public function executeAjaxupdate(sfWebRequest $request)
  {
    if($request->getParameter('section_id')){
      $this->setLayout(false);
      $this->section = Doctrine::getTable('Section')->find($request->getParameter('section_id'));
  
      $this->query = Doctrine_Query::create()
        ->select('a.*, sa.id section_asset_id, sa.section_id section_id')
        ->from('Asset a, SectionAsset sa')
        ->where('a.id = sa.asset_id')
        ->andWhere('sa.section_id = ?', (int)$this->section->getId())
        ->groupBy('sa.id')
        ->orderBy('sa.display_order');
  
      $this->pager = $this->getPager();
      $this->sort = $this->getSort();
    }
  	//die($this->renderPartial('section_assets/ajax_list', array('section' => $section, 'pager' => $this->getPager(), 'sort' => $this->getSort(), 'helper' => array('Date', 'I18N'))));
  }
  
  public function executeAjaxorder(sfWebRequest $request)
  {
    $order = 1;
    foreach($request->getParameter('listItem') as $i){
      $sa = Doctrine::getTable('SectionAsset')->findOneByAssetIdAndSectionId($i, $request->getParameter('id'));
      if($sa){
        $sa->setDisplayOrder($order+($request->getParameter('page')*20));
        $sa->save();
        $order++;
      }
    }
    die('1');
  }

  public function executeAjaxdelete(sfWebRequest $request)
  {
    $this->setLayout(false);
    $sectionAsset = Doctrine::getTable('SectionAsset')->findOneByAssetIdAndSectionId($request->getParameter('asset_id'), $request->getParameter('section_id'));
    if($sectionAsset) $sectionAsset->delete();
    die();
  }

}
