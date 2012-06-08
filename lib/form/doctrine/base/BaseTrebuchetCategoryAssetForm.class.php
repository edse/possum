<?php

/**
 * TrebuchetCategoryAsset form base class.
 *
 * @method TrebuchetCategoryAsset getObject() Returns the current form's model object
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTrebuchetCategoryAssetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'trebuchet_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TrebuchetCategory'), 'add_empty' => false)),
      'trebuchet_asset_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TrebuchetAsset'), 'add_empty' => false)),
      'is_active'             => new sfWidgetFormInputCheckbox(),
      'display_order'         => new sfWidgetFormInputText(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'trebuchet_category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TrebuchetCategory'))),
      'trebuchet_asset_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TrebuchetAsset'))),
      'is_active'             => new sfValidatorBoolean(array('required' => false)),
      'display_order'         => new sfValidatorInteger(array('required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('trebuchet_category_asset[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TrebuchetCategoryAsset';
  }

}
