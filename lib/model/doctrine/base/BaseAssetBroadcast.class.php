<?php

/**
 * BaseAssetBroadcast
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $asset_id
 * @property string $number
 * @property string $headline
 * @property string $headline_long
 * @property timestamp $date_recording_start
 * @property timestamp $date_recording_end
 * @property timestamp $date_exibition_start
 * @property timestamp $date_exibition_end
 * @property string $cam1
 * @property string $cam2
 * @property string $cam3
 * @property string $cam4
 * @property Asset $Asset
 * 
 * @method integer        getAssetId()              Returns the current record's "asset_id" value
 * @method string         getNumber()               Returns the current record's "number" value
 * @method string         getHeadline()             Returns the current record's "headline" value
 * @method string         getHeadlineLong()         Returns the current record's "headline_long" value
 * @method timestamp      getDateRecordingStart()   Returns the current record's "date_recording_start" value
 * @method timestamp      getDateRecordingEnd()     Returns the current record's "date_recording_end" value
 * @method timestamp      getDateExibitionStart()   Returns the current record's "date_exibition_start" value
 * @method timestamp      getDateExibitionEnd()     Returns the current record's "date_exibition_end" value
 * @method string         getCam1()                 Returns the current record's "cam1" value
 * @method string         getCam2()                 Returns the current record's "cam2" value
 * @method string         getCam3()                 Returns the current record's "cam3" value
 * @method string         getCam4()                 Returns the current record's "cam4" value
 * @method Asset          getAsset()                Returns the current record's "Asset" value
 * @method AssetBroadcast setAssetId()              Sets the current record's "asset_id" value
 * @method AssetBroadcast setNumber()               Sets the current record's "number" value
 * @method AssetBroadcast setHeadline()             Sets the current record's "headline" value
 * @method AssetBroadcast setHeadlineLong()         Sets the current record's "headline_long" value
 * @method AssetBroadcast setDateRecordingStart()   Sets the current record's "date_recording_start" value
 * @method AssetBroadcast setDateRecordingEnd()     Sets the current record's "date_recording_end" value
 * @method AssetBroadcast setDateExibitionStart()   Sets the current record's "date_exibition_start" value
 * @method AssetBroadcast setDateExibitionEnd()     Sets the current record's "date_exibition_end" value
 * @method AssetBroadcast setCam1()                 Sets the current record's "cam1" value
 * @method AssetBroadcast setCam2()                 Sets the current record's "cam2" value
 * @method AssetBroadcast setCam3()                 Sets the current record's "cam3" value
 * @method AssetBroadcast setCam4()                 Sets the current record's "cam4" value
 * @method AssetBroadcast setAsset()                Sets the current record's "Asset" value
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAssetBroadcast extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('asset_broadcast');
        $this->hasColumn('asset_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('number', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('headline', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('headline_long', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('date_recording_start', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('date_recording_end', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('date_exibition_start', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('date_exibition_end', 'timestamp', null, array(
             'type' => 'timestamp',
             ));
        $this->hasColumn('cam1', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('cam2', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cam3', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('cam4', 'string', 255, array(
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