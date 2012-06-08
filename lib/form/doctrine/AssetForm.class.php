<?php

/**
 * Asset form.
 *
 * @package    astolfo
 * @subpackage form
 * @author     Emerson Estrella
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssetForm extends BaseAssetForm
{
  public function configure()
  {
  }
  
  public function saveSectionsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['sections_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Sections->getPrimaryKeys();
    $values = $this->getValue('sections_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $exclude = array();
      foreach($unlink as $u){
        $s = Doctrine::getTable('Section')->findOneById($u);
        if($s->getSiteId() == $this->object->getSiteId())
          $exclude[] = $u;
      }
      if(count($exclude))
        $this->object->unlink('Sections', array_values($exclude));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Sections', array_values($link));
    }
  }

}
