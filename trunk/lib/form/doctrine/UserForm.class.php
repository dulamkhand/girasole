<?php

/**
 * User form.
 *
 * @package    zzz
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class UserForm extends BaseUserForm
{
  public function configure()
  {
      unset($this['username'],$this['firstname'],$this['lastname'],$this['activation_code'],$this['ip'],$this['logged_at']);
      
      // WIDGETS
      $this->widgetSchema['email']        = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['fullname']     = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['password']     = new sfWidgetFormInputPassword(array(), array());
      $this->widgetSchema['about']        = new sfWidgetFormTextarea(array(), array());
      $this->widgetSchema['mobile']       = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['avator']       = new sfWidgetFormInputFile(array(), array());
      $this->widgetSchema['image']        = new sfWidgetFormInputFile(array(), array());
      $this->widgetSchema['is_admin']     = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      

      // VALIDATORS
      $this->validatorSchema['email']       = new sfValidatorEmail(array(), array());
      $this->validatorSchema['fullname']    = new sfValidatorString(array(), array());
      $this->validatorSchema['password']    = new sfValidatorPass();
      $this->validatorSchema['about']       = new sfValidatorPass();
      $this->validatorSchema['mobile']      = new sfValidatorPass();
      $this->validatorSchema['is_admin']    = new sfValidatorPass();
      $this->validatorSchema['avator']       = new sfValidatorFile(
                                                  array('required' => false,
                                                      'path'       => sfConfig::get("sf_upload_dir")."/user",
                                                      'max_size'   => 209715200,
                                                      'mime_types' =>  array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif',)),
                                                  array(
                                                      'max_size'   => 'Файлын хэмжээ хамгийн ихдээ 20MB байна',
                                                      'mime_types' => 'Дараах өргөтгөлтэй файлууд зөвшөөрөгдөнө: jpg, png, gif'));
      $this->validatorSchema['image']       = new sfValidatorFile(
                                                  array('required' => false,
                                                      'path'       => sfConfig::get("sf_upload_dir")."/user",
                                                      'max_size'   => 209715200,
                                                      'mime_types' =>  array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif',)),
                                                  array(
                                                      'max_size'   => 'Файлын хэмжээ хамгийн ихдээ 20MB байна',
                                                      'mime_types' => 'Дараах өргөтгөлтэй файлууд зөвшөөрөгдөнө: jpg, png, gif'));
      
      $this->widgetSchema->setHelp('is_admin', 'When true, user is availale for author list (in content from)');
      
  }
  


}