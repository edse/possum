<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version31 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('trebuchet_asset', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'category_id' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'youtube_id' => 
             array(
              'type' => 'string',
              'length' => '50',
             ),
             'title' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '128',
             ),
             'description' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'image' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'file1' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'file2' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'rating' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'duration' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'display_order' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'is_active' => 
             array(
              'type' => 'boolean',
              'notnull' => '1',
              'default' => '0',
              'length' => '25',
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
             'slug' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             ), array(
             'indexes' => 
             array(
              'is_active_idx' => 
              array(
              'fields' => 
              array(
               0 => 'is_active',
              ),
              ),
              'trebuchet_asset_sluggable' => 
              array(
              'fields' => 
              array(
               0 => 'slug',
              ),
              'type' => 'unique',
              ),
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
        $this->createTable('trebuchet_category', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'category_id' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'title' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '128',
             ),
             'description' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'image' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'display_order' => 
             array(
              'type' => 'integer',
              'length' => '8',
             ),
             'is_active' => 
             array(
              'type' => 'boolean',
              'notnull' => '1',
              'default' => '0',
              'length' => '25',
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
             'slug' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             ), array(
             'indexes' => 
             array(
              'is_active_idx' => 
              array(
              'fields' => 
              array(
               0 => 'is_active',
              ),
              ),
              'trebuchet_category_sluggable' => 
              array(
              'fields' => 
              array(
               0 => 'slug',
              ),
              'type' => 'unique',
              ),
             ),
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
        $this->dropTable('trebuchet_asset');
        $this->dropTable('trebuchet_category');
    }
}