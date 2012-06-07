<?php
require_once dirname(__FILE__).'/../lib/sony_category_assets_addGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sony_category_assets_addGeneratorHelper.class.php';

/**
 * sony_category_assets_add actions.
 *
 * @package    astolfo
 * @subpackage sony_category_assets_add
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sony_category_assets_addActions extends autoSony_category_assets_addActions
{

	public function executeIndex5(sfWebRequest $request)
	{
		$this->setLayout("layout_min");
	
		echo ">>>".$request->getParameter('category_id');
		$this->filters = $this->configuration->getFilterForm($this->getFilters());
		
		if($request->getParameter('category_id')>0)
			$this->category = Doctrine::getTable('SonyCategory')->find($request->getParameter('category_id'));
	
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
	

	public function executeIndex(sfWebRequest $request)
	{
		$this->setLayout("layout_min");
		$this->category = Doctrine::getTable('SonyCategory')->find($request->getParameter('category_id'));
		$this->filters = $this->configuration->getFilterForm($this->getFilters());
		parent::executeIndex($request);
		$this->query = Doctrine_Query::create()
			->select('a.*')
			->from('SonyAsset a')
			->where('a.is_active = 1')
			->orderBy('a.created_at');
		$this->pager = $this->getPager();
	}
	
	/*
	public function executeAll(sfWebRequest $request){
		parent::executeIndex($request);
		$this->filters = $this->configuration->getFilterForm($this->getFilters());
		$this->query = Doctrine_Query::create()
			->select('a.*')
			->from('SonyAsset a')
			->where('a.id = sa.asset_id')
			->orderBy('created_at desc');
		$this->pager = $this->getPager();
	}
	*/

	protected function getPager()
	{
		$pager = $this->configuration->getPager('SonyAsset');
		$pager->setQuery($this->query);
		$pager->setPage($this->getPage());
		$pager->init();
		return $pager;
	}


	public function executeBatchSave(sfWebRequest $request){
		$ids = $request->getParameter('ids');
		$category = Doctrine::getTable('SonyCategory')->find($request->getParameter('category_id'));
		foreach($ids as $id){
			echo "<BR>>>>".$id;
			$asset = Doctrine::getTable('SonyAsset')->find($id);
			$collection = new Doctrine_Collection("SonyAsset");

			//$ca = Doctrine::getTable('SonyCategoryAsset')->findBySonyCategoryIdAndSonyAssetId($request->getParameter('category_id'), $id);
			$ca = new SonyCategoryAsset();
			$ca->sony_category_id = $request->getParameter('category_id');
			$ca->sony_asset_id = $id;
			if($ca->save())
				echo "OK";

			//$asset->category_id = $request->getParameter('category_id');
			//$category->getAssets();
			//$asset->getCategories()->add($category);
			//$asset->save();

			/*
			if(count($category->getAssets()) > 0)
				$category->getAssets()->add($asset);
			else{
				$collection->add($asset);
				$category->setAssets($collection);
			}
		  	$category->save();
			*/
		}
		die('<script>parent.updateCategoryAssets('.$request->getParameter('category_id').');</script>');
	}


	  public function executeFilter(sfWebRequest $request)
	  {
	    $this->setPage(1);

	    if($request->hasParameter('_reset'))
	    {
	      $this->setFilters($this->configuration->getFilterDefaults());

	      //$this->redirect('@sony_category_assets_add');
	      
	      $this->redirect($this->generateUrl('sony_category_assets_add', array(
		'category_id' => $request->getParameter("category_id"))
	      ));

	    }

	    $this->filters = $this->configuration->getFilterForm($this->getFilters());

	    $this->filters->bind($request->getParameter($this->filters->getName()));
	    if ($this->filters->isValid())
	    {
	      $this->setFilters($this->filters->getValues());

	      //$this->redirect('@sony_category_assets_add');
	      $this->redirect($this->generateUrl('sony_category_assets_add', array(
		'category_id' => $request->getParameter("category_id"))
	      ));

	    }

	    $this->pager = $this->getPager();
	    $this->sort = $this->getSort();

	    $this->setTemplate('index');
	  }

	
}
