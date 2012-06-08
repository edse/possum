<?php

/**
 * Tweet form base class.
 *
 * @method Tweet getObject() Returns the current form's model object
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseTweetForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'tweet_monitor_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('TweetMonitor'), 'add_empty' => false)),
      'twitter_id'       => new sfWidgetFormInputText(),
      'date_published'   => new sfWidgetFormDate(),
      'content'          => new sfWidgetFormInputText(),
      'url'              => new sfWidgetFormInputText(),
      'avatar'           => new sfWidgetFormInputText(),
      'author'           => new sfWidgetFormInputText(),
      'author_url'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'tweet_monitor_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('TweetMonitor'))),
      'twitter_id'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'date_published'   => new sfValidatorDate(),
      'content'          => new sfValidatorPass(),
      'url'              => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'avatar'           => new sfValidatorString(array('max_length' => 255)),
      'author'           => new sfValidatorString(array('max_length' => 255)),
      'author_url'       => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('tweet[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Tweet';
  }

}
