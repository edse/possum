<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version46 extends Doctrine_Migration_Base
{
    public function up()
    {

        $this->createForeignKey('sony_category', 'sony_category_sony_category_id_sony_category_id', array(
             'name' => 'sony_category_sony_category_id_sony_category_id',
             'local' => 'sony_category_id',
             'foreign' => 'id',
             'foreignTable' => 'sony_category',
             ));
        $this->createForeignKey('sony_category_asset', 'sony_category_asset_sony_category_id_sony_category_id', array(
             'name' => 'sony_category_asset_sony_category_id_sony_category_id',
             'local' => 'sony_category_id',
             'foreign' => 'id',
             'foreignTable' => 'sony_category',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('sony_category_asset', 'sony_category_asset_sony_asset_id_sony_asset_id', array(
             'name' => 'sony_category_asset_sony_asset_id_sony_asset_id',
             'local' => 'sony_asset_id',
             'foreign' => 'id',
             'foreignTable' => 'sony_asset',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->addIndex('sony_category', 'sony_category_sony_category_id', array(
             'fields' => 
             array(
              0 => 'sony_category_id',
             ),
             ));
        $this->addIndex('sony_category_asset', 'sony_category_asset_sony_category_id', array(
             'fields' => 
             array(
              0 => 'sony_category_id',
             ),
             ));
        $this->addIndex('sony_category_asset', 'sony_category_asset_sony_asset_id', array(
             'fields' => 
             array(
              0 => 'sony_asset_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('sony_category', 'sony_category_sony_category_id_sony_category_id');
        $this->dropForeignKey('sony_category_asset', 'sony_category_asset_sony_category_id_sony_category_id');
        $this->dropForeignKey('sony_category_asset', 'sony_category_asset_sony_asset_id_sony_asset_id');
        $this->removeIndex('sony_category', 'sony_category_sony_category_id', array(
             'fields' => 
             array(
              0 => 'sony_category_id',
             ),
             ));
        $this->removeIndex('sony_category_asset', 'sony_category_asset_sony_category_id', array(
             'fields' => 
             array(
              0 => 'sony_category_id',
             ),
             ));
        $this->removeIndex('sony_category_asset', 'sony_category_asset_sony_asset_id', array(
             'fields' => 
             array(
              0 => 'sony_asset_id',
             ),
             ));
    }
}
