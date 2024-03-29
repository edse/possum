<?php

/**
 * Site
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Site extends BaseSite
{
  
  public function __toString()
  {
    return (string) $this->getTitle();
  }

  public function preDelete($event)
  {
    $deleted = Doctrine_Query::create()
      ->delete()
      ->from('Log')
      ->andWhere('site_id = ?', (int)$this->getId())
      ->execute();
  }

  public function postDelete($values)
  {
    $log = new Log();
    $log->setAction('Delete');
    if(sfContext::hasInstance())
      $log->setUserId(sfContext::getInstance()->getUser()->getGuardUser()->getId());
    //$log->setSiteId($this->getId());
    $log->setAsset($this->getId());
    $log->setAssetTitle($this->getTitle());  
    $log->setClass('Site');  
    $log->save();
  }

  public function postUpdate($values)
  {
    $log = new Log();
    $log->setAction('Update');
    if(sfContext::hasInstance())
      $log->setUserId(sfContext::getInstance()->getUser()->getGuardUser()->getId());
    $log->setSiteId($this->getId());
    $log->setAsset($this->getId());
    $log->setAssetTitle($this->getTitle());  
    $log->setClass('Site');  
    $log->save();
  }

  public function postInsert($values)
  {
    $log = new Log();
    $log->setAction('Insert');
    if(sfContext::hasInstance())
      $log->setUserId(sfContext::getInstance()->getUser()->getGuardUser()->getId());
    $log->setSiteId($this->getId());
    $log->setAsset($this->getId());
    $log->setAssetTitle($this->getTitle());  
    $log->setClass('Site');  
    $log->save();
  }

  public function retriveUrl()
  {
    if($this->getUrl() != "")
      return (string) $this->getUrl();
    else{
      if(($this->getType() != "Portal")&&($this->getType() != "Hotsite")){
        $programa = Doctrine_Query::create()
          ->select('p.*')
          ->from('Program p, Site s')
          ->where('s.id = ?', (int)$this->id)
          ->andWhere('p.site_id = s.id')
          ->orderby('p.id desc')
          ->fetchOne();
        if($programa){
          return (string) "http://".$programa->Channel->slug.".cmais.com.br/".$this->slug;
        }else
          return (string) "/".$this->getSlug();
      }
      else
        return (string) "/".$this->getSlug();
    }
  }
}
