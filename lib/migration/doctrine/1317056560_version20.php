<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version20 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('tweet', 'tweet_asset_tweet_monitor_id_asset_tweet_monitor_id', array(
             'name' => 'tweet_asset_tweet_monitor_id_asset_tweet_monitor_id',
             'local' => 'asset_tweet_monitor_id',
             'foreign' => 'id',
             'foreignTable' => 'asset_tweet_monitor',
             ));
        $this->addIndex('tweet', 'tweet_asset_tweet_monitor_id', array(
             'fields' => 
             array(
              0 => 'asset_tweet_monitor_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('tweet', 'tweet_asset_tweet_monitor_id_asset_tweet_monitor_id');
        $this->removeIndex('tweet', 'tweet_asset_tweet_monitor_id', array(
             'fields' => 
             array(
              0 => 'asset_tweet_monitor_id',
             ),
             ));
    }
}