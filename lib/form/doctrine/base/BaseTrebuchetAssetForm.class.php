<?php

/**
 * TrebuchetAsset form base class.
 *
 * @method TrebuchetAsset getObject() Returns the current form's model object
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTrebuchetAssetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                        => new sfWidgetFormInputHidden(),
      'youtube_id'                => new sfWidgetFormInputText(),
      'title'                     => new sfWidgetFormInputText(),
      'description'               => new sfWidgetFormInputText(),
      'image'                     => new sfWidgetFormInputText(),
      'file1'                     => new sfWidgetFormInputText(),
      'file2'                     => new sfWidgetFormInputText(),
      'rating'                    => new sfWidgetFormInputText(),
      'duration'                  => new sfWidgetFormInputText(),
      'display_order'             => new sfWidgetFormInputText(),
      'is_active'                 => new sfWidgetFormInputCheckbox(),
      'created_at'                => new sfWidgetFormDateTime(),
      'updated_at'                => new sfWidgetFormDateTime(),
      'slug'                      => new sfWidgetFormInputText(),
      'trebuchet_categories_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'TrebuchetCategory')),
    ));

    $this->setValidators(array(
      'id'                        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'youtube_id'                => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'title'                     => new sfValidatorString(array('max_length' => 128)),
      'description'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'image'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'file1'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'file2'                     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'rating'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'duration'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'display_order'             => new sfValidatorInteger(array('required' => false)),
      'is_active'                 => new sfValidatorBoolean(array('required' => false)),
      'created_at'                => new sfValidatorDateTime(),
      'updated_at'                => new sfValidatorDateTime(),
      'slug'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'trebuchet_categories_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'TrebuchetCategory', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'TrebuchetAsset', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('trebuchet_asset[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'TrebuchetAsset';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['trebuchet_categories_list']))
    {
      $this->setDefault('trebuchet_categories_list', $this->object->TrebuchetCategories->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveTrebuchetCategoriesList($con);

    parent::doSave($con);
  }

  public function saveTrebuchetCategoriesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['trebuchet_categories_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->TrebuchetCategories->getPrimaryKeys();
    $values = $this->getValue('trebuchet_categories_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('TrebuchetCategories', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('TrebuchetCategories', array_values($link));
    }
  }

}
