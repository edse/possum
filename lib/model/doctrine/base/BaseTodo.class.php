<?php

/**
 * BaseTodo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $parent_id
 * @property integer $user_id
 * @property integer $site_id
 * @property integer $asset_id
 * @property string $title
 * @property string $description
 * @property string $status
 * @property Todo $Parent
 * @property sfGuardUser $User
 * @property Site $Site
 * @property Asset $Asset
 * @property Doctrine_Collection $Children
 * 
 * @method integer             getParentId()    Returns the current record's "parent_id" value
 * @method integer             getUserId()      Returns the current record's "user_id" value
 * @method integer             getSiteId()      Returns the current record's "site_id" value
 * @method integer             getAssetId()     Returns the current record's "asset_id" value
 * @method string              getTitle()       Returns the current record's "title" value
 * @method string              getDescription() Returns the current record's "description" value
 * @method string              getStatus()      Returns the current record's "status" value
 * @method Todo                getParent()      Returns the current record's "Parent" value
 * @method sfGuardUser         getUser()        Returns the current record's "User" value
 * @method Site                getSite()        Returns the current record's "Site" value
 * @method Asset               getAsset()       Returns the current record's "Asset" value
 * @method Doctrine_Collection getChildren()    Returns the current record's "Children" collection
 * @method Todo                setParentId()    Sets the current record's "parent_id" value
 * @method Todo                setUserId()      Sets the current record's "user_id" value
 * @method Todo                setSiteId()      Sets the current record's "site_id" value
 * @method Todo                setAssetId()     Sets the current record's "asset_id" value
 * @method Todo                setTitle()       Sets the current record's "title" value
 * @method Todo                setDescription() Sets the current record's "description" value
 * @method Todo                setStatus()      Sets the current record's "status" value
 * @method Todo                setParent()      Sets the current record's "Parent" value
 * @method Todo                setUser()        Sets the current record's "User" value
 * @method Todo                setSite()        Sets the current record's "Site" value
 * @method Todo                setAsset()       Sets the current record's "Asset" value
 * @method Todo                setChildren()    Sets the current record's "Children" collection
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseTodo extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('todo');
        $this->hasColumn('parent_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('site_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('asset_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('status', 'string', 255, array(
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
        $this->hasOne('Todo as Parent', array(
             'local' => 'parent_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $this->hasOne('Site', array(
             'local' => 'site_id',
             'foreign' => 'id'));

        $this->hasOne('Asset', array(
             'local' => 'asset_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('Todo as Children', array(
             'local' => 'id',
             'foreign' => 'parent_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable();
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}