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

  public function executeVideo(sfWebRequest $request)
  {
    $asset = new Asset();
    $asset->asset_type_id = 6;
    $asset->title = "Título";
    $asset->description = "Descrição";
    $asset->user_id = $this->getUser()->getGuardUser()->getId();
    $asset->save();
    $this->redirect('asset/edit?id='.$asset->id);
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
