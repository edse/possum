<?php

/**
 * BaseSite
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property string $type
 * @property string $title
 * @property string $description
 * @property string $url
 * @property string $path
 * @property string $headline
 * @property string $meta_title
 * @property string $meta_charset
 * @property string $meta_classification
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $meta_author
 * @property string $youtube_channel
 * @property string $youtube_genre
 * @property string $twitter_account
 * @property string $twitter_url
 * @property string $facebook_url
 * @property string $image_icon
 * @property string $image_thumb
 * @property string $contact_email
 * @property boolean $is_active
 * @property Program $Program
 * @property Doctrine_Collection $Assets
 * @property Doctrine_Collection $Sections
 * @property Doctrine_Collection $Users
 * @property Doctrine_Collection $SiteUser
 * @property Doctrine_Collection $Todos
 * @property Doctrine_Collection $Logs
 * @property Doctrine_Collection $Tasks
 * 
 * @method string              getType()                Returns the current record's "type" value
 * @method string              getTitle()               Returns the current record's "title" value
 * @method string              getDescription()         Returns the current record's "description" value
 * @method string              getUrl()                 Returns the current record's "url" value
 * @method string              getPath()                Returns the current record's "path" value
 * @method string              getHeadline()            Returns the current record's "headline" value
 * @method string              getMetaTitle()           Returns the current record's "meta_title" value
 * @method string              getMetaCharset()         Returns the current record's "meta_charset" value
 * @method string              getMetaClassification()  Returns the current record's "meta_classification" value
 * @method string              getMetaDescription()     Returns the current record's "meta_description" value
 * @method string              getMetaKeywords()        Returns the current record's "meta_keywords" value
 * @method string              getMetaAuthor()          Returns the current record's "meta_author" value
 * @method string              getYoutubeChannel()      Returns the current record's "youtube_channel" value
 * @method string              getYoutubeGenre()        Returns the current record's "youtube_genre" value
 * @method string              getTwitterAccount()      Returns the current record's "twitter_account" value
 * @method string              getTwitterUrl()          Returns the current record's "twitter_url" value
 * @method string              getFacebookUrl()         Returns the current record's "facebook_url" value
 * @method string              getImageIcon()           Returns the current record's "image_icon" value
 * @method string              getImageThumb()          Returns the current record's "image_thumb" value
 * @method string              getContactEmail()        Returns the current record's "contact_email" value
 * @method boolean             getIsActive()            Returns the current record's "is_active" value
 * @method Program             getProgram()             Returns the current record's "Program" value
 * @method Doctrine_Collection getAssets()              Returns the current record's "Assets" collection
 * @method Doctrine_Collection getSections()            Returns the current record's "Sections" collection
 * @method Doctrine_Collection getUsers()               Returns the current record's "Users" collection
 * @method Doctrine_Collection getSiteUser()            Returns the current record's "SiteUser" collection
 * @method Doctrine_Collection getTodos()               Returns the current record's "Todos" collection
 * @method Doctrine_Collection getLogs()                Returns the current record's "Logs" collection
 * @method Doctrine_Collection getTasks()               Returns the current record's "Tasks" collection
 * @method Site                setType()                Sets the current record's "type" value
 * @method Site                setTitle()               Sets the current record's "title" value
 * @method Site                setDescription()         Sets the current record's "description" value
 * @method Site                setUrl()                 Sets the current record's "url" value
 * @method Site                setPath()                Sets the current record's "path" value
 * @method Site                setHeadline()            Sets the current record's "headline" value
 * @method Site                setMetaTitle()           Sets the current record's "meta_title" value
 * @method Site                setMetaCharset()         Sets the current record's "meta_charset" value
 * @method Site                setMetaClassification()  Sets the current record's "meta_classification" value
 * @method Site                setMetaDescription()     Sets the current record's "meta_description" value
 * @method Site                setMetaKeywords()        Sets the current record's "meta_keywords" value
 * @method Site                setMetaAuthor()          Sets the current record's "meta_author" value
 * @method Site                setYoutubeChannel()      Sets the current record's "youtube_channel" value
 * @method Site                setYoutubeGenre()        Sets the current record's "youtube_genre" value
 * @method Site                setTwitterAccount()      Sets the current record's "twitter_account" value
 * @method Site                setTwitterUrl()          Sets the current record's "twitter_url" value
 * @method Site                setFacebookUrl()         Sets the current record's "facebook_url" value
 * @method Site                setImageIcon()           Sets the current record's "image_icon" value
 * @method Site                setImageThumb()          Sets the current record's "image_thumb" value
 * @method Site                setContactEmail()        Sets the current record's "contact_email" value
 * @method Site                setIsActive()            Sets the current record's "is_active" value
 * @method Site                setProgram()             Sets the current record's "Program" value
 * @method Site                setAssets()              Sets the current record's "Assets" collection
 * @method Site                setSections()            Sets the current record's "Sections" collection
 * @method Site                setUsers()               Sets the current record's "Users" collection
 * @method Site                setSiteUser()            Sets the current record's "SiteUser" collection
 * @method Site                setTodos()               Sets the current record's "Todos" collection
 * @method Site                setLogs()                Sets the current record's "Logs" collection
 * @method Site                setTasks()               Sets the current record's "Tasks" collection
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSite extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('site');
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
        $this->hasColumn('url', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('path', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('headline', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('meta_title', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('meta_charset', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('meta_classification', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('meta_description', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('meta_keywords', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('meta_author', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('youtube_channel', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('youtube_genre', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('twitter_account', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('twitter_url', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('facebook_url', 'string', 255, array(
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
        $this->hasColumn('contact_email', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));


        $this->index('is_active_idx', array(
             'fields' => 
             array(
              0 => 'is_active',
             ),
             ));
        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Program', array(
             'local' => 'id',
             'foreign' => 'site_id'));

        $this->hasMany('Asset as Assets', array(
             'local' => 'id',
             'foreign' => 'site_id'));

        $this->hasMany('Section as Sections', array(
             'local' => 'id',
             'foreign' => 'site_id',
             'onDelete' => 'CASCADE'));

        $this->hasMany('sfGuardUser as Users', array(
             'refClass' => 'SiteUser',
             'local' => 'site_id',
             'foreign' => 'user_id'));

        $this->hasMany('SiteUser', array(
             'local' => 'id',
             'foreign' => 'site_id'));

        $this->hasMany('Todo as Todos', array(
             'local' => 'id',
             'foreign' => 'site_id'));

        $this->hasMany('Log as Logs', array(
             'local' => 'id',
             'foreign' => 'site_id'));

        $this->hasMany('Task as Tasks', array(
             'local' => 'id',
             'foreign' => 'site_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $sluggable0 = new Doctrine_Template_Sluggable();
        $this->actAs($timestampable0);
        $this->actAs($sluggable0);
    }
}