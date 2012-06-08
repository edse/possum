<?php

/**
 * Schedule
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Schedule extends BaseSchedule
{
  
  public function retriveTitle(){
    if($this->getTitle() != "")
      return $this->getTitle();
    elseif($this->Program->getTitle() != "")
      return $this->Program->getTitle();
  }
  
  public function retriveDescription(){
    if($this->getDescription() != "")
      return $this->getDescription();
    elseif($this->Program->getDescription() != "")
      return $this->Program->getDescription();
  }

  public function retriveLiveImage(){
    if($this->getImage() != "")
      return "/uploads/displays/".$this->getImage();
    elseif($this->Program->getImageThumb() != "")
      return "/uploads/programs/".$this->Program->getImageThumb();
  }

}
