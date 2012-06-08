<?php

/**
 * AssetQuestion form.
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssetQuestionForm extends BaseAssetQuestionForm
{
  public function configure()
  {
    
    unset($this['asset_id']);
    
    $this->setDefault('spreadsheet_id', '0AgqQkuT709hhdHFpSjM0SlFac3V3bGVPa0V0MDExeXc');
    
    if($this->object->id){
      $asset = Doctrine_Core::getTable('Asset')->find($this->object->id);
      //$this->embedRelation('AssetAnswers');
    }

  }
}

