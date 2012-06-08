<?php

/**
 * AssetEvent form.
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssetEventForm extends BaseAssetEventForm
{
  public function configure()
  {
    unset($this['asset_id']);

    $this->widgetSchema['description'] = new sfWidgetFormTextarea(array(), array('style' => 'width: 450px; height: 130px;'));
    $this->widgetSchema['headline'] = new sfWidgetFormInputText(array(), array('style' => 'width: 450px;'));
    $this->widgetSchema['directions'] = new sfWidgetFormTextarea(array(), array('style' => 'width: 450px; height: 130px;'));
    
    $this->widgetSchema['date'] = new sfWidgetAstolfoDateTimeForm(array(
     'image' => '/images/calendar.gif'
    ));

  }
}
