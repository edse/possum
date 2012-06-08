<?php

/**
 * Schedule form.
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ScheduleForm extends BaseScheduleForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    
    $q = Doctrine_Query::create()
      ->select('p.*')
      ->from('Program p, ChannelProgram cp')
      ->where('p.id = cp.program_id')
      ->andWhere('cp.channel_id = ?', $this->getObject()->getChannelId())
      ->orderBy('p.title');
    $this->widgetSchema['program_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'Program',
      'add_empty' => true,
      'query'     => $q
    ));
    
    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
      'label'     => 'Image',
      'file_src'  => '/uploads/displays/'.$this->getObject()->getImage(),
      'is_image'  => true,
      'with_delete' => true,
      'edit_mode' => !$this->isNew(),
      'template'  => '<div>%file%<br />%input%<br />%delete% %delete_label%</div>',
    ));    
    $this->validatorSchema['image'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/displays',
      'mime_types' => 'web_images',
    ));
    $this->validatorSchema['image_delete'] = new sfValidatorPass();

    /*
    $this->widgetSchema['date_start'] = new sfWidgetAstolfoDateTimeForm(array(
     'image' => '/images/calendar.gif'
    ));

    $this->widgetSchema['date_end'] = new sfWidgetAstolfoDateTimeForm(array(
     'image' => '/images/calendar.gif'
    ));
    */
    $this->widgetSchema['description'] = new sfWidgetFormTextarea(array(), array('style' => 'width: 450px; height: 65px;'));

    $this->widgetSchema['description_short'] = new sfWidgetFormTextarea(array(), array('style' => 'width: 450px;'));
    
    $this->widgetSchema['title'] = new sfWidgetFormInputText(array(), array('style' => 'width: 450px;'));
    $this->widgetSchema['url'] = new sfWidgetFormInputText(array(), array('style' => 'width: 350px;'));
    
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
	'176' => 'Erótico',
	'191' => 'Outros (Erótico)',
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
