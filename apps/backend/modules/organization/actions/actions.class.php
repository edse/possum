<?php

require_once dirname(__FILE__).'/../lib/organizationGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/organizationGeneratorHelper.class.php';

/**
 * organization actions.
 *
 * @package    astolfo
 * @subpackage organization
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class organizationActions extends autoOrganizationActions
{
  
  public function executeIndex(sfWebRequest $request)
  {
    if(!$this->getUser()->getGuardUser()->hasPermission('admin'))
      $this->redirect('@homepage');
    parent::executeIndex($request);
  }

}
