<?php

/**
 * SonyAsset form base class.
 *
 * @method SonyAsset getObject() Returns the current form's model object
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSonyAssetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'youtube_id'           => new sfWidgetFormInputText(),
      'title'                => new sfWidgetFormInputText(),
      'description'          => new sfWidgetFormInputText(),
      'image'                => new sfWidgetFormInputText(),
      'file1'                => new sfWidgetFormInputText(),
      'file2'                => new sfWidgetFormInputText(),
      'rating'               => new sfWidgetFormInputText(),
      'duration'             => new sfWidgetFormInputText(),
      'display_order'        => new sfWidgetFormInputText(),
      'is_active'            => new sfWidgetFormInputCheckbox(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'slug'                 => new sfWidgetFormInputText(),
      'sony_categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SonyCategory')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'youtube_id'           => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'title'                => new sfValidatorString(array('max_length' => 128)),
      'description'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'file1'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'file2'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'rating'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'duration'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'display_order'        => new sfValidatorInteger(array('required' => false)),
      'is_active'            => new sfValidatorBoolean(array('required' => false)),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(),
      'slug'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sony_categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SonyCategory', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'SonyAsset', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('sony_asset[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SonyAsset';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['sony_categories_list']))
    {
      $this->setDefault('sony_categories_list', $this->object->SonyCategories->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveSonyCategoriesList($con);

    parent::doSave($con);
  }

  public function saveSonyCategoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sony_categories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->SonyCategories->getPrimaryKeys();
    $values = $this->getValue('sony_categories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('SonyCategories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('SonyCategories', array_values($link));
    }
  }

}
