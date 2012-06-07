<?php

require_once dirname(__FILE__).'/../lib/tweet_monitorGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/tweet_monitorGeneratorHelper.class.php';

/**
 * tweet_monitor actions.
 *
 * @package    astolfo
 * @subpackage tweet_monitor
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tweet_monitorActions extends autoTweet_monitorActions
{
  

  public function executeListTweets(sfWebRequest $request)
  {
    if($this->tweet_monitor = $this->getRoute()->getObject()){
      $this->forward('tweet', 'ListTweets', array('tweet_monitor_id' => $this->tweet_monitor->getId()));
      echo ">>>".$this->tweet_monitor->getId();
    }else{
      $this->getUser()->setFlash('error', "Tweet monitor asset não encontrado!");
    }
  }

  public function executeListSync(sfWebRequest $request)
  {
    // sorting
    if ($request->getParameter('sort') && $this->isValidSortColumn($request->getParameter('sort')))
    {
      $this->setSort(array($request->getParameter('sort'), $request->getParameter('sort_type')));
    }
    // pager
    if ($request->getParameter('page'))
    {
      $this->setPage($request->getParameter('page'));
    }
    $this->pager = $this->getPager();
    $this->sort = $this->getSort();

    $this->filters = $this->configuration->getFilterForm($this->getFilters());
    $this->setTemplate('index');
    
    if($this->tweet_monitor = $this->getRoute()->getObject()){
      $url = "http://search.twitter.com/search.atom?rpp=100&nocache=".time()."&q=".urlencode($this->tweet_monitor->getQuery());
      //echo ">>>>".$url;
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
          $t->setTweetMonitorId($this->tweet_monitor->getId());
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
      $this->getUser()->setFlash('notice', $i." tweets adicionados");
    }else{
      $this->getUser()->setFlash('error', "Tweet monitor asset não encontrado!");
    }
    $this->i = $i;
  }

}
