<?php

require_once dirname(__FILE__).'/../lib/asset_answerGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/asset_answerGeneratorHelper.class.php';

/**
 * asset_answer actions.
 *
 * @package    astolfo
 * @subpackage asset_answer
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class asset_answerActions extends autoAsset_answerActions
{

  public function executeNew(sfWebRequest $request)
  {
    $this->forward404Unless($request->getParameter('asset_question_id'));
    $obj = new AssetAnswer();
    $obj->asset_question_id = $request->getParameter('asset_question_id');
    $this->form = new AssetAnswerForm($obj);
    $this->asset_answer = $obj;
    $this->setLayout("layout_min");
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    //$this->forward404Unless($request->getParameter('asset_question_id'));
    parent::executeEdit($request);
    $obj = new AssetAnswer();
    $obj->asset_question_id = $request->getParameter('asset_question_id');
    $this->form = new AssetAnswerForm($obj);
    $this->asset_answer = $obj;
    $this->setLayout("layout_min");
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->setLayout("layout_min");
    parent::executeCreate($request);
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->forward404();
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {


        $asset = new Asset();
        $asset->setAssetTypeId(Doctrine::getTable('AssetType')->findOneBySlug('answer'));
        //$asset->setTitle($request->getParameter('asset_question_question'));
        $asset->setTitle("Resposta");
        $asset->setUserId($this->getUser()->getGuardUser()->getId());
        $asset->save();

	$form->getObject()->setAssetId($asset->id);
        $asset_answer = $form->save();

        $asset->setTitle("Resposta: ".$asset_answer->getAnswer());
        $asset->save();

        $asset_answer->setAssetId($asset->id);
        $asset_answer->save();

      	$question = Doctrine_Core::getTable('AssetQuestion')->findOneById($asset_answer->getAssetQuestionId());

        $assetRelated = new RelatedAsset();
        $assetRelated->setParentAssetId($question->asset_id);
        $assetRelated->setAssetId($asset->id);
        $assetRelated->save();


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

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $asset_answer)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@asset_answer_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'asset_answer_edit', 'sf_subject' => $asset_answer));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

}
