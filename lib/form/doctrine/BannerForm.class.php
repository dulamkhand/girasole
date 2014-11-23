<?php

/**
 * Banner form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BannerForm extends BaseBannerForm
{
  public function configure()
  {
      unset($this['ext']);
      $host = sfConfig::get('app_host');
      
      // WIDGETS
      $choices = myTools::getArray('bannerPosition');
      $this->widgetSchema['position']    = new sfWidgetFormChoice(array('choices' => $choices), array());
      $this->widgetSchema['path']    = new sfWidgetFormInputFile(array(), array());
      $this->widgetSchema['link']        = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['target']      = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      
      $this->widgetSchema['start_date']  = new sfWidgetFormJQueryDateCustom(array('image'=>$host.'images/icons/calendar.png'), array('style'=>'width:60px;'));
      $this->widgetSchema['end_date']    = new sfWidgetFormJQueryDateCustom(array('image'=>$host.'images/icons/calendar.png'), array('style'=>'width:60px;'));

      // VALIDATORS
      $this->validatorSchema['position']  = new sfValidatorPass();
      $this->validatorSchema['link']      = new sfValidatorPass();
      $this->validatorSchema['target']  	= new sfValidatorPass();
      $this->validatorSchema['start_date']= new sfValidatorPass();
      $this->validatorSchema['end_date']  = new sfValidatorPass();
      $this->validatorSchema['path']    = new sfValidatorFile(
                                                  array('required' => false,
                                                      'path'       => sfConfig::get("sf_upload_dir")."/b",
                                                      'max_size'   => 104857600,
                                                      'mime_types' =>  array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif',)),
                                                  array(
                                                      'max_size'   => 'Файлын хэмжээ хамгийн ихдээ 10MB байна',
                                                      'mime_types' => 'Дараах өргөтгөлтэй файлууд зөвшөөрөгдөнө: jpg, png, gif'));
  }

}