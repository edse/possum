<?php

/**
 * VideoDropbox filter form.
 *
 * @package    astolfo
 * @subpackage filter
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VideoDropboxFormFilter extends BaseVideoDropboxFormFilter
{
	public function configure()
	{
		$this->widgetSchema['video'] = new sfWidgetFormInput(array());
		$this->validatorSchema['video'] = new sfValidatorPass();
	}

	public function addVideoColumnQuery($query, $field, $value)
	{
		Doctrine::getTable('VideoDropbox')
		  ->applyVideoFilter($query, $value);
	}

	protected function addVideo2ColumnQuery(Doctrine_Query $query, $field, $values)
	{
		if($values){
			$sql = Doctrine_Query::create()
			  ->select('vd.*')
			  ->from('VideoDropbox vd, AssetVideo av')
			  ->where('vd.asset_video_id = av.id')
			  ->andWhere('av.title like ?', '%'.$values.'%')
			  ->orderBy('c.title');
			return  $sql;
		}
	}

	public function getFields()
	{
		$fields = parent::getFields();
		$fields['video'] = 'video';
		return $fields;
	}

}