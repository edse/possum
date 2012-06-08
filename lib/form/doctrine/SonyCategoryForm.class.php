<?php

/**
 * SonyCategory form.
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SonyCategoryForm extends BaseSonyCategoryForm
{
  public function configure()
  {

	$this->widgetSchema['slug'] = new sfWidgetFormInputText(array(), array('style' => 'width: 350px;'));
	$this->widgetSchema['title'] = new sfWidgetFormInputText(array(), array('style' => 'width: 450px;'));
	$this->widgetSchema['description'] = new sfWidgetFormTextarea(array(), array('style' => 'width: 450px;'));

  	unset($this['created_at'], $this['updated_at']);

	$this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
	  'label'     => 'Site icon',
	  'file_src'  => '/uploads/storage/sony/categories/'.$this->getObject()->getImage(),
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

  }
}
