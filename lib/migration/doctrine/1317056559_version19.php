<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version19 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->dropTable('asset_tweet');
        $this->createTable('tweet', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'asset_tweet_monitor_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '8',
             ),
             'date_published' => 
             array(
              'type' => 'date',
              'notnull' => '1',
              'length' => '25',
             ),
             'content' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             'url' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'avatar' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             'author' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             'author_url' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
    }

    public function down()
    {
        $this->createTable('asset_tweet', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'asset_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '8',
             ),
             'asset_tweet_monitor_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '8',
             ),
             'date_published' => 
             array(
              'type' => 'date',
              'notnull' => '1',
              'length' => '25',
             ),
             'content' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             'url' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'avatar' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             'author' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             'author_url' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '255',
             ),
             ), array(
             'type' => '',
             'indexes' => 
             array(
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
        $this->dropTable('tweet');
    }
}