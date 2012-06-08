<?php

/**
 * Section form.
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SectionForm extends BaseSectionForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    
    $this->widgetSchema['display_order'] = new sfWidgetFormInputHidden();
    
  }
  
  protected function doSave($con = null)
  {
    $this->saveAssetsList($con);
    //$this->saveEditorsList($con);

    parent::doSave($con);
    //die('123');
  }


  public function saveAssetsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['assets_list']))
    {
      // somebody has unset this widget
      die('somebody has unset this widget');
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Assets->getPrimaryKeys();
    $values = $this->getValue('assets_list');
    if(is_array($values)){

      $unlink = array_diff($existing, $values);
      if (count($unlink))
      {
        $this->object->unlink('Assets', array_values($unlink));
      }
  
      $link = array_diff($values, $existing);
      if (count($link))
      {
        $this->object->link('Assets', array_values($link));
      }
    }
  }


}
