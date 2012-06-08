<?php
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'prod', true);
sfContext::createInstance($configuration)->dispatch();

$programas = array(
	"rodaviva"				=>	1,
	"cartaoverde"				=>	2,
	"culturalivre"				=>	3,
	"culturaretro"				=>	4,
	"deupaulanatv"				=>	5,
	"ensaio"				=>	6,
	"entrelinhas"				=>	7,
	"gme"					=>	8,
	"inglescommusica"			=>	9,
	"jornaldacultura"			=>	10,
	"manoseminas"				=>	11,
	"materiadecapa"				=>	12,
	"metropolis"				=>	13,
	"mobile"				=>	14,
	"penarua"				=>	15,
	"provocacoes"				=>	16,
	"quintaldacultura"			=>	17,
	"radiola"				=>	18,
	"reisdarua"				=>	19,
	"reportereco"				=>	20,
	"srbrasil"				=>	21,
	"viola"					=>	22,
	"vitrine"				=>	23
);

$assets = array();
$ordem = array();

//Check for downloaded files
if($handle = opendir('/var/astolfo/web/uploads/storage/download')) {
    while(false !== ($entry = readdir($handle))) {
        if($entry != "." && $entry != "..") {
            $pos = strrpos($entry, ".jpg");
            if($pos !== false) {
                $youtube_id = substr($entry, 0, $pos);
                echo "\n- ".$youtube_id;
                $a = Doctrine_Core::getTable('AssetVideo')->findOneByYoutubeId($youtube_id);
                $arr = array();
                if($a){
			
	                $sa = Doctrine_Core::getTable('SonyAsset')->findOneByYoutubeId($youtube_id);
			
	                if(!$sa){
		

		        	$title = substr($a->Asset->getTitle()." - ".$a->Asset->Site->getTitle(), 0, 128);
		        	$ordem[$a->Asset->Site->getSlug()]++;
		        	$d = explode(":",$a->getDuration());
		        	$duration = intval($d[0]*60*60)+intval($d[1]*60)+intval($d[2]);

				      $sony_category = Doctrine_Core::getTable('SonyCategory')->findOneBySlug($a->Asset->Site->getSlug());

			        $sony_asset = new SonyAsset();
			        $sony_asset->setYoutubeId($youtube_id);
			        $sony_asset->setTitle($title);
			        $sony_asset->setDescription($a->Asset->getDescription());
			        $sony_asset->setDuration($duration);
			        $sony_asset->setImage($youtube_id.".jpg");
			        $sony_asset->setFile1($youtube_id."-1.mp4");
			        $sony_asset->setFile2($youtube_id."-2.mp4");
			        $sony_asset->setFile2($youtube_id."-2.mp4");
			        $sony_asset->setIsActive(1);
				      if($sony_category)
				        $sony_asset->getSonyCategories()->add($sony_category);
			        $sony_asset->save();
              /*
              $rel = Doctrine_Query::create()
                ->select('ca.*')
                ->from('SonyCategoryAsset ca')
                ->where('ca.sony_asset_id = ?', $sony_asset->getId())
                ->andWhere('ca.sony_category_id = ?', $sony_category->getId())
                ->fetchOne();
              if($rel){
              }
              */


				//move files
				exec("mv /var/astolfo/web/uploads/storage/download/".$youtube_id.".jpg /var/astolfo/web/uploads/storage/assets/".$a->Asset->Site->getSlug()."/".$youtube_id.".jpg");
				exec("mv /var/astolfo/web/uploads/storage/download/".$youtube_id."-1.mp4 /var/astolfo/web/uploads/storage/assets/".$a->Asset->Site->getSlug()."/".$youtube_id."-1.mp4");
				exec("mv /var/astolfo/web/uploads/storage/download/".$youtube_id."-2.mp4 /var/astolfo/web/uploads/storage/assets/".$a->Asset->Site->getSlug()."/".$youtube_id."-2.mp4");

	                }else
                    echo " (SonyAsset exists!)";

                }else
                  echo " (AssetVideo not found!)";
            }
        }
    }
    closedir($handle);
}

die("\n\nIngest file ".date('Ymd')."-ingest.xml created!\n\n");

