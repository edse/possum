<?php

/**
 * SonyAsset form.
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SonyAssetForm extends BaseSonyAssetForm
{
  public function configure()
  {

	$this->widgetSchema['slug'] = new sfWidgetFormInputText(array(), array('style' => 'width: 350px;'));
	$this->widgetSchema['title'] = new sfWidgetFormInputText(array(), array('style' => 'width: 450px;'));
	$this->widgetSchema['description'] = new sfWidgetFormTextarea(array(), array('style' => 'width: 450px;'));

	$c = $this->getObject()->getSonyCategories();
	//die(">>>".count($c).">>>".$c[0]->getSlug());
	//$cat = Doctrine::getTable('SonyCategory')->find($c[0]->getSonyCategoryId());
	$cat = $c[0];

  	unset($this['created_at'], $this['updated_at']);

	$this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
	  'label'     => 'Thumbnail',
	  'file_src'  => '/uploads/storage/assets/'.$cat->getSlug().'/'.$this->getObject()->getImage(),
	  'is_image'  => true,
	  'edit_mode' => !$this->isNew(),
	  'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
	));    
	$this->validatorSchema['image'] = new sfValidatorFile(array(
	  'required'   => false,
	  'path'       => sfConfig::get('sf_upload_dir').'/storage/sony/categories',
	  'mime_types' => 'web_images',
	));
	$this->validatorSchema['image_delete'] = new sfValidatorPass();

	$this->widgetSchema['file1'] = new sfWidgetFormInputFileEditable(array(
	  'label'     => 'High Definition File',
	  'file_src'  => sfConfig::get('sf_upload_dir').'/storage/assets/'.$cat->getSlug().'/'.$this->getObject()->getFile1(),
	  'is_image'  => false,
	  'edit_mode' => !$this->isNew(),
	  'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
	));    
	$this->validatorSchema['file1'] = new sfValidatorFile(array(
	  'required'   => false,
	  'path'       => sfConfig::get('sf_upload_dir').'/storage/assets/'.$cat->getSlug(),
	  'mime_types' => 'web_images',
	));
	$this->validatorSchema['file1_delete'] = new sfValidatorPass();

	$this->widgetSchema['file2'] = new sfWidgetFormInputFileEditable(array(
	  'label'     => 'Low Definition File',
	  'file_src'  => sfConfig::get('sf_upload_dir').'/storage/assets/'.$cat->getSlug().'/'.$this->getObject()->getFile2(),
	  'is_image'  => false,
	  'edit_mode' => !$this->isNew(),
	  'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
	));    
	$this->validatorSchema['file2'] = new sfValidatorFile(array(
	  'required'   => false,
	  'path'       => sfConfig::get('sf_upload_dir').'/storage/assets/'.$cat->getSlug(),
	  'mime_types' => 'web_images',
	));
	$this->validatorSchema['file2_delete'] = new sfValidatorPass();

	/*
    	$q = Doctrine_Query::create()
    		->select('s.*')
    		->from('SonyCategory s')
    		->where('s.is_active = 1')
	        ->orderBy('s.title');
    	$this->widgetSchema['sony_categories'] = new sfWidgetFormDoctrineChoice(array(
    		'model' => 'SonyCategory',
    		'renderer_class' => 'sfWidgetFormSelectDoubleList',
	    	'query' => $q,
    		'renderer_options' => array(
	        'label_unassociated' => 'Todas',
	        'label_associated' => 'Relacionadas',
	        'associated_first' => false
    	)));
    	$this->validatorSchema['sony_categories'] = new sfValidatorPass();
	*/

    	$this->widgetSchema['sony_categories_list'] = new sfWidgetFormDoctrineChoice(array(
    		'model' => 'SonyCategory',
    		'renderer_class' => 'sfWidgetFormSelectDoubleList',
    		'renderer_options' => array(
	          'label_unassociated' => 'Todas',
	          'label_associated' => 'Relacionadas',
	          'associated_first' => false
	)));
    	$this->validatorSchema['sony_categories_list'] = new sfValidatorPass();


    $this->widgetSchema['rating'] = new sfWidgetFormChoice(array(
	'choices' => array(
	'0' => '',
	'1' => 'Livre para Todos os Públicos',
      	'2' => 'Não Recomendado para Menores de 10 Anos',
        '3' => 'Não Recomendado para Menores de 12 Anos',
        '4' => 'Não Recomendado para Menores de 14 Anos',
	'5' => 'Não Recomendado para Menores de 16 Anos',
	'6' => 'Não Recomendado para Menores de 18 Anos'
    )));
    $this->validatorSchema['rating'] = new sfValidatorPass();

  }
}
