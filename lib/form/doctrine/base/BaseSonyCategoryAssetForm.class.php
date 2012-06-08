<?php

/**
 * SonyCategoryAsset form base class.
 *
 * @method SonyCategoryAsset getObject() Returns the current form's model object
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSonyCategoryAssetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'sony_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SonyCategory'), 'add_empty' => false)),
      'sony_asset_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('SonyAsset'), 'add_empty' => false)),
      'is_active'        => new sfWidgetFormInputCheckbox(),
      'display_order'    => new sfWidgetFormInputText(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sony_category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SonyCategory'))),
      'sony_asset_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('SonyAsset'))),
      'is_active'        => new sfValidatorBoolean(array('required' => false)),
      'display_order'    => new sfValidatorInteger(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sony_category_asset[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SonyCategoryAsset';
  }

}
