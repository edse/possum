<?php
#ini_set("upload_max_filesize", "1700M");
#ini_set("post_max_size", "1700M");
#ini_set("memory_limit", "1700M");
#ini_set("max_input_time", "3600");
#ini_set("max_execution_time", "3600");
#set_time_limit(0);

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  
  #zend loader -start

  static protected $zendLoaded = false;
 
  static public function registerZend()
  {
    if (self::$zendLoaded)
    {
      return;
    }
 
    set_include_path(sfConfig::get('sf_lib_dir').'/vendor'.PATH_SEPARATOR.get_include_path());
    require_once sfConfig::get('sf_lib_dir').'/vendor/Zend/Loader/Autoloader.php';
    Zend_Loader_Autoloader::getInstance();
    self::$zendLoaded = true;
  }

  #zend loader -end

  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfDoctrineActAsTaggablePlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('sfAstolfoFormsPlugin');
    //$this->enablePlugins('sfRestWebServicePlugin');
    $this->enablePlugins('sfAntiBruteForcePlugin');
  }


  /**
  * Configure the Doctrine engine
  **/
  public function configureDoctrine(Doctrine_Manager $manager)
  {
    #$manager->setAttribute(Doctrine::ATTR_QUERY_CACHE, new Doctrine_Cache_Apc());
    $manager->setAttribute(Doctrine_Core::ATTR_QUOTE_IDENTIFIER, true);
  }

}
