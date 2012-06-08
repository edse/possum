<?php

/**
 * BaseCategoryAsset
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $asset_id
 * @property integer $category_id
 * @property Asset $Asset
 * @property Category $Category
 * 
 * @method integer       getAssetId()     Returns the current record's "asset_id" value
 * @method integer       getCategoryId()  Returns the current record's "category_id" value
 * @method Asset         getAsset()       Returns the current record's "Asset" value
 * @method Category      getCategory()    Returns the current record's "Category" value
 * @method CategoryAsset setAssetId()     Sets the current record's "asset_id" value
 * @method CategoryAsset setCategoryId()  Sets the current record's "category_id" value
 * @method CategoryAsset setAsset()       Sets the current record's "Asset" value
 * @method CategoryAsset setCategory()    Sets the current record's "Category" value
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseCategoryAsset extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('category_asset');
        $this->hasColumn('asset_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));
        $this->hasColumn('category_id', 'integer', null, array(
             'type' => 'integer',
             'primary' => true,
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Asset', array(
             'local' => 'asset_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Category', array(
             'local' => 'category_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));
    }
}