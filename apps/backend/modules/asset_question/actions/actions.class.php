<?php

require_once dirname(__FILE__).'/../lib/asset_questionGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/asset_questionGeneratorHelper.class.php';

/**
 * asset_question actions.
 *
 * @package    astolfo
 * @subpackage asset_question
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class asset_questionActions extends autoAsset_questionActions
{
  
  public function executeNew(sfWebRequest $request)
  {
    if($request->getParameter('asset_id') > 0){
      $obj = new AssetQuestion();
      $obj->asset_questionnaire_id = $request->getParameter('asset_questionnaire_id');
      $this->form = new AssetQuestionForm($obj);
      $this->asset_question = $obj;
      $this->setLayout("layout_min");
    }else
      parent::executeNew($request);
  }
  
  public function executeEdit(sfWebRequest $request)
  {
    parent::executeEdit($request);
    if($request->getParameter('asset_id') > 0){
      $obj = new AssetQuestion();
      $obj->asset_questionnaire_id = $request->getParameter('asset_questionnaire_id');
      $this->form = new AssetQuestionForm($obj);
      $this->asset_question = $obj;
      $this->setLayout("layout_min");
    }
  }


  public function executeCreate(sfWebRequest $request)
  {
    $this->setLayout("layout_min");
    parent::executeCreate($request);
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {

        $asset_question = $form->save();

        $asset = new Asset();
        $asset->setAssetTypeId(Doctrine::getTable('AssetType')->findOneBySlug('question'));
        //$asset->setTitle($request->getParameter('asset_question_question'));
        $asset->setTitle("test");
        $asset->setUserId($this->getUser()->getGuardUser()->getId());
        $asset->save();

        $asset_question->setAssetId($asset->id);
        $asset_question->save();

        $assetRelated = new RelatedAsset();
        $assetRelated->setParentAssetId(1);
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

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $asset_question)));

      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@asset_question_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'asset_question_edit', 'sf_subject' => $asset_question));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }

  
}