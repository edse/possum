<?php

require_once dirname(__FILE__).'/../lib/todoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/todoGeneratorHelper.class.php';

/**
 * todo actions.
 *
 * @package    astolfo
 * @subpackage todo
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class todoActions extends autoTodoActions
{

  public function executeIndex(sfWebRequest $request)
  {
    parent::executeIndex($request);
    $this->filters = $this->configuration->getFilterForm($this->getFilters());  
    try{
      $this->query = Doctrine_Core::getTable('Todo')->createQuery()->addWhere('user_id = ?', (int)$this->getUser()->getGuardUser()->getId());
      $this->pager = $this->getPager();
    }catch(Exception $e){
      print "ERRO!";
    }
  }

  protected function getPager()
  {
    $pager = $this->configuration->getPager('Todo');
    $pager->setQuery($this->query);
    $pager->setPage($this->getPage());
    $pager->init();
    return $pager;
  }

}
