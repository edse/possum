<?php

/**
 * TrebuchetCategory filter form base class.
 *
 * @package    astolfo
 * @subpackage filter
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTrebuchetCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'trebuchet_category_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Parent'), 'add_empty' => true)),
      'title'                 => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'           => new sfWidgetFormFilterInput(),
      'image'                 => new sfWidgetFormFilterInput(),
      'display_order'         => new sfWidgetFormFilterInput(),
      'is_active'             => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'            => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'slug'                  => new sfWidgetFormFilterInput(),
      'trebuchet_asset_list'  => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'TrebuchetAsset')),
    ));

    $this->setValidators(array(
      'trebuchet_category_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Parent'), 'column' => 'id')),
      'title'                 => new sfValidatorPass(array('required' => false)),
      'description'           => new sfValidatorPass(array('required' => false)),
      'image'                 => new sfValidatorPass(array('required' => false)),
      'display_order'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'is_active'             => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'            => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'slug'                  => new sfValidatorPass(array('required' => false)),
      'trebuchet_asset_list'  => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'TrebuchetAsset', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('trebuchet_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addTrebuchetAssetListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.TrebuchetCategoryAsset TrebuchetCategoryAsset')
      ->andWhereIn('TrebuchetCategoryAsset.trebuchet_asset_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'TrebuchetCategory';
  }

  public function getFields()
  {
    return array(
      'id'                    => 'Number',
      'trebuchet_category_id' => 'ForeignKey',
      'title'                 => 'Text',
      'description'           => 'Text',
      'image'                 => 'Text',
      'display_order'         => 'Number',
      'is_active'             => 'Boolean',
      'created_at'            => 'Date',
      'updated_at'            => 'Date',
      'slug'                  => 'Text',
      'trebuchet_asset_list'  => 'ManyKey',
    );
  }
}
