<?php
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');
$configuration = ProjectConfiguration::getApplicationConfiguration('twittermonitor', 'prod', false);
sfContext::createInstance($configuration)->dispatch();
$monitors = Doctrine::getTable('TweetMonitor')->findAll();

echo "\n".count($monitors)."\n";

foreach($monitors as $m){

	$url = "http://search.twitter.com/search.atom?rpp=10&nocache=".time()."&q=".urlencode($m->getQuery());
	echo "\n\n>>>>".$url;
	$i=0;

	$contents = file_get_contents($url);
	$xml = new SimpleXMLElement($contents);
	foreach($xml->entry as $item) {

		$image = "";
		$tweet_url = "";
		if(!$t = Doctrine::getTable('Tweet')->findOneByTwitterId($item->id)) {
		  foreach($item->link as $link){
		    if($link["rel"] == "image"){
		      $image = $link["href"];
		    }
		    elseif($link["rel"] == "alternate"){
		      $tweet_url = $link["href"];
		    }
		  }
		  $t = new Tweet();
		  $t->setTwitterId($item->id);
		  $t->setTweetMonitorId($m->getId());
		  $t->setContent(str_replace('href', 'target="_blank" href', $item->content));
		  $t->setAvatar($image);
		  $t->setUrl($tweet_url);
		  $t->setAuthor($item->author->name);
		  $t->setAuthorUrl($item->author->uri);
		  $t->setDatePublished($item->published);
		  if($item['id'] != "tag:search.twitter.com,2005:8524984970"){
		    $t->save();
		    $i++;
		  }
		}
	}
	echo "\n".$i." tweets adicionados";

}

//mail('emersonestrella@gmail.com', 'Getting Tweets', 'Getting Tweets');

//$j = exec("php /var/astolfo/cronjobs/futebol.php");
//$i = file_get_contents("http://futebolclube.possum-cms.com/campeonatos/update");
//echo "\n\n".$i."\n\n";
//mail('emersonestrella@gmail.com', 'Update', $i."\n\n".$j);

die('FIM!');
