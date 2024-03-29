<?php

/**
 * BaseAssetLink
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $asset_id
 * @property string $name
 * @property string $url
 * @property string $target
 * @property Asset $Asset
 * 
 * @method integer   getAssetId()  Returns the current record's "asset_id" value
 * @method string    getName()     Returns the current record's "name" value
 * @method string    getUrl()      Returns the current record's "url" value
 * @method string    getTarget()   Returns the current record's "target" value
 * @method Asset     getAsset()    Returns the current record's "Asset" value
 * @method AssetLink setAssetId()  Sets the current record's "asset_id" value
 * @method AssetLink setName()     Sets the current record's "name" value
 * @method AssetLink setUrl()      Sets the current record's "url" value
 * @method AssetLink setTarget()   Sets the current record's "target" value
 * @method AssetLink setAsset()    Sets the current record's "Asset" value
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAssetLink extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('asset_link');
        $this->hasColumn('asset_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('url', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('target', 'string', 255, array(
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
    }
}