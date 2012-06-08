<?php

require_once dirname(__FILE__).'/../lib/assetGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/assetGeneratorHelper.class.php';

/**
 * asset actions.
 *
 * @package    astolfo
 * @subpackage asset
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class assetActions extends autoAssetActions
{

  public function executeEdit(sfWebRequest $request)
  {
    $this->asset = $this->getRoute()->getObject();
    $this->form = $this->configuration->getForm($this->asset);
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    if($this->getRoute()->getObject()->AssetType->getSlug() == "video"){
      if($this->getRoute()->getObject()->AssetVideo->getId() > 0){
        $dropbox = Doctrine::getTable('VideoDropbox')->findByAssetVideoId($this->getRoute()->getObject()->AssetVideo->getId());
        if(count($dropbox)>0){
          foreach($dropbox as $d){
            $d->delete();
          }
        }
      }
    }
    elseif($this->getRoute()->getObject()->AssetType->getSlug() == "video-gallery"){
      if($this->getRoute()->getObject()->AssetVideoGallery->getId() > 0){
        $dropbox = Doctrine::getTable('VideoDropbox')->findByAssetVideoGalleryId($this->getRoute()->getObject()->AssetVideoGallery->getId());
        if(count($dropbox)>0){
          foreach($dropbox as $d){
            $d->delete();
          }
        }
      }
    }
    elseif($this->getRoute()->getObject()->AssetType->getSlug() == "question"){
      
      if($this->getRoute()->getObject()->AssetQuestion->getSpreadsheetId()!="" && $this->getRoute()->getObject()->AssetQuestion->getWorksheetId()!=""){
        
        set_time_limit(0);
        error_reporting(E_ALL);
        ini_set('display_errors', '1');
    
        $clientLibraryPath = sfConfig::get('sf_lib_dir').'/vendor/ZendGdata-1.11.11/library';
        $oldPath = set_include_path($clientLibraryPath);
        // load Zend Gdata libraries
        require_once sfConfig::get('sf_lib_dir').'/vendor/ZendGdata-1.11.11/library/Zend/Loader.php';
        Zend_Loader::loadClass('Zend_Gdata_Spreadsheets');
        Zend_Loader::loadClass('Zend_Gdata_ClientLogin');
    
        // set credentials for ClientLogin authentication
        $user = "cmp@tvcultura.com.br";
        $pass = "alipio@28042011";
    
        try {  
          // connect to API
          $service = Zend_Gdata_Spreadsheets::AUTH_SERVICE_NAME;
          $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
          $service = new Zend_Gdata_Spreadsheets($client);
    
          // get worksheet entry
          $query = new Zend_Gdata_Spreadsheets_DocumentQuery();
          $query->setSpreadsheetKey($this->getRoute()->getObject()->AssetQuestion->getSpreadsheetId());
          $query->setWorksheetId($this->getRoute()->getObject()->AssetQuestion->getWorksheetId());
          $wsEntry = $service->getWorksheetEntry($query);
    
          // delete entry
          $service->delete($wsEntry->getLink('edit')->getHref());
          echo 'The worksheet entry has been deleted';
    
        } catch (Exception $e) {
          die('ERROR: ' . $e->getMessage());
        }

      }
    }














    $related = Doctrine::getTable('RelatedAsset')->findByAssetId($this->getRoute()->getObject()->getId());
    if(count($related)>0){
      foreach($related as $r){
        $r->delete();
      }
    }
    

    try{
      $this->getRoute()->getObject()->delete();
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }
    catch (Exception $e){
      //echo($e->getMessage());
      $msg = "Este asset está relacionado com outros assets ou destaques.<br /><ul style=\"margin-bottom:10px;margin-left:25px;margin-top: 10px;\">";
      $displays = Doctrine::getTable('Display')->findByAssetId($this->getRoute()->getObject()->getId());
      if(count($displays)>0){
        foreach($displays as $d){
          $msg .= "<li>Destaque: <a href=\"".$this->getController()->genUrl("display/edit?id=".$d->getId())."\" target=\"_blank\">".$d->getTitle()."</a></li>";
        }
      }
      $assets = Doctrine::getTable('RelatedAsset')->findByAssetId($this->getRoute()->getObject()->getId());
      if(count($assets)>0){
        foreach($assets as $d){
          $msg .= "<li>Asset: <a href=\"".$this->getController()->genUrl("asset/edit?id=".$d->getParentAssetId())."\" target=\"_blank\">".$d->ParentAsset->getTitle()."</a></li>";
        }
      }
      /*
      $sections = Doctrine::getTable('SectionAsset')->findByAssetId($this->getRoute()->getObject()->getId());
      if(count($sections)>0){
        foreach($sections as $s){
          $msg .= "<li>Seção: <a href=\"".$this->getController()->genUrl("section/edit?id=".$s->getSectionId())."\" target=\"_blank\">".$s->Section->getTitle()."</a></li>";
        }
      }
      */
      $msg .= "</ul>";
      $this->getUser()->setFlash('error', $msg." ".$e->getMessage());
    }
    $this->redirect('@asset');
  }

  protected function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');
    $records = Doctrine_Query::create()
      ->from('Asset')
      ->whereIn('id', $ids)
      ->execute();
    foreach ($records as $record)
    {
      if($record->AssetType->getSlug() == "video"){
        $dropbox = Doctrine::getTable('VideoDropbox')->findByAssetVideoId($record->AssetVideo->getId());
        if(count($dropbox)>0){
          foreach($dropbox as $d){
            $d->delete();
          }
        }
      }
      elseif($record->AssetType->getSlug() == "video-gallery"){
        $dropbox = Doctrine::getTable('VideoDropbox')->findByAssetVideoGalleryId($record->AssetVideoGallery->getId());
        if(count($dropbox)>0){
          foreach($dropbox as $d){
            $d->delete();
          }
        }
      }
      $record->delete();
    }

    $this->getUser()->setFlash('notice', 'The selected items have been deleted successfully.');
    $this->redirect('@asset');
  }


  public function executePreview(sfWebRequest $request)
  {
    $this->setLayout(false);
    $this->asset = Doctrine::getTable('Asset')->find($request->getParameter('id'));
    if($this->asset->AssetContent)
      echo $this->asset->AssetContent->render();
    die();
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {

    /*
    if(isset($form['AssetImage'])){
		  $t = $form['AssetImage']->getValue('original_file');
      die("HELLO1!");
		  if($t['original_file']){
			 $form->getObject()->AssetImage->convertAndResize();
  		}
	  }
    
  	if(isset($form['AssetAudio'])){
		  $t = $form['AssetAudio']->getValue('original_file');
      die("HELLO2!");
		  if($t['original_file']){
			 $form->getObject()->AssetAudio->convert();
  		}
    }
    */

    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';
      
      if(!$form->getObject()->isNew()){
      	// Update Todos
        $todos = Doctrine::getTable('Todo')->findByUserIdAndAssetIdAndStatus($this->getUser()->getGuardUser()->getId(), $form->getObject()->getId(), 'Pendding');
    		if(count($todos)>0){
	        foreach($todos as $todo){
	          $todo->status = 'Complete';
	          $todo->save();
	        }
        }

      	// Update Dropbox
		if($form->getObject()->AssetType->getSlug() == "video"){
			if($form->getObject()->AssetVideo->getYoutubeId() != ""){
				$dropbox = Doctrine::getTable('VideoDropbox')->findByAssetVideoIdAndStatus($form->getObject()->AssetVideo->getId(), 'Pendding');
				if(count($dropbox)>0){
					foreach($dropbox as $d){
						$d->delete();
					}
				}
				$dropbox = new VideoDropbox();
				$dropbox->setAssetVideoId($form->getObject()->AssetVideo->getId());
				$dropbox->setAction('Update');
				$dropbox->setStatus('Pendding');
				$dropbox->save();
			}else{
			  if($form->getObject()->AssetVideo->getId() > 0){
          $dropbox = Doctrine::getTable('VideoDropbox')->findByAssetVideoIdAndActionAndStatus($form->getObject()->AssetVideo->getId(), 'Insert', 'Pendding');
          if(count($dropbox)<=0){
            $dropbox = new VideoDropbox();
            $dropbox->setAssetVideoId($form->getObject()->AssetVideo->getId());
            $dropbox->setAction('Update');
            $dropbox->setStatus('Pendding');
            $dropbox->save();
          }
			  }
			}
		}
    elseif($form->getObject()->AssetType->getSlug() == "video-gallery"){
      if($form->getObject()->AssetVideoGallery->getYoutubeId() != ""){
        $dropbox = Doctrine::getTable('VideoDropbox')->findByAssetVideoGalleryIdAndStatus($form->getObject()->AssetVideoGallery->getId(), 'Pendding');
        if(count($dropbox)>0){
          foreach($dropbox as $d){
            $d->delete();
          }
        }
        $dropbox = new VideoDropbox();
        $dropbox->setAssetVideoGalleryId($form->getObject()->AssetVideoGallery->getId());
        $dropbox->setAction('Update');
        $dropbox->setStatus('Pendding');
        $dropbox->save();
      }else{
        if($form->getObject()->AssetVideoGallery->getId() > 0){
          $dropbox = Doctrine::getTable('VideoDropbox')->findByAssetVideoGalleryIdAndActionAndStatus($form->getObject()->AssetVideoGallery->getId(), 'Insert', 'Pendding');
          if(count($dropbox)<=0){
            $d = Doctrine::getTable('VideoDropbox')->findByAssetVideoGalleryIdAndActionAndStatus($form->getObject()->AssetVideoGallery->getId(), 'Insert', 'Waiting Youtube');
            if(count($d)<=0){
              $dropbox = new VideoDropbox();
              $dropbox->setAssetVideoGalleryId($form->getObject()->AssetVideoGallery->getId());
              $dropbox->setAction('Insert');
              $dropbox->setStatus('Pendding');
              $dropbox->save();
            }else{
              $dropbox = new VideoDropbox();
              $dropbox->setAssetVideoGalleryId($form->getObject()->AssetVideoGallery->getId());
              $dropbox->setAction('Update');
              $dropbox->setStatus('Pendding');
              $dropbox->save();
            }
          }
        }
      }
    }

      }

      // NEW: deal with tags
      if ($form->getValue('remove_tags' )) {
		foreach (preg_split('/\s*,\s*/' , $form->getValue('remove_tags' )) as $tag) {
		  $form->getObject()->removeTag($tag);
		}
      }
      if ($form->getValue('new_tags' )) {
		foreach (preg_split('/\s*,\s*/' , $form->getValue('new_tags' )) as $tag) {
          // sorry, it would be better to not hard-code this string
	  	  if ($tag == 'Add tags with commas' ) continue;
	  	  $form->getObject()->addTag($tag);
		}
      }

      try {
        $asset = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $asset)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@asset_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'asset_edit', 'sf_subject' => $asset));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
  
  
  /**
   * Tag typeahead AJAX. You might want to secure this action to prevent
   * information discovery in some cases
   *
   */
  public function executeComplete()
  {
    $this->setLayout(false);
    $current = $this->getRequestParameter('current');
    $tags = array();
    $tagsInfo = array();
    $tagsAll = array();
    while (preg_match(
      "/^(([\s\,]*)([^\,]+?)(\s*(\,|$)))(.*)$/", $current, $matches)) 
    {
      list($dummy, $all, $left, $tagName, $right, $dummy, $current) = $matches;
      $tagsInfo[] = array(
        'left' => $left,
        'name' => $tagName,
        'right' => $right
      );
      $tagsAll[] = $all;
    }
    $this->tagSuggestions = array();
    $all = '';
    $n = 0;
    $presentOrSuggested = array();
    foreach ($tagsInfo as $tagInfo) {
      $tag = Doctrine_Query::create()->
        from('Tag t')->
        where('t.name = ?', $tagInfo['name'])->
        fetchOne();
      $all .= $tagInfo['left'];
      if ($tag) {
        $presentOrSuggested[$tagInfo['name']] = true;
      } else {
        // $suggestedTags = sfTagtoolsToolkit::getBeginningWith($tagInfo['name']);
        $suggestedTags = Doctrine_Query::create()->
          from('Tag t')->
          where('t.name LIKE ?', $tagInfo['name'] . '%')->
          limit(sfConfig::get('app_sfDoctrineActAsTaggable_max_suggestions', 10))->
          execute();
        foreach ($suggestedTags as $tag) {
          if (isset($presentOrSuggested[$tag->getName()])) {
            continue;
          }
          // At least some browsers actually submitted the
          // nonbreaking spaces as ordinals distinct from regular spaces,
          // producing distinct tags. So leave the spaces alone.

          // Also, we no longer display 'left' visibly anyway because 
          // that was never compatible with a list of tags that required scrolling

          $suggestion['left'] = $all;
          $suggestion['suggested'] = $tag->getName();
          $presentOrSuggested[$tag->getName()] = true;
          $suggestion['right'] = 
            $tagInfo['right'] . implode('', array_slice($tagsAll, $n + 1));
          $this->tagSuggestions[] = $suggestion;
        }
      }
      $all .= $tagInfo['name'];
      $all .= $tagInfo['right'];
      $n++;
    }
  }

  public function executeDuplicate(sfWebRequest $request)
  {
    $c = $this->getRoute()->getObject();
    $a = new Asset();
    $a->setTitle($c->getTitle());
    $a->setDescription($c->getDescription());
    $a->setAssetTypeId($c->getAssetTypeId());
    $a->setCategoryId($c->getCategoryId());
    $a->setUserId($c->getUserId());
    $a->Categories = $c->Categories;
    $a->RelatedAssets = $c->RelatedAssets;
    $a->Sections = $c->Sections;

    $a->AssetContent->setHeadline($c->AssetContent->getHeadline());
    $a->AssetContent->setHeadlineShort($c->AssetContent->getHeadlineShort());
    $a->AssetContent->setHeadlineLong($c->AssetContent->getHeadlineLong());
    $a->AssetContent->setContent($c->AssetContent->getContent());
    $a->AssetContent->setSource($c->AssetContent->getSource());
    $a->AssetContent->setAuthor($c->AssetContent->getAuthor());

    $a->save();
    $this->getUser()->setFlash('notice', 'Asset duplicado com sucesso.');
    $this->redirect('@asset');
  }

  public function executeGetSlug(sfWebRequest $request){
    $this->setLayout(false);
    $slug = Asset::slugify($request->getParameter('title'));
    $exists = false;
    $check = Doctrine_Query::create()
      ->select('a.*')
      ->from('Asset a')
      ->where('a.slug = ?', $slug)
      ->andWhere('a.id != ?', $request->getParameter('id'))
      ->orderBy('a.slug')
      ->fetchOne();
    if($check){
      $exists = true;
      $i = 1;
      while($check && $i <= 100){
        $slug2 = $slug."-".$i;
        $check = Doctrine_Query::create()
          ->select('a.*')
          ->from('Asset a')
          ->where('a.slug = ?', $slug2)
          ->andWhere('a.id != ?', $request->getParameter('id'))
          ->orderBy('a.slug')
          ->fetchOne();
        $i++;
      }
      $slug = $slug2;
    }
    die($slug);
  }

}