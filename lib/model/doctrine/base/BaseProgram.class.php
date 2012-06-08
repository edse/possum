<?php

/**
 * BaseProgram
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $site_id
 * @property integer $channel_id
 * @property string $type
 * @property string $title
 * @property string $description
 * @property text $long_description
 * @property string $schedule
 * @property string $image_icon
 * @property string $image_thumb
 * @property string $image_live
 * @property string $tv_rating
 * @property string $tv_category
 * @property boolean $is_active
 * @property boolean $is_in_menu
 * @property boolean $is_a_course
 * @property Channel $Channel
 * @property Doctrine_Collection $Channels
 * @property Site $Site
 * @property Doctrine_Collection $ChannelProgram
 * @property Doctrine_Collection $Schedules
 * 
 * @method integer             getSiteId()           Returns the current record's "site_id" value
 * @method integer             getChannelId()        Returns the current record's "channel_id" value
 * @method string              getType()             Returns the current record's "type" value
 * @method string              getTitle()            Returns the current record's "title" value
 * @method string              getDescription()      Returns the current record's "description" value
 * @method text                getLongDescription()  Returns the current record's "long_description" value
 * @method string              getSchedule()         Returns the current record's "schedule" value
 * @method string              getImageIcon()        Returns the current record's "image_icon" value
 * @method string              getImageThumb()       Returns the current record's "image_thumb" value
 * @method string              getImageLive()        Returns the current record's "image_live" value
 * @method string              getTvRating()         Returns the current record's "tv_rating" value
 * @method string              getTvCategory()       Returns the current record's "tv_category" value
 * @method boolean             getIsActive()         Returns the current record's "is_active" value
 * @method boolean             getIsInMenu()         Returns the current record's "is_in_menu" value
 * @method boolean             getIsACourse()        Returns the current record's "is_a_course" value
 * @method Channel             getChannel()          Returns the current record's "Channel" value
 * @method Doctrine_Collection getChannels()         Returns the current record's "Channels" collection
 * @method Site                getSite()             Returns the current record's "Site" value
 * @method Doctrine_Collection getChannelProgram()   Returns the current record's "ChannelProgram" collection
 * @method Doctrine_Collection getSchedules()        Returns the current record's "Schedules" collection
 * @method Program             setSiteId()           Sets the current record's "site_id" value
 * @method Program             setChannelId()        Sets the current record's "channel_id" value
 * @method Program             setType()             Sets the current record's "type" value
 * @method Program             setTitle()            Sets the current record's "title" value
 * @method Program             setDescription()      Sets the current record's "description" value
 * @method Program             setLongDescription()  Sets the current record's "long_description" value
 * @method Program             setSchedule()         Sets the current record's "schedule" value
 * @method Program             setImageIcon()        Sets the current record's "image_icon" value
 * @method Program             setImageThumb()       Sets the current record's "image_thumb" value
 * @method Program             setImageLive()        Sets the current record's "image_live" value
 * @method Program             setTvRating()         Sets the current record's "tv_rating" value
 * @method Program             setTvCategory()       Sets the current record's "tv_category" value
 * @method Program             setIsActive()         Sets the current record's "is_active" value
 * @method Program             setIsInMenu()         Sets the current record's "is_in_menu" value
 * @method Program             setIsACourse()        Sets the current record's "is_a_course" value
 * @method Program             setChannel()          Sets the current record's "Channel" value
 * @method Program             setChannels()         Sets the current record's "Channels" collection
 * @method Program             setSite()             Sets the current record's "Site" value
 * @method Program             setChannelProgram()   Sets the current record's "ChannelProgram" collection
 * @method Program             setSchedules()        Sets the current record's "Schedules" collection
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseProgram extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('program');
        $this->hasColumn('site_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('channel_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('type', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
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
        $this->hasColumn('long_description', 'text', 610, array(
             'type' => 'text',
             'length' => 610,
             ));
        $this->hasColumn('schedule', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('image_icon', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('image_thumb', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('image_live', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('tv_rating', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('tv_category', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('is_in_menu', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));
        $this->hasColumn('is_a_course', 'boolean', null, array(
             'type' => 'boolean',
             'default' => 0,
             ));


        $this->index('is_active_idx', array(
             'fields' => 
             array(
              0 => 'is_active',
             ),
             ));
        $this->index('is_in_menu_idx', array(
             'fields' => 
             array(
              0 => 'is_in_menu',
             ),
             ));
        $this->index('is_a_course_idx', array(
             'fields' => 
             array(
              0 => 'is_a_course',
             ),
             ));
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Channel', array(
             'local' => 'channel_id',
             'foreign' => 'id'));

        $this->hasMany('Channel as Channels', array(
             'refClass' => 'ChannelProgram',
             'local' => 'program_id',
             'foreign' => 'channel_id'));

        $this->hasOne('Site', array(
             'local' => 'site_id',
             'foreign' => 'id'));

        $this->hasMany('ChannelProgram', array(
             'local' => 'id',
             'foreign' => 'program_id'));

        $this->hasMany('Schedule as Schedules', array(
             'local' => 'id',
             'foreign' => 'program_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable();
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}