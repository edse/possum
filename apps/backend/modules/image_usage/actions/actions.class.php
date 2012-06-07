<?php

require_once dirname(__FILE__).'/../lib/image_usageGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/image_usageGeneratorHelper.class.php';

/**
 * image_usage actions.
 *
 * @package    astolfo
 * @subpackage image_usage
 * @author     Emerson Estrella
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class image_usageActions extends autoImage_usageActions
{
  
  public function executeIndex(sfWebRequest $request)
  {
    if(!$this->getUser()->getGuardUser()->hasPermission('admin'))
      $this->redirect('@homepage');
    parent::executeIndex($request);
  }

}
