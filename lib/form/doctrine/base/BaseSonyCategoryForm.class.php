<?php

/**
 * SonyCategory form base class.
 *
 * @method SonyCategory getObject() Returns the current form's model object
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSonyCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'sony_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'add_empty' => true)),
      'title'            => new sfWidgetFormInputText(),
      'description'      => new sfWidgetFormInputText(),
      'image'            => new sfWidgetFormInputText(),
      'display_order'    => new sfWidgetFormInputText(),
      'is_active'        => new sfWidgetFormInputCheckbox(),
      'created_at'       => new sfWidgetFormDateTime(),
      'updated_at'       => new sfWidgetFormDateTime(),
      'slug'             => new sfWidgetFormInputText(),
      'assets_list'      => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'SonyAsset')),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'sony_category_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'required' => false)),
      'title'            => new sfValidatorString(array('max_length' => 128)),
      'description'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image'            => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'display_order'    => new sfValidatorInteger(array('required' => false)),
      'is_active'        => new sfValidatorBoolean(array('required' => false)),
      'created_at'       => new sfValidatorDateTime(),
      'updated_at'       => new sfValidatorDateTime(),
      'slug'             => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'assets_list'      => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'SonyAsset', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'SonyCategory', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('sony_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SonyCategory';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['assets_list']))
    {
      $this->setDefault('assets_list', $this->object->Assets->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveAssetsList($con);

    parent::doSave($con);
  }

  public function saveAssetsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['assets_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Assets->getPrimaryKeys();
    $values = $this->getValue('assets_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Assets', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Assets', array_values($link));
    }
  }

}
