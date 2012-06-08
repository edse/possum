<?php

/**
 * BaseSchedule
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $channel_id
 * @property integer $program_id
 * @property string $type
 * @property string $title
 * @property text $description
 * @property text $description_short
 * @property string $image
 * @property string $tv_rating
 * @property string $tv_category
 * @property string $image_source
 * @property timestamp $date_start
 * @property timestamp $date_end
 * @property boolean $is_active
 * @property boolean $is_important
 * @property boolean $is_live
 * @property boolean $is_geoblocked
 * @property string $url
 * @property Channel $Channel
 * @property Program $Program
 * 
 * @method integer   getChannelId()         Returns the current record's "channel_id" value
 * @method integer   getProgramId()         Returns the current record's "program_id" value
 * @method string    getType()              Returns the current record's "type" value
 * @method string    getTitle()             Returns the current record's "title" value
 * @method text      getDescription()       Returns the current record's "description" value
 * @method text      getDescriptionShort()  Returns the current record's "description_short" value
 * @method string    getImage()             Returns the current record's "image" value
 * @method string    getTvRating()          Returns the current record's "tv_rating" value
 * @method string    getTvCategory()        Returns the current record's "tv_category" value
 * @method string    getImageSource()       Returns the current record's "image_source" value
 * @method timestamp getDateStart()         Returns the current record's "date_start" value
 * @method timestamp getDateEnd()           Returns the current record's "date_end" value
 * @method boolean   getIsActive()          Returns the current record's "is_active" value
 * @method boolean   getIsImportant()       Returns the current record's "is_important" value
 * @method boolean   getIsLive()            Returns the current record's "is_live" value
 * @method boolean   getIsGeoblocked()      Returns the current record's "is_geoblocked" value
 * @method string    getUrl()               Returns the current record's "url" value
 * @method Channel   getChannel()           Returns the current record's "Channel" value
 * @method Program   getProgram()           Returns the current record's "Program" value
 * @method Schedule  setChannelId()         Sets the current record's "channel_id" value
 * @method Schedule  setProgramId()         Sets the current record's "program_id" value
 * @method Schedule  setType()              Sets the current record's "type" value
 * @method Schedule  setTitle()             Sets the current record's "title" value
 * @method Schedule  setDescription()       Sets the current record's "description" value
 * @method Schedule  setDescriptionShort()  Sets the current record's "description_short" value
 * @method Schedule  setImage()             Sets the current record's "image" value
 * @method Schedule  setTvRating()          Sets the current record's "tv_rating" value
 * @method Schedule  setTvCategory()        Sets the current record's "tv_category" value
 * @method Schedule  setImageSource()       Sets the current record's "image_source" value
 * @method Schedule  setDateStart()         Sets the current record's "date_start" value
 * @method Schedule  setDateEnd()           Sets the current record's "date_end" value
 * @method Schedule  setIsActive()          Sets the current record's "is_active" value
 * @method Schedule  setIsImportant()       Sets the current record's "is_important" value
 * @method Schedule  setIsLive()            Sets the current record's "is_live" value
 * @method Schedule  setIsGeoblocked()      Sets the current record's "is_geoblocked" value
 * @method Schedule  setUrl()               Sets the current record's "url" value
 * @method Schedule  setChannel()           Sets the current record's "Channel" value
 * @method Schedule  setProgram()           Sets the current record's "Program" value
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSchedule extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('schedule');
        $this->hasColumn('channel_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('program_id', 'integer', null, array(
             'type' => 'integer',
             ));
        $this->hasColumn('type', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('title', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('description', 'text', 610, array(
             'type' => 'text',
             'length' => 610,
             ));
        $this->hasColumn('description_short', 'text', 255, array(
             'type' => 'text',
             'length' => 255,
             ));
        $this->hasColumn('image', 'string', 255, array(
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
        $this->hasColumn('image_source', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('date_start', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('date_end', 'timestamp', null, array(
             'type' => 'timestamp',
             'notnull' => true,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 1,
             ));
        $this->hasColumn('is_important', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('is_live', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('is_geoblocked', 'boolean', null, array(
             'type' => 'boolean',
             'default' => false,
             ));
        $this->hasColumn('url', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));


        $this->index('is_active_idx', array(
             'fields' => 
             array(
              0 => 'is_active',
             ),
             ));
        $this->index('is_important_idx', array(
             'fields' => 
             array(
              0 => 'is_important',
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

        $this->hasOne('Program', array(
             'local' => 'program_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}