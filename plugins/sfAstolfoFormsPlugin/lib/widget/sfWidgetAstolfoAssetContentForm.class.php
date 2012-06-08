<?php

class sfWidgetAstolfoAssetContentForm extends sfWidgetFormTextArea
{
  public function configure($options = array(), $attributes = array())
  { 
    $this->addOption('theme', '');
    $this->addOption('width');
    $this->addOption('height');
    $this->addOption('config', 'asdf');
  }
 
  public function getJavascript()
  {
    //return array('/sfAstolfoFormsPlugin/js/ckeditor/ckeditor.js');]
    return array('/js/ckeditor/ckeditor2.js');
  }
 
  public function render($name, $value = null, $attributes = array(), $errors = array())
  {

    $textarea = parent::render($name, $value, $attributes, $errors);

    $js = sprintf(<<<EOF
<script>
	jQuery(window).bind("load", function() {
	  CKEDITOR.replace("asset_AssetContent_content",{
	    height:"600"
	  });
	  CKEDITOR.config.contentsCss = '/css/geral.css';
	  //CKEDITOR.addCss('.chapeu {clear:both; background:#eaeaea; width:100%; margin-bottom:0;}');
	});

  function appedToTextarea(text) {
    CKEDITOR.instances.asset_AssetContent_content.insertHtml(text);
  }  
</script>
EOF
    ,
      $this->generateId($name),
      $this->getOption('theme'),
      $this->getOption('width')  ? sprintf('width:                             "%spx",', $this->getOption('width')) : '',
      $this->getOption('height') ? sprintf('height:                            "%spx",', $this->getOption('height')) : '',
      $this->getOption('config') ? ",\n".$this->getOption('config') : ''
    );

    return $textarea.$js;
	
  }
}
