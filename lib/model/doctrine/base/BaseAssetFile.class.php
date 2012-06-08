<?php

/**
 * BaseAssetFile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $asset_id
 * @property string $file
 * @property string $genre
 * @property string $source
 * @property string $author
 * @property string $extension
 * @property string $file_size
 * @property Asset $Asset
 * 
 * @method integer   getAssetId()   Returns the current record's "asset_id" value
 * @method string    getFile()      Returns the current record's "file" value
 * @method string    getGenre()     Returns the current record's "genre" value
 * @method string    getSource()    Returns the current record's "source" value
 * @method string    getAuthor()    Returns the current record's "author" value
 * @method string    getExtension() Returns the current record's "extension" value
 * @method string    getFileSize()  Returns the current record's "file_size" value
 * @method Asset     getAsset()     Returns the current record's "Asset" value
 * @method AssetFile setAssetId()   Sets the current record's "asset_id" value
 * @method AssetFile setFile()      Sets the current record's "file" value
 * @method AssetFile setGenre()     Sets the current record's "genre" value
 * @method AssetFile setSource()    Sets the current record's "source" value
 * @method AssetFile setAuthor()    Sets the current record's "author" value
 * @method AssetFile setExtension() Sets the current record's "extension" value
 * @method AssetFile setFileSize()  Sets the current record's "file_size" value
 * @method AssetFile setAsset()     Sets the current record's "Asset" value
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAssetFile extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('asset_file');
        $this->hasColumn('asset_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('file', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('genre', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('source', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('author', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('extension', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('file_size', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
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
    }
}