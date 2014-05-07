<?php

require_once 'D://WORK//Symfony//lib//symfony14//lib/autoload/sfCoreAutoload.class.php';
//require_once dirname(__FILE__).'/../lib/vendor/symfony14/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
      $this->enablePlugins('sfDoctrinePlugin', 'sfFormExtraPlugin', 'sfCryptoCaptchaPlugin', 'sfThumbnailPlugin');
      //sfConfig::set('sf_web_dir', '/home1/urinesse/public_html/girasole');
      //sfConfig::set('sf_upload_dir', '/home1/urinesse/public_html/girasole/uploads');
  }

}
