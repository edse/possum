<?php

/**
 * Tweet filter form base class.
 *
 * @package    astolfo
 * @subpackage filter
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseTweetFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'tweet_monitor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TweetMonitor'), 'add_empty' => true)),
      'twitter_id'       => new sfWidgetFormFilterInput(),
      'date_published'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'content'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'url'              => new sfWidgetFormFilterInput(),
      'avatar'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'author'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'author_url'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'tweet_monitor_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('TweetMonitor'), 'column' => 'id')),
      'twitter_id'       => new sfValidatorPass(array('required' => false)),
      'date_published'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'content'          => new sfValidatorPass(array('required' => false)),
      'url'              => new sfValidatorPass(array('required' => false)),
      'avatar'           => new sfValidatorPass(array('required' => false)),
      'author'           => new sfValidatorPass(array('required' => false)),
      'author_url'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('tweet_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tweet';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'tweet_monitor_id' => 'ForeignKey',
      'twitter_id'       => 'Text',
      'date_published'   => 'Date',
      'content'          => 'Text',
      'url'              => 'Text',
      'avatar'           => 'Text',
      'author'           => 'Text',
      'author_url'       => 'Text',
    );
  }
}
