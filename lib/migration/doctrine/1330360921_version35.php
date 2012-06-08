<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version35 extends Doctrine_Migration_Base
{
    public function up()
    {
	/*
        $this->dropForeignKey('trebuchet_asset', 'trebuchet_asset_category_id_trebuchet_category_id');
        $this->createForeignKey('trebuchet_category_asset', 'trebuchet_category_asset_category_id_trebuchet_category_id', array(
             'name' => 'trebuchet_category_asset_category_id_trebuchet_category_id',
             'local' => 'category_id',
             'foreign' => 'id',
             'foreignTable' => 'trebuchet_category',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('trebuchet_category_asset', 'trebuchet_category_asset_asset_id_trebuchet_asset_id', array(
             'name' => 'trebuchet_category_asset_asset_id_trebuchet_asset_id',
             'local' => 'asset_id',
             'foreign' => 'id',
             'foreignTable' => 'trebuchet_asset',
             'onUpdate' => '',
             'onDelete' => 'CASCADE',
             ));
        $this->createForeignKey('trebuchet_category_asset', 'trebuchet_category_asset_category_id_category_id', array(
             'name' => 'trebuchet_category_asset_category_id_category_id',
             'local' => 'category_id',
             'foreign' => 'id',
             'foreignTable' => 'category',
             ));
        $this->createForeignKey('trebuchet_category_asset', 'trebuchet_category_asset_asset_id_asset_id', array(
             'name' => 'trebuchet_category_asset_asset_id_asset_id',
             'local' => 'asset_id',
             'foreign' => 'id',
             'foreignTable' => 'asset',
             ));
        $this->createForeignKey('trebuchet_category_asset', 'trebuchet_category_asset_trebuchet_asset_id_trebuchet_asset_id', array(
             'name' => 'trebuchet_category_asset_trebuchet_asset_id_trebuchet_asset_id',
             'local' => 'trebuchet_asset_id',
             'foreign' => 'id',
             'foreignTable' => 'trebuchet_asset',
             ));
        $this->createForeignKey('trebuchet_category_asset', 'ttti', array(
             'name' => 'ttti',
             'local' => 'trebuchet_category_id',
             'foreign' => 'id',
             'foreignTable' => 'trebuchet_category',
             ));
        $this->addIndex('trebuchet_category_asset', 'trebuchet_category_asset_category_id', array(
             'fields' => 
             array(
              0 => 'category_id',
             ),
             ));
        $this->addIndex('trebuchet_category_asset', 'trebuchet_category_asset_asset_id', array(
             'fields' => 
             array(
              0 => 'asset_id',
             ),
             ));
        $this->addIndex('trebuchet_category_asset', 'trebuchet_category_asset_trebuchet_asset_id', array(
             'fields' => 
             array(
              0 => 'trebuchet_asset_id',
             ),
             ));
        $this->addIndex('trebuchet_category_asset', 'trebuchet_category_asset_trebuchet_category_id', array(
             'fields' => 
             array(
              0 => 'trebuchet_category_id',
             ),
             ));
	*/
    }

    public function down()
    {
        $this->createForeignKey('trebuchet_asset', 'trebuchet_asset_category_id_trebuchet_category_id', array(
             'name' => 'trebuchet_asset_category_id_trebuchet_category_id',
             'local' => 'category_id',
             'foreign' => 'id',
             'foreignTable' => 'trebuchet_category',
             ));
        $this->dropForeignKey('trebuchet_category_asset', 'trebuchet_category_asset_category_id_trebuchet_category_id');
        $this->dropForeignKey('trebuchet_category_asset', 'trebuchet_category_asset_asset_id_trebuchet_asset_id');
        $this->dropForeignKey('trebuchet_category_asset', 'trebuchet_category_asset_category_id_category_id');
        $this->dropForeignKey('trebuchet_category_asset', 'trebuchet_category_asset_asset_id_asset_id');
        $this->dropForeignKey('trebuchet_category_asset', 'trebuchet_category_asset_trebuchet_asset_id_trebuchet_asset_id');
        $this->dropForeignKey('trebuchet_category_asset', 'ttti');
        $this->removeIndex('trebuchet_category_asset', 'trebuchet_category_asset_category_id', array(
             'fields' => 
             array(
              0 => 'category_id',
             ),
             ));
        $this->removeIndex('trebuchet_category_asset', 'trebuchet_category_asset_asset_id', array(
             'fields' => 
             array(
              0 => 'asset_id',
             ),
             ));
        $this->removeIndex('trebuchet_category_asset', 'trebuchet_category_asset_trebuchet_asset_id', array(
             'fields' => 
             array(
              0 => 'trebuchet_asset_id',
             ),
             ));
        $this->removeIndex('trebuchet_category_asset', 'trebuchet_category_asset_trebuchet_category_id', array(
             'fields' => 
             array(
              0 => 'trebuchet_category_id',
             ),
             ));
    }
}
