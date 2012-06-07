<?php

require_once dirname(__FILE__).'/../lib/section_assets_addGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/section_assets_addGeneratorHelper.class.php';

/**
 * section_assets_add actions.
 *
 * @package    astolfo
 * @subpackage section_assets_add
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class section_assets_addActions extends autoSection_assets_addActions
{
	
  public function executeIndex(sfWebRequest $request)
  {
    $this->setLayout("layout_min");
	  $this->section = Doctrine::getTable('Section')->find($request->getParameter('section_id'));
  	parent::executeIndex($request);
  }
  
  public function executeBatchSave(sfWebRequest $request){
    $ids = $request->getParameter('ids');
    foreach($ids as $id){
      $sectionAssets = Doctrine::getTable('SectionAsset')->findBySectionIdAndAssetId($request->getParameter('section_id'), $id);
  	  $sectionAsset = new SectionAsset();
      $sectionAsset->section_id = $request->getParameter('section_id');
	  $sectionAsset->asset_id = $id;
	  $sectionAsset->save();
    }
    die('<script>parent.updateSectionAssets('.$request->getParameter('section_id').');</script>');
  }


  public function executeFilter(sfWebRequest $request)
  {
        
    $this->section = Doctrine::getTable('Section')->find($request->getParameter('section_id'));
    
    $this->setPage(1);

    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());

      //$this->redirect('@asset_section_assets_add');
      $this->forward('@section_assets_add', 'index');
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->filters->bind($request->getParameter($this->filters->getName()));
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());

      //$this->redirect('@asset_section_assets_add');
      $this->forward('@section_assets_add', 'index');
    }

    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->setTemplate('index');
  }

}
