<?php

require_once dirname(__FILE__).'/../lib/categoryGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/categoryGeneratorHelper.class.php';

/**
 * category actions.
 *
 * @package    astolfo
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends autoCategoryActions
{
  
  public function executeIndex(sfWebRequest $request)
  {
    if((!$this->getUser()->getGuardUser()->hasPermission('admin'))&&(!$this->getUser()->getGuardUser()->hasPermission('editor')))
      $this->redirect('@homepage');
    parent::executeIndex($request);
  }

}
