<?php

/**
 * BaseChannelProgram
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $channel_id
 * @property integer $program_id
 * @property Channel $Channel
 * @property Program $Program
 * 
 * @method integer        getChannelId()  Returns the current record's "channel_id" value
 * @method integer        getProgramId()  Returns the current record's "program_id" value
 * @method Channel        getChannel()    Returns the current record's "Channel" value
 * @method Program        getProgram()    Returns the current record's "Program" value
 * @method ChannelProgram setChannelId()  Sets the current record's "channel_id" value
 * @method ChannelProgram setProgramId()  Sets the current record's "program_id" value
 * @method ChannelProgram setChannel()    Sets the current record's "Channel" value
 * @method ChannelProgram setProgram()    Sets the current record's "Program" value
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseChannelProgram extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('channel_program');
        $this->hasColumn('channel_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('program_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Channel', array(
             'local' => 'channel_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Program', array(
             'local' => 'program_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}