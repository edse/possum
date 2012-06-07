<?php

/**
 * dashboard actions.
 *
 * @package    astolfo
 * @subpackage dashboard
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class dashboardActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->todos = Doctrine::getTable('Todo')->findByUserIdAndStatus(sfContext::getInstance()->getUser()->getGuardUser()->getId(),'Pendding');
    $this->assets = Doctrine_Core::getTable('Asset')->createQuery()->orderBy('id', 'desc')->limit(10)->execute();
  }
}
