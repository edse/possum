<?php

/**
 * AssetFile
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    astolfo
 * @subpackage model
 * @author     Emerson Estrella
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class AssetFile extends BaseAssetFile
{
	
	public function postUpdate($values)
	{
		//clear cache
		@exec("rm /var/frontend/web/cache/".str_replace("http://", "", $this->Asset->retriveUrl2()));
	}
	
  public function formatBytes($bytes) {
     if ($bytes < 1024) return $bytes.' B';
     elseif ($bytes < 1048576) return round($bytes / 1024, 2).' KB';
     elseif ($bytes < 1073741824) return round($bytes / 1048576, 2).' MB';
     elseif ($bytes < 1099511627776) return round($bytes / 1073741824, 2).' GB';
     else return round($bytes / 1099511627776, 2).' TB';
  }

}