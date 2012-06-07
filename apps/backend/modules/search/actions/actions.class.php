<?php

require_once dirname(__FILE__) . '/../lib/searchGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/searchGeneratorHelper.class.php';

/**
 * search actions.
 *
 * @package    astolfo
 * @subpackage search
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchActions extends autoSearchActions {

  private function getParameters(sfWebRequest $request){
    $this->asset_type = new AssetType();
    $this->category = new Category();

    $this->asset_types = Doctrine_Query::create()
      ->select('at.*')
      ->from('AssetType at')
      ->where('at.id > 0')
      ->orderBy('at.title', 'asc')
      ->execute();

    $this->categories = Doctrine_Query::create()
      ->select('c.*')
      ->from('Category c')
      ->where('c.id > 0')
      ->orderBy('c.title', 'asc')
      ->execute();
  }


  public function executeIndex(sfWebRequest $request) {
    //print "1";
    //parent::executeIndex($request);
    $this->assets = null;
    $query = $request->getParameter('search_query');
    if($query) {
      //$this->assets = Doctrine_Core::getTable('AssetTable')->getForLuceneQuery($query);
      /*
      $this->assets = Doctrine_Query::create()
        ->select('a.*')
        ->from('Asset a')
        ->where('a.title LIKE ?', '%'.$query.'%')
        ->orWhere('a.description LIKE ?', '%'.$query.'%')
        ->orderBy('a.title', 'asc')
        ->execute();
      */
      $this->query = Doctrine_Query::create()
        ->select('a.*')
        ->from('Asset a')
        ->where('a.title LIKE ?', '%'.$query.'%')
        ->orWhere('a.description LIKE ?', '%'.$query.'%')
        ->orderBy('a.title', 'asc');
    }
    $this->getParameters($request);
  }

  public function executeDo(sfWebRequest $request) {
    parent::executeIndex($request);
    $this->assets = null;
    $query = $request->getParameter('search_query');
    if($query) {
      //$this->assets = Doctrine_Core::getTable('Asset')->getForLuceneQuery($query);
      //$this->query = Doctrine_Core::getTable('Asset')->getQueryFromLucene($query);
      
      /*
      $this->assets = Doctrine_Query::create()
        ->select('a.*')
        ->from('Asset a')
        ->where('a.title LIKE ?', '%'.$query.'%')
        ->orWhere('a.description LIKE ?', '%'.$query.'%')
        ->orderBy('a.title', 'asc')
        ->execute();
      */
        
      $this->query = Doctrine_Query::create()
        ->select('a.*')
        ->from('Asset a')
        ->where('a.title LIKE ?', '%'.$query.'%')
        ->orWhere('a.description LIKE ?', '%'.$query.'%')
        ->orderBy('a.title', 'asc');
      
      // pager
      if($request->getParameter('page')) {
        $this->setPage($request->getParameter('page'));
      }
      $this->pager = $this->getPager();
      $this->sort = $this->getSort();
    }

    //$this->filters = $this->configuration->getFilterForm($this->getFilters());
    
    $this->getParameters($request);

    $this->setTemplate('index');
  }

  protected function getPager() {
    $pager = $this->configuration->getPager('Asset');
    $pager->setQuery($this->query);
    $pager->setPage($this->getPage());
    $pager->init();
    return $pager;
  }

}
