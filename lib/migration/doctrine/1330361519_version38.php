<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version38 extends Doctrine_Migration_Base
{
    public function up()
    {
	/*
        $this->dropTable('trebuchet_category_asset');
        $this->removeColumn('trebuchet_category', 'trebuchet_category_id');
        $this->addColumn('trebuchet_asset', 'category_id', 'integer', '8', array(
             ));
        $this->addColumn('trebuchet_category', 'category_id', 'integer', '8', array(
             ));
	*/
    }

    public function down()
    {
        $this->createTable('trebuchet_category_asset', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'trebuchet_category_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '8',
             ),
             'trebuchet_asset_id' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '8',
             ),
             'is_active' => 
             array(
              'type' => 'boolean',
              'notnull' => '1',
              'default' => '0',
              'length' => '25',
             ),
             'display_order' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'type' => '',
             'indexes' => 
             array(
              'is_active_idx' => 
              array(
              'fields' => 
              array(
               0 => 'is_active',
              ),
              ),
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
        $this->addColumn('trebuchet_category', 'trebuchet_category_id', 'integer', '8', array(
             ));
        $this->removeColumn('trebuchet_asset', 'category_id');
        $this->removeColumn('trebuchet_category', 'category_id');
    }
}
