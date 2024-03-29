<?php

/**
 * AssetVideoGallery form base class.
 *
 * @method AssetVideoGallery getObject() Returns the current form's model object
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAssetVideoGalleryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'asset_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Asset'), 'add_empty' => false)),
      'youtube_id' => new sfWidgetFormInputText(),
      'headline'   => new sfWidgetFormInputText(),
      'source'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'asset_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Asset'))),
      'youtube_id' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'headline'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'source'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('asset_video_gallery[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AssetVideoGallery';
  }

}
