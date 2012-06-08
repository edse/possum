<?php

/**
 * VideoDropbox form.
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VideoDropboxForm extends BaseVideoDropboxForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    $this->widgetSchema['asset_video_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['asset_video_gallery_id'] = new sfWidgetFormInputHidden();
    /*
    $this->widgetSchema['AssetVideo'] = new sfWidgetAstolfoTextPlainForm("AssetVideo", $this->object->getAssetVideoId());
    $this->widgetSchema['AssetVideoGallery'] = new sfWidgetAstolfoTextPlainForm("AssetVideoGallery", $this->object->getAssetVideoGalleryId());
    */
    $this->setValidator('asset_video_id' , new sfValidatorString(array('required'  => false)));
    $this->setValidator('asset_video_gallery_id' , new sfValidatorString(array('required'  => false)));
  }
}
