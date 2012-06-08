<?php

/**
 * BaseSectionUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $section_id
 * @property integer $user_id
 * @property string $title
 * @property string $description
 * @property boolean $is_active
 * @property integer $display_order
 * @property Section $Section
 * @property sfGuardUser $User
 * 
 * @method integer     getSectionId()     Returns the current record's "section_id" value
 * @method integer     getUserId()        Returns the current record's "user_id" value
 * @method string      getTitle()         Returns the current record's "title" value
 * @method string      getDescription()   Returns the current record's "description" value
 * @method boolean     getIsActive()      Returns the current record's "is_active" value
 * @method integer     getDisplayOrder()  Returns the current record's "display_order" value
 * @method Section     getSection()       Returns the current record's "Section" value
 * @method sfGuardUser getUser()          Returns the current record's "User" value
 * @method SectionUser setSectionId()     Sets the current record's "section_id" value
 * @method SectionUser setUserId()        Sets the current record's "user_id" value
 * @method SectionUser setTitle()         Sets the current record's "title" value
 * @method SectionUser setDescription()   Sets the current record's "description" value
 * @method SectionUser setIsActive()      Sets the current record's "is_active" value
 * @method SectionUser setDisplayOrder()  Sets the current record's "display_order" value
 * @method SectionUser setSection()       Sets the current record's "Section" value
 * @method SectionUser setUser()          Sets the current record's "User" value
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseSectionUser extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('section_user');
        $this->hasColumn('section_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('user_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
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
        $this->hasColumn('is_active', 'boolean', null, array(
             'type' => 'boolean',
             'notnull' => true,
             'default' => 0,
             ));
        $this->hasColumn('display_order', 'integer', null, array(
             'type' => 'integer',
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
        $this->hasOne('Section', array(
             'local' => 'section_id',
             'foreign' => 'id'));

        $this->hasOne('sfGuardUser as User', array(
             'local' => 'user_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}