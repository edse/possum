<?php

/**
 * AssetAnswer form.
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssetAnswerForm extends BaseAssetAnswerForm
{
  public function configure()
  {
    //$this->widgetSchema['asset_id'] = new sfWidgetFormInputText(array(), array('style' => 'width: 80px;'));
    unset($this['asset_id']);
    $this->widgetSchema['answer'] = new sfWidgetFormInputText(array(), array('style' => 'width: 350px;'));
  }
}
