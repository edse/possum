<?php

require_once dirname(__FILE__).'/../lib/channelGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/channelGeneratorHelper.class.php';

/**
 * channel actions.
 *
 * @package    astolfo
 * @subpackage channel
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class channelActions extends autoChannelActions
{
  
  public function executeIndex(sfWebRequest $request)
  {
    if(!$this->getUser()->getGuardUser()->hasPermission('admin'))
      $this->redirect('@homepage');
    parent::executeIndex($request);
  }

}
