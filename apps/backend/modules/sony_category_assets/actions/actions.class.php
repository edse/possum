<?php

require_once dirname(__FILE__).'/../lib/sony_category_assetsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/sony_category_assetsGeneratorHelper.class.php';

/**
 * sony_category_assets actions.
 *
 * @package    astolfo
 * @subpackage sony_category_assets
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sony_category_assetsActions extends autoSony_category_assetsActions
{
	
	public function executeIndex(sfWebRequest $request)
	{
		//parent::executeIndex($request);
		$this->filters = $this->configuration->getFilterForm($this->getFilters());
		if($this->category = $this->getRoute()->getObject()){
			/*
			$this->query = Doctrine_Query::create()
				->select('a.*, ca.id sony_category_asset_id')
				->from('SonyAsset a, SonyCategoryAsset ca')
				->where('a.id = ca.sony_asset_id')
				->andWhere('ca.sony_category_id = ?', (int)$this->category->getId())
				->orderBy('ca.display_order');
			$this->query = Doctrine_Query::create()
				->select('ca.*')
				->from('SonyCategoryAsset ca')
				->where('ca.id = ?', (int)$this->category->getId())
				->orderBy('ca.display_order');
			*/
			$this->pager = $this->getPager();
			$this->sort = $this->getSort();
		}
	}

	public function executeAjaxupdate(sfWebRequest $request)
	{
		if($request->getParameter('category_id')){
			$this->setLayout(false);
			$this->category = Doctrine::getTable('SonyCategory')->find($request->getParameter('category_id'));
			$this->query = Doctrine_Query::create()
				->select('a.*, ca.id sony_category_asset_id')
				->from('SonyAsset a, SonyCategoryAsset ca')
				->where('a.id = ca.sony_asset_id')
				->andWhere('ca.sony_category_id = ?', (int)$this->category->getId())
				->orderBy('ca.display_order asc');
			$this->pager = $this->getPager();
			$this->sort = $this->getSort();
		}
	}

	protected function getPager()
	{
		$pager = $this->configuration->getPager('SonyAsset');
		$pager->setQuery($this->query);
		$pager->setPage($this->getPage());
		$pager->init();
		return $pager;
	}
	
	public function executeAjaxdelete(sfWebRequest $request)
	{
		$this->setLayout(false);
		$sectionAsset = Doctrine::getTable('SonyCategoryAsset')->findOneBySonyAssetIdAndSonyCategoryId($request->getParameter('asset_id'), $request->getParameter('category_id'));
		if($sectionAsset) $sectionAsset->delete();
		die();
	}

	public function executeAjaxorder(sfWebRequest $request)
	{
		$order = 1;
		foreach($request->getParameter('listItem') as $i){
			$sa = Doctrine::getTable('SonyCategoryAsset')->findOneBySonyAssetIdAndSonyCategoryId($i, $request->getParameter('id'));
			if($sa){
        //$sa->setDisplayOrder($order+($request->getParameter('page')*200));
        $sa->setDisplayOrder($order);
				$sa->save();
				$order++;
			}
		}
		die('1');
	}
	
}
