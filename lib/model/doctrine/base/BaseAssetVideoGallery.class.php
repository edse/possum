<?php

/**
 * BaseAssetVideoGallery
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $asset_id
 * @property string $youtube_id
 * @property string $headline
 * @property string $source
 * @property Asset $Asset
 * @property Doctrine_Collection $VideoDropboxes
 * 
 * @method integer             getAssetId()        Returns the current record's "asset_id" value
 * @method string              getYoutubeId()      Returns the current record's "youtube_id" value
 * @method string              getHeadline()       Returns the current record's "headline" value
 * @method string              getSource()         Returns the current record's "source" value
 * @method Asset               getAsset()          Returns the current record's "Asset" value
 * @method Doctrine_Collection getVideoDropboxes() Returns the current record's "VideoDropboxes" collection
 * @method AssetVideoGallery   setAssetId()        Sets the current record's "asset_id" value
 * @method AssetVideoGallery   setYoutubeId()      Sets the current record's "youtube_id" value
 * @method AssetVideoGallery   setHeadline()       Sets the current record's "headline" value
 * @method AssetVideoGallery   setSource()         Sets the current record's "source" value
 * @method AssetVideoGallery   setAsset()          Sets the current record's "Asset" value
 * @method AssetVideoGallery   setVideoDropboxes() Sets the current record's "VideoDropboxes" collection
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAssetVideoGallery extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('asset_video_gallery');
        $this->hasColumn('asset_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('youtube_id', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('headline', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('source', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Asset', array(
             'local' => 'asset_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('VideoDropbox as VideoDropboxes', array(
             'local' => 'id',
             'foreign' => 'asset_video_gallery_id'));
    }
}