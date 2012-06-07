<?php

require_once dirname(__FILE__).'/../lib/assettypeGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/assettypeGeneratorHelper.class.php';

/**
 * assettype actions.
 *
 * @package    astolfo
 * @subpackage assettype
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class assettypeActions extends autoAssettypeActions
{
  
  public function executeIndex(sfWebRequest $request)
  {
    if(!$this->getUser()->getGuardUser()->hasPermission('admin'))
      $this->redirect('@homepage');
    parent::executeIndex($request);
  }

}
