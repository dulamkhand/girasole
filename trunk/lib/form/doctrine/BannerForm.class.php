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
      unset($this['id'],$this['created_at'],$this['ext'],$this['']);
      
      // WIDGETS
      $choices = myTools::getArray('banner_position');
      $this->widgetSchema['position']    = new sfWidgetFormChoice(array('choices' => $choices), array('style'=>'width:400px;height:24px;'));
      $this->widgetSchema['path']    = new sfWidgetFormInputFile(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['link']        = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['start_date']  = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['end_date']    = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['target']      = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      $this->widgetSchema['is_active']   = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      $this->widgetSchema['sort']        = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      

      // VALIDATORS
      $this->validatorSchema['position']  = new sfValidatorPass();
      $this->validatorSchema['link']      = new sfValidatorPass();
      $this->validatorSchema['start_date']= new sfValidatorPass();
      $this->validatorSchema['end_date']  = new sfValidatorPass();
    	$this->validatorSchema['target']  	= new sfValidatorPass();
    	$this->validatorSchema['is_active'] = new sfValidatorPass();
      $this->validatorSchema['sort']      = new sfValidatorPass();
      $this->validatorSchema['path']    = new sfValidatorFile(
                                                  array('required' => false,
                                                      'path'       => sfConfig::get("sf_upload_dir")."/rek",
                                                      'max_size'   => 209715200,
                                                      'mime_types' =>  array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif',)),
                                                  array(
                                                      'max_size'   => 'Файлын хэмжээ хамгийн ихдээ 20MB байна',
                                                      'mime_types' => 'Дараах өргөтгөлтэй файлууд зөвшөөрөгдөнө: jpg, png, gif'));
  }

}