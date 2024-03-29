<?php

/**
 * ImageUsage
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ImageUsage extends BaseImageUsage
{
  
  public function hex2RGB(){
      $color = str_replace('#', '', $this->background_color);
      if (strlen($color) != 6){ return array(0,0,0); }
      $rgb = array();
      for($x=0;$x<3;$x++){
         $rgb[$x] = hexdec(substr($color,(2*$x),2));
      }
      return $rgb;
  }

  
}
