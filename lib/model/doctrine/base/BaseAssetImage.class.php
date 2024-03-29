<?php

/**
 * BaseAssetImage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $asset_id
 * @property string $file
 * @property string $original_file
 * @property string $headline
 * @property string $genre
 * @property string $source
 * @property string $author
 * @property string $original_file_size
 * @property string $width
 * @property string $height
 * @property string $extension
 * @property Asset $Asset
 * 
 * @method integer    getAssetId()            Returns the current record's "asset_id" value
 * @method string     getFile()               Returns the current record's "file" value
 * @method string     getOriginalFile()       Returns the current record's "original_file" value
 * @method string     getHeadline()           Returns the current record's "headline" value
 * @method string     getGenre()              Returns the current record's "genre" value
 * @method string     getSource()             Returns the current record's "source" value
 * @method string     getAuthor()             Returns the current record's "author" value
 * @method string     getOriginalFileSize()   Returns the current record's "original_file_size" value
 * @method string     getWidth()              Returns the current record's "width" value
 * @method string     getHeight()             Returns the current record's "height" value
 * @method string     getExtension()          Returns the current record's "extension" value
 * @method Asset      getAsset()              Returns the current record's "Asset" value
 * @method AssetImage setAssetId()            Sets the current record's "asset_id" value
 * @method AssetImage setFile()               Sets the current record's "file" value
 * @method AssetImage setOriginalFile()       Sets the current record's "original_file" value
 * @method AssetImage setHeadline()           Sets the current record's "headline" value
 * @method AssetImage setGenre()              Sets the current record's "genre" value
 * @method AssetImage setSource()             Sets the current record's "source" value
 * @method AssetImage setAuthor()             Sets the current record's "author" value
 * @method AssetImage setOriginalFileSize()   Sets the current record's "original_file_size" value
 * @method AssetImage setWidth()              Sets the current record's "width" value
 * @method AssetImage setHeight()             Sets the current record's "height" value
 * @method AssetImage setExtension()          Sets the current record's "extension" value
 * @method AssetImage setAsset()              Sets the current record's "Asset" value
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseAssetImage extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('asset_image');
        $this->hasColumn('asset_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('file', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('original_file', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('headline', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('genre', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('source', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('author', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('original_file_size', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('width', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('height', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('extension', 'string', 255, array(
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