<?php

/**
 * AssetEpisode form.
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssetEpisodeForm extends BaseAssetEpisodeForm
{
  public function configure()
  {
    
    unset($this['asset_id']);
    $this->widgetSchema['long_description'] = new sfWidgetFormTextarea(array(), array('style' => 'width: 450px; height: 130px;'));

    $this->widgetSchema['date_record'] = new sfWidgetAstolfoDateTimeForm(array(
     'image' => '/images/calendar.gif'
    ));

    $this->widgetSchema['date_release'] = new sfWidgetAstolfoDateTimeForm(array(
     'image' => '/images/calendar.gif'
    ));

    if($this->object->Asset->site_id > 0){
      $q = Doctrine_Query::create()
        ->select('as.*')
        ->from('AssetSeason as, Asset a')
        ->where('a.is_active = ?', true)
        ->andWhere('a.site_id = ?', $this->object->Asset->site_id)
        ->andWhere('as.asset_id = a.id')
        ->orderBy('a.title');
    }else{
      $q = Doctrine_Query::create()
        ->select('as.*')
        ->from('AssetSeason as, Asset a')
        ->where('a.is_active = ?', true)
        ->andWhere('as.asset_id = a.id')
        ->orderBy('a.title');
    }
    $this->widgetSchema['asset_season_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'AssetSeason',
      'add_empty' => true,
      'query'     => $q
    ));
  }
}
