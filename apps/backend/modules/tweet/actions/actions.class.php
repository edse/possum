<?php

require_once dirname(__FILE__).'/../lib/tweetGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/tweetGeneratorHelper.class.php';

/**
 * tweet actions.
 *
 * @package    astolfo
 * @subpackage tweet
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class tweetActions extends autoTweetActions
{

  public function executeListTweets(sfWebRequest $request)
  {
    parent::executeIndex($request); 
    $this->filters = $this->configuration->getFilterForm($this->getFilters());
    $this->tweet_monitor = $this->getRoute()->getObject();
    if($this->tweet_monitor){
      $this->query = Doctrine_Query::create()
        ->select('t.*')
        ->from('Tweet t')
        ->where('t.tweet_monitor_id = ?', (int)$this->tweet_monitor->getId())
        ->orderBy('t.id desc');
      $this->pager = $this->getPager();
    }
    $this->setTemplate('index');
  }

  protected function getFilters()
  {
    return $this->getUser()->getAttribute('tweet.filters', $this->configuration->getFilterDefaults(), 'admin_module');
  }

  protected function setFilters(array $filters)
  {
    return $this->getUser()->setAttribute('tweet.filters', $filters, 'admin_module');
  }

  protected function getPager()
  {
    $pager = $this->configuration->getPager('Tweet');
    $pager->setQuery($this->query);
    $pager->setPage($this->getPage());
    $pager->init();

    return $pager;
  }

}
