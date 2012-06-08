<?php

/**
 * Program form.
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProgramForm extends BaseProgramForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    
    $this->widgetSchema['image_icon'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Program icon',
      'file_src'  => '/uploads/programs/'.$this->getObject()->getImageIcon(),
      'is_image'  => true,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
    ));    
    $this->validatorSchema['image_icon'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/programs',
      'mime_types' => array(
                        'image/jpeg',
                        'image/pjpeg',
                        'image/png',
                        'image/x-png',
                        'image/gif',
                        'text/plain'
                      ),
    ));
    $this->validatorSchema['image_icon_delete'] = new sfValidatorPass();
    //
    $this->widgetSchema['image_thumb'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Program thumb',
      'file_src'  => '/uploads/programs/'.$this->getObject()->getImageThumb(),
      'is_image'  => true,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
    ));    
    $this->validatorSchema['image_thumb'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/programs',
      'mime_types' => 'web_images',
    ));
    $this->validatorSchema['image_thumb_delete'] = new sfValidatorPass();
    //
    $this->widgetSchema['image_live'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Program live image',
      'file_src'  => '/uploads/programs/'.$this->getObject()->getImageLive(),
      'is_image'  => true,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
    ));    
    $this->validatorSchema['image_live'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/programs',
      'mime_types' => 'web_images',
    ));
    $this->validatorSchema['image_live_delete'] = new sfValidatorPass();
    
    $this->widgetSchema['description'] = new sfWidgetFormTextarea(array(), array('style' => 'width: 450px; height: 65px;'));
    $this->widgetSchema['long_description'] = new sfWidgetFormTextarea(array(), array('style' => 'width: 450px; height: 130px;'));

    $this->widgetSchema['schedule'] = new sfWidgetFormTextarea(array(), array('style' => 'width: 450px; height: 65px;'));

    $q = Doctrine_Query::create()
      ->select('s.*')
      ->from('Site s')
      ->where('s.is_active = ?', true)
      ->orderBy('s.title');
    $this->widgetSchema['site_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'Site',
      'add_empty' => true,
      'query'     => $q
    ));

    $this->widgetSchema['tv_rating'] = new sfWidgetFormChoice(array(
        	    'choices' => array(
        	    '0' => '',
        	    '1' => 'Livre para Todos os Públicos',
              '2' => 'Não Recomendado para Menores de 10 Anos',
              '3' => 'Não Recomendado para Menores de 12 Anos',
              '4' => 'Não Recomendado para Menores de 14 Anos',
        			'5' => 'Não Recomendado para Menores de 16 Anos',
              '6' => 'Não Recomendado para Menores de 18 Anos'
    )));
    $this->validatorSchema['tv_rating'] = new sfValidatorPass();
     
    $this->widgetSchema['tv_category'] = new sfWidgetFormChoice(array(
            	'choices' => array(
        			'0'   =>   'Telejornais',
        			'1'   =>   'Reportagem',
        			'2'   =>   'Documentário',
        			'3'   =>   'Biografia',
        			'15'  =>  'Outros (Jornalismo)',
        			'16'  =>  'Esporte',
        			'31'  =>  'Outros (Esporte)',
        			'32'  =>  'Educativo',
        			'47'  =>  'Outros (Educativo)',
        			'48'  =>  'Novela',
        			'63'  =>  'Outros (Novela)',
        			'64'  =>  'Minissérie',
        			'79'  =>  'Outros (Minissérie)',
        			'80'  =>  'Série',
        			'95'  =>  'Outros (Série)',
        			'96'  =>  'Auditório',
        			'97'  =>  'Show',
        			'98'  =>  'Musical',
        			'99'  =>  'Making of',
        			'100' => 'Feminino',
        			'101' => 'Game show',
        			'111' => 'Outros (Variedade)',
        			'112' => 'Reality Show',
        			'127' => 'Outros (Reality Show)',
        			'128' => 'Culinária',
        			'129' => 'Moda',
        			'130' => 'Rural',
        			'131' => 'Saúde',
        			'132' => 'Turismo',
        			'143' => 'Outros (Informação)',
        			'144' => 'Humorístico',
        			'159' => 'Outros (Humorístico)',
        			'160' => 'Infantil',
        			'175' => 'Outros (Infantil)',
        			'192' => 'Filme',
        			'207' => 'Outros (Filme)',
        			'208' => 'Sorteio',
        			'209' => 'Televendas',
        			'210' => 'Premiação',
        			'223' => 'Outros (Sorteio/Televendas)',
        			'224' => 'Debate',
        			'225' => 'Entrevista',
        			'239' => 'Outros (Debate/Entrevista)',
        			'240' => 'Desenho adulto',
        			'241' => 'Interativo',
        			'242' => 'Político',
        			'243' => 'Religioso',
    )));
    $this->validatorSchema['tv_category'] = new sfValidatorPass();
    
  }
}
