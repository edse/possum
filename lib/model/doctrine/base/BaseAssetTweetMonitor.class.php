<?php

/**
 * BaseAssetTweetMonitor
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $asset_id
 * @property string $query
 * @property Asset $Asset
 * @property Doctrine_Collection $Tweets
 * 
 * @method integer             getAssetId()  Returns the current record's "asset_id" value
 * @method string              getQuery()    Returns the current record's "query" value
 * @method Asset               getAsset()    Returns the current record's "Asset" value
 * @method Doctrine_Collection getTweets()   Returns the current record's "Tweets" collection
 * @method AssetTweetMonitor   setAssetId()  Sets the current record's "asset_id" value
 * @method AssetTweetMonitor   setQuery()    Sets the current record's "query" value
 * @method AssetTweetMonitor   setAsset()    Sets the current record's "Asset" value
 * @method AssetTweetMonitor   setTweets()   Sets the current record's "Tweets" collection
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAssetTweetMonitor extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('asset_tweet_monitor');
        $this->hasColumn('asset_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('query', 'string', 255, array(
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
        $this->hasOne('Asset', array(
             'local' => 'asset_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Tweet as Tweets', array(
             'local' => 'id',
             'foreign' => 'asset_tweet_monitor_id'));
    }
}