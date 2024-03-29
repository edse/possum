<?php

/**
 * BaseLog
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $user_id
 * @property integer $site_id
 * @property integer $asset
 * @property string $asset_title
 * @property string $action
 * @property string $class
 * @property string $ip
 * @property string $status
 * @property sfGuardUser $User
 * @property Site $Site
 * 
 * @method integer     getUserId()      Returns the current record's "user_id" value
 * @method integer     getSiteId()      Returns the current record's "site_id" value
 * @method integer     getAsset()       Returns the current record's "asset" value
 * @method string      getAssetTitle()  Returns the current record's "asset_title" value
 * @method string      getAction()      Returns the current record's "action" value
 * @method string      getClass()       Returns the current record's "class" value
 * @method string      getIp()          Returns the current record's "ip" value
 * @method string      getStatus()      Returns the current record's "status" value
 * @method sfGuardUser getUser()        Returns the current record's "User" value
 * @method Site        getSite()        Returns the current record's "Site" value
 * @method Log         setUserId()      Sets the current record's "user_id" value
 * @method Log         setSiteId()      Sets the current record's "site_id" value
 * @method Log         setAsset()       Sets the current record's "asset" value
 * @method Log         setAssetTitle()  Sets the current record's "asset_title" value
 * @method Log         setAction()      Sets the current record's "action" value
 * @method Log         setClass()       Sets the current record's "class" value
 * @method Log         setIp()          Sets the current record's "ip" value
 * @method Log         setStatus()      Sets the current record's "status" value
 * @method Log         setUser()        Sets the current record's "User" value
 * @method Log         setSite()        Sets the current record's "Site" value
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseLog extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('log');
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('site_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('asset', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('asset_title', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('action', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('class', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('ip', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('status', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('Site', array(
             'local' => 'site_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable(array(
             'updated' => 'disabled',
             ));
        $this->actAs($timestampable0);
    }
}