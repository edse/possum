<?php

require_once dirname(__FILE__).'/../lib/display_assetsGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/display_assetsGeneratorHelper.class.php';

/**
 * display_assets actions.
 *
 * @package    astolfo
 * @subpackage display_assets
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class display_assetsActions extends autoDisplay_assetsActions
{
	
  public function executeIndex(sfWebRequest $request)
  {
    parent::executeIndex($request);
    $this->block = $request->getParameter('block_id');
    $this->filters->block_id = $request->getParameter('block_id');
    $this->pager->block_id = $request->getParameter('block_id');
    $this->helper->block_id = $request->getParameter('block_id');
  }

  public function executeFilter(sfWebRequest $request)
  {
    $this->setPage(1);
    if ($request->hasParameter('_reset'))
    {
      $this->setFilters($this->configuration->getFilterDefaults());
      $this->redirect('@asset_display_assets?block_id='.$request->getParameter('block_id'));
    }

    $this->filters = $this->configuration->getFilterForm($this->getFilters());
    $this->filters->bind($request->getParameter($this->filters->getName()));
    
    if ($this->filters->isValid())
    {
      $this->setFilters($this->filters->getValues());
      $this->redirect('@asset_display_assets?block_id='.$request->getParameter('block_id'));
    }

    $this->block = $request->getParameter('block_id');
    $this->pager = $this->getPager();
    $this->sort = $this->getSort();
    $this->setTemplate('index');
  }

  public function executeBatchSave(sfWebRequest $request){
    foreach($request->getParameter('ids') as $id){
      $asset = Doctrine::getTable('Asset')->find($id);
      $display = new Display();
      $display->block_id = $request->getParameter('block_id');
      $display->asset_id = $id;
      $display->title = $asset->getTitle();
      $display->description = $asset->getDescription();
      $display->save();
    }
    die('<script>parent.updateDisplay('.$request->getParameter('block_id').');</script>');
  }

  public function executeAjaxupdate(sfWebRequest $request)
  {
    $this->block = $request->getParameter('block_id');
    $this->setLayout(false);

    $q = Doctrine_Query::create()
          ->select('d.*')
          ->from('Display d')
          ->where('d.block_id = ?', $request->getParameter('block_id'))
          ->orderBy('d.display_order');
    $displayAssets = $q->execute();

    $block = Doctrine::getTable('Block')->find($request->getParameter('block_id'));
    $list = '<ul id="sort-list" class="ui-sortable">';
    foreach($displayAssets as $d){
      $list .= '<li id="listItem_'.$d->getId().'" style="margin-bottom: 3px; list-style: none;" class="">';
      $list .= '<div style="margin-right: 3px; float: left;" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" aria-disabled="false" title="Button with icon only"><span class="ui-button-icon-primary ui-icon ui-icon-grip-dotted-horizontal"></span><span class="ui-button-text">Button with icon only</span></div>';

      $list .= '<table style="width: 90%; height: 135px;"><tr><th colspan="2">'.$d->Asset->getThumbnail().'</th><th> </th></tr>';
      $list .= '<tr style="height: 27px;"><td><label for="asset_AssetImageGallery_headline">'.$d->getTitle().'</label></td><td></td>';
      $list .= '<td style="width: 125px;"><ul style="margin: 0px;" class="sf_admin_actions"><li class="sf_admin_action_edit"><a href="'.$this->getController()->genUrl('display/edit?id='.$d->getId(), true).'">Edit</a></li><li class="sf_admin_action_delete"><a href="javascript: deleteDisplayAssets('.$d->getId().', '.$d->getBlockId().');">Delete</a></li>';
      $list .= '</ul></td></tr></table></li>';
    }
    $list .= '</ul>';
    if(!$list)
      $list = "<table><tr><th>No display for this block</th></tr></table></ul>";
    die($list);
  }

  public function executeAjaxdelete(sfWebRequest $request)
  {
    $this->setLayout(false);
    $display = Doctrine::getTable('Display')->find($request->getParameter('id'));
    $display->delete();
    die();
  }
  
  public function executeAjaxorder(sfWebRequest $request)
  {
    $order = 0;
    foreach($request->getParameter('listItem') as $i){
      $display = Doctrine::getTable('Display')->find($i);
      if($display){
        $display->setDisplayOrder($order);
        $display->save();
        $order++;
      }
	  print "<br>$i";
    }
    die();
  }
  
}
