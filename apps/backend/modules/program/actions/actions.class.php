<?php

require_once dirname(__FILE__).'/../lib/programGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/programGeneratorHelper.class.php';

/**
 * program actions.
 *
 * @package    astolfo
 * @subpackage program
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class programActions extends autoProgramActions
{
  
  public function executeIndex(sfWebRequest $request)
  {
    if((!$this->getUser()->getGuardUser()->hasPermission('admin'))&&(!$this->getUser()->getGuardUser()->hasPermission('editor')))
      $this->redirect('@homepage');
    parent::executeIndex($request);
  }

}
