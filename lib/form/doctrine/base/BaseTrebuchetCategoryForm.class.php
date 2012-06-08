<?php

/**
 * TrebuchetCategory form base class.
 *
 * @method TrebuchetCategory getObject() Returns the current form's model object
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTrebuchetCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                    => new sfWidgetFormInputHidden(),
      'trebuchet_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'add_empty' => true)),
      'title'                 => new sfWidgetFormInputText(),
      'description'           => new sfWidgetFormInputText(),
      'image'                 => new sfWidgetFormInputText(),
      'display_order'         => new sfWidgetFormInputText(),
      'is_active'             => new sfWidgetFormInputCheckbox(),
      'created_at'            => new sfWidgetFormDateTime(),
      'updated_at'            => new sfWidgetFormDateTime(),
      'slug'                  => new sfWidgetFormInputText(),
      'trebuchet_asset_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'TrebuchetAsset')),
    ));

    $this->setValidators(array(
      'id'                    => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'trebuchet_category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'required' => false)),
      'title'                 => new sfValidatorString(array('max_length' => 128)),
      'description'           => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'display_order'         => new sfValidatorInteger(array('required' => false)),
      'is_active'             => new sfValidatorBoolean(array('required' => false)),
      'created_at'            => new sfValidatorDateTime(),
      'updated_at'            => new sfValidatorDateTime(),
      'slug'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'trebuchet_asset_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'TrebuchetAsset', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TrebuchetCategory', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('trebuchet_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TrebuchetCategory';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['trebuchet_asset_list']))
    {
      $this->setDefault('trebuchet_asset_list', $this->object->TrebuchetAsset->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveTrebuchetAssetList($con);

    parent::doSave($con);
  }

  public function saveTrebuchetAssetList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['trebuchet_asset_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->TrebuchetAsset->getPrimaryKeys();
    $values = $this->getValue('trebuchet_asset_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('TrebuchetAsset', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('TrebuchetAsset', array_values($link));
    }
  }

}
