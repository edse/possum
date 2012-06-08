<?php

/**
 * BaseAssetSeason
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $asset_id
 * @property string $headline
 * @property string $number
 * @property string $year
 * @property string $director
 * @property string $url
 * @property Asset $Asset
 * @property Doctrine_Collection $AssetEpisodes
 * 
 * @method integer             getAssetId()       Returns the current record's "asset_id" value
 * @method string              getHeadline()      Returns the current record's "headline" value
 * @method string              getNumber()        Returns the current record's "number" value
 * @method string              getYear()          Returns the current record's "year" value
 * @method string              getDirector()      Returns the current record's "director" value
 * @method string              getUrl()           Returns the current record's "url" value
 * @method Asset               getAsset()         Returns the current record's "Asset" value
 * @method Doctrine_Collection getAssetEpisodes() Returns the current record's "AssetEpisodes" collection
 * @method AssetSeason         setAssetId()       Sets the current record's "asset_id" value
 * @method AssetSeason         setHeadline()      Sets the current record's "headline" value
 * @method AssetSeason         setNumber()        Sets the current record's "number" value
 * @method AssetSeason         setYear()          Sets the current record's "year" value
 * @method AssetSeason         setDirector()      Sets the current record's "director" value
 * @method AssetSeason         setUrl()           Sets the current record's "url" value
 * @method AssetSeason         setAsset()         Sets the current record's "Asset" value
 * @method AssetSeason         setAssetEpisodes() Sets the current record's "AssetEpisodes" collection
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAssetSeason extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('asset_season');
        $this->hasColumn('asset_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('headline', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('number', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('year', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('director', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('url', 'string', 255, array(
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

        $this->hasMany('AssetEpisode as AssetEpisodes', array(
             'local' => 'id',
             'foreign' => 'asset_season_id'));
    }
}