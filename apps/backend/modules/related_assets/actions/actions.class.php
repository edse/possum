<?php
require_once dirname(__FILE__).'/../lib/related_assetsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/related_assetsGeneratorHelper.class.php';

/**
 * related_assets actions.
 *
 * @package    astolfo
 * @subpackage related_assets
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class related_assetsActions extends autoRelated_assetsActions
{
  
  public function executeAjaxupdate(sfWebRequest $request)
  {
    $this->setLayout(false);
    $this->parentAsset = Doctrine::getTable('Asset')->findOneById($request->getParameter('asset_id'));
    
    $this->relatedAssetTypes = Doctrine::getTable('RelatedAssetType')->findAll();
    
    $this->query = Doctrine_Query::create()
      ->select('a.*, raa.id related_asset_id, raa.type related_asset_type, raa.description related_asset_description')
      ->from('Asset a, RelatedAsset raa')
      ->where('a.id = raa.asset_id')
      ->andWhere('raa.parent_asset_id = ?', (int)$request->getParameter('asset_id'))
      ->andWhere('raa.is_active != ?', '-1')
      ->groupBy('raa.id')
      ->orderBy('raa.display_order');

    //die('asdf');
    $this->setFilters($this->configuration->getFilterDefaults());
    $this->filters = $this->configuration->getFilterForm($this->getFilters());

    $this->pager = $this->getPager2();
    $this->sort = $this->getSort();
  }

  protected function getPager2()
  {
    $pager = $this->configuration->getPager('Asset');
    $pager->setMaxPerPage(15); 
    $pager->setQuery($this->query);
    $pager->setPage(1);
    $pager->init();
    return $pager;
  }

  protected function getPage2()
  {
    return $this->getUser()->getAttribute('related_assets.page', 1, 'admin_module');
  }

  public function executeAjaxdelete(sfWebRequest $request)
  {
    $this->setLayout(false);
    $relatedAssets = Doctrine::getTable('RelatedAsset')->findByParentAssetIdAndAssetId($request->getParameter('parent_asset_id'), $request->getParameter('asset_id'));
    $parentAsset = Doctrine::getTable('Asset')->findOneById($request->getParameter('parent_asset_id'));
    foreach($relatedAssets as $r){
      if(($parentAsset->AssetType->getSlug() == "video-gallery")&&($r->Asset->AssetType->getSlug() == "video")){
        $r->setDescription('To be deleted');
        $r->setIsActive('-1');
        $r->save();
      }else
        $r->delete();
      print "<br />".$r->getAssetId();
    }
    die();
  }

  public function executeAjaxedit(sfWebRequest $request)
  {
      $relatedAsset = Doctrine::getTable('RelatedAsset')->findOneById($request->getParameter('related_asset_id'));
      if($relatedAsset){
        $relatedAsset->setType($request->getParameter('type'));
        $relatedAsset->save();
      }
      die();
  }
  
  public function executeBatchSave(sfWebRequest $request){
    $ids = $request->getParameter('ids');
    foreach($ids as $id){
      $relatedAssets = Doctrine::getTable('RelatedAsset')->findByParentAssetIdAndAssetId($request->getParameter('asset_id'), $id);
      foreach($relatedAssets as $r){
        $r->delete();
      }      
      $relatedAsset = new RelatedAsset();
      $relatedAsset->parent_asset_id = $request->getParameter('asset_id');
      $relatedAsset->asset_id = $id;
      $relatedAsset->save();
    }
    die('<script>parent.updateRelatedAssets('.$request->getParameter('asset_id').');</script>');
  }
  
  public function executeAjaxorder(sfWebRequest $request)
  {
    $order = 0;
    foreach($request->getParameter('listItem') as $i){
      $assetRelationship = Doctrine::getTable('RelatedAsset')->findOneByParentAssetIdAndAssetId($request->getParameter('asset_id'), $i);
      if($assetRelationship){
        $assetRelationship->setDisplayOrder($order);
        $assetRelationship->save();
        $order++;
      }
    }
    die();
  }


  public function executeIndex(sfWebRequest $request)
  {
    $this->setLayout("layout_min");
    $this->parentAsset = Doctrine::getTable('Asset')->find($request->getParameter('asset_id'));
    
    //$this->setFilters($this->configuration->getFilterDefaults());
    //$this->filters = $this->configuration->getFilterForm($this->getFilters());
    
    parent::executeIndex($request);
    
    //$this->pager = $this->getPager();
    //$this->sort = $this->getSort();
  }
  
  protected function getPager3()
  {
    $pager = $this->configuration->getPager('RelatedAsset');
    $pager->setMaxPerPage(15);
    $pager->setQuery(Doctrine_Query::create()
      ->select('a.*')
      ->from('Asset a')
      ->where('a.is_active != ?', '-1')
      ->orderBy('a.id desc'));
    $pager->setPage(1);
    $pager->init();

    return $pager;
  }

  protected function getPager()
  {
    $pager = $this->configuration->getPager('RelatedAsset');
    $pager->setMaxPerPage(15);
    $pager->setQuery($this->buildQuery());
    $pager->setPage($this->getPage());
    //$pager->setPage(1);
    $pager->init();

    return $pager;
  }

  
  /*
  public function executeIndex(sfWebRequest $request)
  {
    parent::executeIndex($request);
    $this->asset_id = $request->getParameter('asset_id');
    $this->filters->asset_id = $request->getParameter('asset_id');
    $this->pager->asset_id = $request->getParameter('asset_id');
    $this->helper->asset_id = $request->getParameter('asset_id');
  }
  */
  
  public function executeFilter(sfWebRequest $request)
  {
    $this->setLayout("layout_min");
    $this->parentAsset = Doctrine::getTable('Asset')->find($request->getParameter('asset_id'));
    $this->setPage(1);
    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());
      $this->redirect('@asset_related_assets?asset_id='.$request->getParameter('asset_id'));
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
  
  public function executeBatch(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    if (!$ids = $request->getParameter('ids'))
    {
      $this->getUser()->setFlash('error', 'You must at least select one item.');
      $this->redirect('@asset_related_assets?asset_id='.$request->getParameter('asset_id'));
    }
    if (!$action = $request->getParameter('batch_action'))
    {
      $this->getUser()->setFlash('error', 'You must select an action to execute on the selected items.');
      $this->redirect('@asset_related_assets?asset_id='.$request->getParameter('asset_id'));
    }
    if (!method_exists($this, $method = 'execute'.ucfirst($action)))
    {
      throw new InvalidArgumentException(sprintf('You must create a "%s" method for action "%s"', $method, $action));
    }
    if (!$this->getUser()->hasCredential($this->configuration->getCredentials($action)))
    {
      $this->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
    }
    $validator = new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Asset'));
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

    $this->redirect('@asset_related_assets?asset_id='.$request->getParameter('asset_id'));
  }
  
}
