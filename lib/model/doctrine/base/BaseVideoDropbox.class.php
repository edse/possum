<?php

/**
 * BaseVideoDropbox
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $asset_video_id
 * @property integer $asset_video_gallery_id
 * @property string $youtube_id
 * @property string $action
 * @property string $folder
 * @property string $status
 * @property string $message
 * @property AssetVideo $AssetVideo
 * @property AssetVideoGallery $AssetVideoGallery
 * 
 * @method integer           getAssetVideoId()           Returns the current record's "asset_video_id" value
 * @method integer           getAssetVideoGalleryId()    Returns the current record's "asset_video_gallery_id" value
 * @method string            getYoutubeId()              Returns the current record's "youtube_id" value
 * @method string            getAction()                 Returns the current record's "action" value
 * @method string            getFolder()                 Returns the current record's "folder" value
 * @method string            getStatus()                 Returns the current record's "status" value
 * @method string            getMessage()                Returns the current record's "message" value
 * @method AssetVideo        getAssetVideo()             Returns the current record's "AssetVideo" value
 * @method AssetVideoGallery getAssetVideoGallery()      Returns the current record's "AssetVideoGallery" value
 * @method VideoDropbox      setAssetVideoId()           Sets the current record's "asset_video_id" value
 * @method VideoDropbox      setAssetVideoGalleryId()    Sets the current record's "asset_video_gallery_id" value
 * @method VideoDropbox      setYoutubeId()              Sets the current record's "youtube_id" value
 * @method VideoDropbox      setAction()                 Sets the current record's "action" value
 * @method VideoDropbox      setFolder()                 Sets the current record's "folder" value
 * @method VideoDropbox      setStatus()                 Sets the current record's "status" value
 * @method VideoDropbox      setMessage()                Sets the current record's "message" value
 * @method VideoDropbox      setAssetVideo()             Sets the current record's "AssetVideo" value
 * @method VideoDropbox      setAssetVideoGallery()      Sets the current record's "AssetVideoGallery" value
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVideoDropbox extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('video_dropbox');
        $this->hasColumn('asset_video_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('asset_video_gallery_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('youtube_id', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('action', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('folder', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('status', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('message', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('AssetVideo', array(
             'local' => 'asset_video_id',
             'foreign' => 'id'));

        $this->hasOne('AssetVideoGallery', array(
             'local' => 'asset_video_gallery_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}