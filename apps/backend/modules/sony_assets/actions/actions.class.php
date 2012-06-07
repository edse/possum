<?php

require_once dirname(__FILE__).'/../lib/sony_assetsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sony_assetsGeneratorHelper.class.php';

/**
 * sony_assets actions.
 *
 * @package    astolfo
 * @subpackage sony_assets
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sony_assetsActions extends autoSony_assetsActions
{
  

  public function executeIndex(sfWebRequest $request)
  {
    $this->setLayout("layout_min");
    //$this->parentAsset = Doctrine::getTable('Asset')->find($request->getParameter('asset_id'));
    
    //$this->setFilters($this->configuration->getFilterDefaults());
    //$this->filters = $this->configuration->getFilterForm($this->getFilters());
    
    parent::executeIndex($request);
    
    //$this->pager = $this->getPager();
    //$this->sort = $this->getSort();
  }

  public function executeTobeincluded(sfWebRequest $request)
  {
    //$this->setLayout("layout_min");

    parent::executeIndex($request);

    $ids = Doctrine_Query::create()
	->select('ca.sony_asset_id')
	->from('SonyCategoryAsset ca')
	->distinct(true)
	->setHydrationMode(Doctrine::HYDRATE_ARRAY)
	->execute();
    $f = array();
    foreach($ids as $i){
	if(!in_array($i["sony_asset_id"], $f))
	    $f[] = $i["sony_asset_id"];
    }

    $this->query = Doctrine_Query::create()
        ->select('a.*')
        ->from('SonyAsset a')
        ->whereNotIn('a.id', $f)
        ->orderBy('a.id desc');

    $this->pager = $this->getPager3();
   
    //$this->parentAsset = Doctrine::getTable('Asset')->find($request->getParameter('asset_id'));
    //$this->setFilters($this->configuration->getFilterDefaults());
    //$this->filters = $this->configuration->getFilterForm($this->getFilters());
        
    //$this->pager = $this->getPager();
    //$this->sort = $this->getSort();
  }

  protected function getPager3()
  {
    $pager = $this->configuration->getPager('SonyAsset');
    $pager->setMaxPerPage(250);
    $pager->setQuery($this->query);
    $pager->setPage(1);
    $pager->init();

    return $pager;
  }
  
  protected function getPager()
  {
    $pager = $this->configuration->getPager('SonyAsset');
    $pager->setMaxPerPage(25);
    $pager->setQuery($this->buildQuery());
    $pager->setPage($this->getPage());
    //$pager->setPage(1);
    $pager->init();

    return $pager;
  }

  public function executeFilter(sfWebRequest $request)
  {
    $this->setLayout("layout_min");
    $this->setPage(1);
    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());
      $this->redirect('@sony_asset');
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());
    $this->filters->bind($request->getParameter($this->filters->getName()));
    
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());
      //$this->redirect('@asset_related_assets?asset_id='.$request->getParameter('asset_id'));
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
    $this->setTemplate('index');
  }
  
}


