<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * @package    symfony
 * @subpackage plugin
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: BasesfGuardAuthActions.class.php 23800 2009-11-11 23:30:50Z Kris.Wallsmith $
 */
class BasesfGuardAuthActions extends sfActions
{
  public function executeSignin($request)
  {
    $this->getUser()->setCulture('en_US');
    $user = $this->getUser();
    if ($user->isAuthenticated())
    {
      return $this->redirect('@homepage');
    }

    $class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
    $this->form = new $class();

    if ($request->isMethod('post'))
    {
      
      
      $this->form->bind($request->getParameter('signin'));
   
      // retrieve the given username
      $taintedValues = $this->form->getTaintedValues();
   
      // check that he hasn't already reached the threshold
      if (!sfAntiBruteForceManager::canTryAuthentication($taintedValues['username']))
      {
        // go away hacker!
        //$this->forward404();
        //return sfView::NONE;
        header("Location: http://possum-cms.com");
        die();

      }

      if ($this->form->isValid())
      {
        // authenticate user and redirect
        $values = $this->form->getValues(); 
        $this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);
        
        // always redirect to a URL set in app.yml
        // or to the referer
        // or to the homepage
        $signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer($request->getReferer()));

        if($user->getGuardUser()->getId() > 0)
          $this->getUser()->setAuthenticated(true);

        //log
        $log = new Log();
        $log->setAction('Login');
        if($user)
          $log->setUserId($user->getGuardUser()->getId());
        $log->setIp($request->getRemoteAddress());
        $log->save();
        
        return $this->redirect('' != $signinUrl ? $signinUrl : '@dashboard');

      }
      else
      {
        // on failed authentication, increase counter for this user
        sfAntiBruteForceManager::notifyFailedAuthentication($taintedValues['username']);
        
        //log
        $log = new Log();
        $log->setAction('Login Failed');
        $log->setClass($taintedValues['username']);
        $log->setIp($request->getRemoteAddress());
        $log->save();

      }

    }
    else
    {
      if ($request->isXmlHttpRequest())
      {
        $this->getResponse()->setHeaderOnly(true);
        $this->getResponse()->setStatusCode(401);
        return sfView::NONE;
      }

      // if we have been forwarded, then the referer is the current URL
      // if not, this is the referer of the current request
      $user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

      $module = sfConfig::get('sf_login_module');
      if ($this->getModuleName() != $module)
      {
        return $this->redirect($module.'/'.sfConfig::get('sf_login_action'));
      }

      $this->getResponse()->setStatusCode(401);
    }
  }

  public function executeSignout($request)
  {
    
    $log = new Log();
    $log->setAction('Logout');
    if($this->getUser())
      $log->setUserId($this->getUser()->getGuardUser()->getId());
    $log->save();

    $this->getUser()->signOut();

    $signoutUrl = sfConfig::get('app_sf_guard_plugin_success_signout_url', $request->getReferer());

    $this->redirect('' != $signoutUrl ? $signoutUrl : '@homepage');
  }

  public function executeSecure($request)
  {
    $this->getResponse()->setStatusCode(403);
  }

  public function executePassword($request)
  {
    throw new sfException('This method is not yet implemented.');
  }
  
}
