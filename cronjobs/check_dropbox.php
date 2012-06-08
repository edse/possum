<?php

//die('STOPED!');

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('twittermonitor', 'prod', false);
sfContext::createInstance($configuration)->dispatch();

$dropboxes = Doctrine::getTable('VideoDropbox')->findByStatus('Waiting Youtube');

echo "\n>>>Itens: ".count($dropboxes)."\n\n";

foreach($dropboxes as $d){

	if($d->getAssetVideoGalleryId() != "")
		$s = $d->checkYoutubeStatus2();
	else
		$s = $d->checkYoutubeStatus();

	if($s == 1){
		echo "\n>".$d->getId().": File successfully processed by Youtube";
	}elseif($s == 2){
		echo "\n>".$d->getId().": Youtube reported errors or warnings present in file";
	}elseif($s == 3){
		echo "\n>".$d->getId().": File still in proccess by Youtube. Please, wait a few minutes";
	}elseif($s == 4){
		echo "\n>".$d->getId().": Original local file not found";
	}

}

mail('emersonestrella@gmail.com', 'Check Dropbox', 'TV Cultura: Dropbox been checked!');
die('FIM!');

