<?php
/**
 * Block 
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Block extends BaseBlock
{
  public function __toString()
  {
    if($this->Section->Site->getTitle())
      return (string) $this->Section->Site->getTitle()." > ".$this->Section->getTitle()." > ".$this->getTitle();
    else
      return (string) $this->getTitle();
    //return (string) $this->Section->Site->getTitle()." > ".$this->Section->getTitle()." > ".$this->getTitle();
  }

  public function postDelete($values)
  {
    $log = new Log();
    $log->setAction('Delete');
    if(sfContext::hasInstance())
      $log->setUserId(sfContext::getInstance()->getUser()->getGuardUser()->getId());
    $log->setSiteId($this->Section->Site->getId());
    $log->setAsset($this->getId());
    $log->setAssetTitle($this->getTitle());  
    $log->setClass('Block');  
    $log->save();
  }

  public function postUpdate($values)
  {
    $log = new Log();
    $log->setAction('Update');
    if(sfContext::hasInstance())
      $log->setUserId(sfContext::getInstance()->getUser()->getGuardUser()->getId());
    $log->setSiteId($this->Section->Site->getId());
    $log->setAsset($this->getId());
    $log->setAssetTitle($this->getTitle());  
    $log->setClass('Block');  
    $log->save(); 
  }

  public function postInsert($values)
  {
    $log = new Log();
    $log->setAction('Insert');
    if(sfContext::hasInstance())
      $log->setUserId(sfContext::getInstance()->getUser()->getGuardUser()->getId());
    $log->setSiteId($this->Section->Site->getId());
    $log->setAsset($this->getId());
    $log->setAssetTitle($this->getTitle());  
    $log->setClass('Block');  
    $log->save();
  }

  public function retriveDisplays(){
    $cs = array(); 
    if($this->getId() > 0){
      if($this->is_random)
        $order = "RAND()";
      else
        $order = "d.display_order";
      if($this->query != ""){
        if($this->items > 0)
          $limit = $this->items;
        else
          $limit = 5;
        if($this->items_order != "")
          $order = $this->items_order;
        else
          $order = "a.created_at desc";
        $cs = Doctrine_Query::create()
          ->select('a.*')
          ->from('Asset a')
          ->where('a.is_active = ?', 1)
          ->andWhere($this->query)
          ->orderBy($order)
          ->limit($limit)
          ->execute();
      }else{
        $cs = Doctrine_Query::create()
          ->select('d.*')
          ->from('Display d')
          ->where('d.block_id = ?', $this->getId())
          ->andWhere('d.is_active = ?', 1)
          ->andWhere('((d.date_start <= ? AND d.date_end >= ?) OR (d.date_start IS NULL AND date_end IS NULL))', array(date('Y-m-d H:i:s', time()), date('Y-m-d H:i:s', time())))
          ->orderBy($order)
          ->execute();
      }
    }
    return $cs;
  }

}

