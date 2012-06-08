<?php
/**
 * Asset form.
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 */

class BackendAssetForm extends AssetForm
{
  public function configure()
  {
    unset($this['updated_at'],$this['created_at']);
    
    $this->widgetSchema['user_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'sfGuardUser',
      'add_empty' => false
    ));
    
    $q = Doctrine_Query::create()
      ->select('at.*')
      ->from('AssetType at')
      ->where('at.upload_input = ?', false)
      ->andWhere('at.is_visible = ?', true)
      ->orderBy('at.title');

    $this->widgetSchema['asset_type_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'AssetType',
      'add_empty' => false,
      'query'     => $q
    ));

  	if($this->object->id > 0){
      unset($this['asset_type_id']);
  	  $asset = Doctrine_Core::getTable('Asset')->find($this->object->id);
      $this->embedRelation('Asset'.$asset->getAssetType()->getModel());
  	}
    $this->widgetSchema['title'] = new sfWidgetFormInputText(array(), array('style' => 'width: 450px;', 'class' => 'input-medium'));
    $this->widgetSchema['description'] = new sfWidgetFormTextarea(array(), array('style' => 'width: 450px;'));
    
    /*
    $this->widgetSchema['date_start'] = new sfWidgetAstolfoDateTimeForm(array(
     'image' => '/images/calendar.gif'
    ));
	
    $this->widgetSchema['date_end'] = new sfWidgetAstolfoDateTimeForm(array(
     'image' => '/images/calendar.gif'
    ));
    */

  	$this->widgetSchema['categories_list'] = new sfWidgetFormDoctrineChoice(array(
  		'model'        => 'Category',                  
  		'renderer_class' => 'sfWidgetFormSelectDoubleList',
  		'key_method'   => 'getId', //name of the department
  		'renderer_class' => 'sfWidgetFormSelectDoubleList',
  		'table_method' => 'findAll2',
      'renderer_options' => array(
        'label_unassociated' => 'Todas',
        'label_associated' => 'Relacionadas',
        'associated_first' => false,
       )
      ),
      array('class' => 'text', 'style' => 'width:44em')
    );
  	
  	$this->validatorSchema['categories_list'] = new sfValidatorPass();
    
    $cs = Doctrine_Query::create()
      ->select('c.*')
      ->from('Category c')
      ->where('c.is_active = 1')
      ->orderBy('c.title')
      ->execute();
    foreach($cs as $s){
      $choices[$s->getId()] = $s->getTitle();
    }
    $this->widgetSchema['category_id'] = new sfWidgetFormChoice(array(
      'choices'      => $choices
    ));

  	$q = Doctrine_Query::create()
  		->select('s.*')
  		->from('section s, SectionAsset sa')
      ->where('sa.asset_id = ?', $this->object->id)
      ->where('s.id = sa.section_id')
      ->orderBy('s.site_id');
  	$this->widgetSchema['sections_list'] = new sfWidgetFormDoctrineChoice(array(
  		'model'        => 'Section',                  
  		'renderer_class' => 'sfWidgetFormSelectDoubleList',
  	  'query' => $q,
  	  'renderer_options' => array(
        'label_unassociated' => 'Todas',
        'label_associated' => 'Relacionadas',
        'associated_first' => false
  	   )
  	));
  	$this->validatorSchema['categories_list'] = new sfValidatorPass();
    
    $cs = Doctrine_Query::create()
      ->select('s.*')
      ->from('Site s, SiteUser su')
      ->where('s.id = su.site_id')
      ->addWhere('su.user_id = ?', sfContext::getInstance()->getUser()->getGuardUser()->getId())
      ->orderBy('s.title')
      ->execute();
    foreach($cs as $s){
      $choices[$s->getId()] = $s->getTitle();
    }
    $this->widgetSchema['site_id'] = new sfWidgetFormChoice(array(
      'choices'      => $choices
    ));

  	// Tags
    // this text appears in gray until the user focuses on the field
    $default = 'Add tags with commas' ;
    $this->widgetSchema['new_tags'] = new sfWidgetFormInput(array(
      'label'   => 'Add Tags',
      'default' => $default
    ),array(
      'onclick' => "if (this.value=='$default') { this.value = ''; this.style.color='black'; }", 
      'size'    =>  '32',
     	'id'  	  => 'new_tags', 
     	'autocomplete'  => "off", // don't let the browser autocomplete.  We'll add typeahead, below      
     	'style'  => 'color:#aaa' 
    ));
    
    // allow the field to remain blank
    $this->setValidator('new_tags' , new sfValidatorString(array('required'  => false)));
 
    // this hidden field will be populated with JavaScript.
    $this->widgetSchema['remove_tags'] = new sfWidgetFormInputHidden();
    $this->setValidator('remove_tags' , new sfValidatorString(array('required'  => false)));
  
  }

}