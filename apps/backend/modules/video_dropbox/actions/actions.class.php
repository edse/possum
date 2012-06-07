<?php

require_once dirname(__FILE__).'/../lib/video_dropboxGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/video_dropboxGeneratorHelper.class.php';

/**
 * video_dropbox actions.
 *
 * @package    astolfo
 * @subpackage video_dropbox
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class video_dropboxActions extends autoVideo_dropboxActions
{

  public function executeIndex(sfWebRequest $request)
  {
    if((!$this->getUser()->getGuardUser()->hasPermission('admin')) && (!$this->getUser()->getGuardUser()->hasPermission('editor')))
      $this->redirect('@homepage');
    parent::executeIndex($request);
  }

  public function executeListProcess(sfWebRequest $request){
    try {
      $item = Doctrine_Core::getTable('VideoDropbox')->findOneById($request->getParameter('id'));
    } catch(Exception $e) {
      throw new Exception(sprintf('Failed retriving data... '.$e->getMessage()));
    }
    if($item->getStatus() == "Pendding"){
      if($item->getAssetVideoId() > 0){
        if(($item->getAction() == "Insert")||($item->getAction() == "Update")){
          $item->processPenddingInsertAction();
          sleep(1);
        }
      }
      elseif($item->getAssetVideoGalleryId() > 0){
        if(($item->getAction() == "Insert")||($item->getAction() == "Update")){
          $item->processPenddingInsertAction2();
          sleep(1);
        }
      }
    }
    $this->redirect('@video_dropbox');
  }

  public function executeListReprocess(sfWebRequest $request){
    try {
      $item = Doctrine_Core::getTable('VideoDropbox')->findOneById($request->getParameter('id'));
    } catch(Exception $e) {
      throw new Exception(sprintf('Failed retriving data... '.$e->getMessage()));
    }
    if($item->getStatus() == "Waiting Youtube"){
      if($item->getAssetVideoId() > 0){
        if(($item->getAction() == "Insert")||($item->getAction() == "Update")){
          $item->setStatus("Pendding");
          $item->save();
          $item->processPenddingInsertAction();
          sleep(1);
        }
      }
      elseif($item->getAssetVideoGalleryId() > 0){
        if(($item->getAction() == "Insert")||($item->getAction() == "Update")){
          $item->setStatus("Pendding");
          $item->save();
          $item->processPenddingInsertAction2();
          sleep(1);
        }
      }
    }
    $this->redirect('@video_dropbox');
  }

  public function executeListCheck(sfWebRequest $request){
  	try {
  		$item = Doctrine_Core::getTable('VideoDropbox')->findOneById($request->getParameter('id'));
  	} catch(Exception $e) {
  		throw new Exception(sprintf('Failed retriving data... '.$e->getMessage()));
  	}
  	if($item->getStatus() == "Waiting Youtube"){
  		if(($item->getAction() == "Insert")||($item->getAction() == "Update")){
        if($item->getAssetVideoGalleryId() > 0)
           $s = $item->checkYoutubeStatus2();
  			else
  			   $s = $item->checkYoutubeStatus();
  			if($s == 1){
  				$this->getUser()->setFlash('notice', 'File successfully processed by Youtube');
  			}elseif($s == 2){
  				$this->getUser()->setFlash('error', 'Youtube reported errors or warnings present in file.');
  			}elseif($s == 3){
  				$this->getUser()->setFlash('error', 'File still in proccess by Youtube. Please, wait a few minutes.');
  			}elseif($s == 4){
  				$this->getUser()->setFlash('error', 'Original local file not found');
  			}
  		}
  	}
    $this->redirect('@video_dropbox');
  }

  public function executeBatchProcess(sfWebRequest $request){
  	foreach($request->getParameter('ids') as $id){
		try {
			$item = Doctrine_Core::getTable('VideoDropbox')->findOneById($id);
		} catch(Exception $e) {
			throw new Exception(sprintf('Failed retriving data... '.$e->getMessage()));
		}
		if($item->getStatus() == "Pendding"){	
      if($item->getAssetVideoId() > 0){
  			if(($item->getAction() == "Insert")||($item->getAction() == "Update")){
  				$item->processPenddingInsertAction();
  				sleep(1);
  			}
      }
      elseif($item->getAssetVideoGalleryId() > 0){
      	if(($item->getAction() == "Insert")||($item->getAction() == "Update")){
          $item->processPenddingInsertAction2();
          sleep(1);
        }
      }
		}
	}
	$this->redirect('@video_dropbox');
  }

  public function executeBatchCheck(sfWebRequest $request){
  	foreach($request->getParameter('ids') as $id){
		try {
			$item = Doctrine_Core::getTable('VideoDropbox')->findOneById($id);
		} catch(Exception $e) {
			throw new Exception(sprintf('Failed retriving data... '.$e->getMessage()));
		}
		if($item->getStatus() == "Waiting Youtube"){
			if($item->getAssetVideoGalleryId() != "")
				$s = $item->checkYoutubeStatus2();
			else
				$s = $item->checkYoutubeStatus();
			//$item->checkYoutubeStatus();
		}
	 }
	$this->redirect('@video_dropbox');
  }

}
