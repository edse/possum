<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version14 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('video_dropbox', 'video_dropbox_asset_video_gallery_id_asset_video_gallery_id', array(
             'name' => 'video_dropbox_asset_video_gallery_id_asset_video_gallery_id',
             'local' => 'asset_video_gallery_id',
             'foreign' => 'id',
             'foreignTable' => 'asset_video_gallery',
             ));
        $this->addIndex('video_dropbox', 'video_dropbox_asset_video_gallery_id', array(
             'fields' => 
             array(
              0 => 'asset_video_gallery_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('video_dropbox', 'video_dropbox_asset_video_gallery_id_asset_video_gallery_id');
        $this->removeIndex('video_dropbox', 'video_dropbox_asset_video_gallery_id', array(
             'fields' => 
             array(
              0 => 'asset_video_gallery_id',
             ),
             ));
    }
}