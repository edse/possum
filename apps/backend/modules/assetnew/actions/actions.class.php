<?php

/**
 * assetnew actions.
 *
 * @package    astolfo
 * @subpackage assetnew
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class assetnewActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('default', 'module');
  }

  public function executeContent(sfWebRequest $request)
  {
    $asset = new Asset();
    $asset->asset_type_id = 1;
    $asset->title = "Título";
    $asset->description = "Descrição";
    $asset->user_id = $this->getUser()->getGuardUser()->getId();
    $asset->save();
    $this->redirect('asset/edit?id='.$asset->id);
  }

  public function executeImage(sfWebRequest $request)
  {
    $asset = new Asset();
    $asset->asset_type_id = 2;
    $asset->title = "Título";
    $asset->description = "Descrição";
    $asset->user_id = $this->getUser()->getGuardUser()->getId();
    $asset->save();
    $this->redirect('asset/edit?id='.$asset->id);
  }

  public function executeYoutubevideo(sfWebRequest $request)
  {
    if($request->getParameter('url')!=""){
      
      $info = file_get_contents("http://gdata.youtube.com/feeds/api/videos/".$request->getParameter('url'));
      //$aux = utf8_decode(urldecode($info));
      $aux = $info;
      
      $aux1 = explode("<title type='text'>", $aux);
      $aux2 = explode('</title>', $aux1[1]);
      $title = $aux2[0];
      $aux1 = explode("<media:description type='plain'>", $aux);
      $aux2 = explode('</media:description>', $aux1[1]);
      $description = $aux2[0];
      $aux1 = explode("duration='", $aux);
      $aux2 = explode("'", $aux1[1]);
      $duration = $aux2[0];
      if(intval($duration)>0){
        // extract hours
        $hours = floor($duration / (60 * 60));
        // extract minutes
        $divisor_for_minutes = $duration % (60 * 60);
        $minutes = floor($divisor_for_minutes / 60);
        // extract the remaining seconds
        $divisor_for_seconds = $divisor_for_minutes % 60;
        $seconds = ceil($divisor_for_seconds);
        if($hours < 10) $hours = "0".$hours;
        if($minutes < 10) $minutes = "0".$minutes;
        if($seconds < 10) $seconds = "0".$seconds;
      }
      
      $this->asset = new Asset();
      $this->asset->asset_type_id = 6;
      $this->asset->title = $title;
      $this->asset->description = $description;
      $this->asset->user_id = $this->getUser()->getGuardUser()->getId();
      $this->asset->save();
      
      $av = new AssetVideo();
      $av->asset_id = $this->asset->id;
      $av->youtube_id = $request->getParameter('url');
      $av->duration = $hours.":".$minutes.":".$seconds;
      $av->save();
      $this->redirect('asset/edit?id='.$this->asset->id);
      
    }

  }

  public function executeAudio(sfWebRequest $request)
  {
    $asset = new Asset();
    $asset->asset_type_id = 4;
    $asset->title = "Título";
    $asset->description = "Descrição";
    $asset->user_id = $this->getUser()->getGuardUser()->getId();
    $asset->save();
    $this->redirect('asset/edit?id='.$asset->id);
  }

  public function executeEpisode(sfWebRequest $request)
  {
    $asset = new Asset();
    $asset->asset_type_id = 15;
    $asset->title = "Título";
    $asset->description = "Descrição";
    $asset->user_id = $this->getUser()->getGuardUser()->getId();
    $asset->save();
    $this->redirect('asset/edit?id='.$asset->id);
  }

  public function executePodcast(sfWebRequest $request)
  {
    $asset = new Asset();
    $asset->asset_type_id = 5;
    $asset->title = "Título";
    $asset->description = "Descrição";
    $asset->user_id = $this->getUser()->getGuardUser()->getId();
    $asset->save();
    $this->redirect('asset/edit?id='.$asset->id);
  }

  public function executePlaylist(sfWebRequest $request)
  {
    $asset = new Asset();
    $asset->asset_type_id = 7;
    $asset->title = "Título";
    $asset->description = "Descrição";
    $asset->user_id = $this->getUser()->getGuardUser()->getId();
    $asset->save();
    $this->redirect('asset/edit?id='.$asset->id);
  }

  public function executeGallery(sfWebRequest $request)
  {
    $asset = new Asset();
    $asset->asset_type_id = 3;
    $asset->title = "Título";
    $asset->description = "Descrição";
    $asset->user_id = $this->getUser()->getGuardUser()->getId();
    $asset->save();
    $this->redirect('asset/edit?id='.$asset->id);
  }

  public function executeQuestionnaire(sfWebRequest $request)
  {
    $asset = new Asset();
    $asset->asset_type_id = 9;
    $asset->title = "Título";
    $asset->description = "Descrição";
    $asset->user_id = $this->getUser()->getGuardUser()->getId();
    $asset->save();
    
    $av = new AssetQuestionnaire();
    $av->asset_id = $asset->id;
    $av->name = "Título";
    $av->save();
    $this->redirect('asset/edit?id='.$asset->id);
  }

  public function executeQuestion(sfWebRequest $request)
  {
    $asset = new Asset();
    $asset->asset_type_id = 10;
    $asset->title = "Título";
    $asset->description = "Descrição";
    $asset->user_id = $this->getUser()->getGuardUser()->getId();
    $asset->save();
    
    $av = new AssetQuestion();
    $av->asset_id = $asset->id;
    $av->question = "Título";
    $av->save();
    $this->redirect('asset/edit?id='.$asset->id);
  }

  public function executeAnswer(sfWebRequest $request)
  {
    $asset = new Asset();
    $asset->asset_type_id = 11;
    $asset->title = "Título";
    $asset->description = "Descrição";
    $asset->user_id = $this->getUser()->getGuardUser()->getId();
    $asset->save();
    $this->redirect('asset/edit?id='.$asset->id);
  }

  public function executePeople(sfWebRequest $request)
  {
    $asset = new Asset();
    $asset->asset_type_id = 20;
    $asset->title = "Título";
    $asset->description = "Descrição";
    $asset->user_id = $this->getUser()->getGuardUser()->getId();
    $asset->save();
    $this->redirect('asset/edit?id='.$asset->id);
  }

  public function executeBroadcast(sfWebRequest $request)
  {
    $asset = new Asset();
    $asset->asset_type_id = 12;
    $asset->title = "Título";
    $asset->description = "Descrição";
    $asset->user_id = $this->getUser()->getGuardUser()->getId();
    $asset->save();
    $this->redirect('asset/edit?id='.$asset->id);
  }

}
