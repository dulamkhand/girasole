<?php

/**
 * User form.
 *
 * @package    zzz
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdminLoginForm extends BaseAdminForm
{
  protected $_object;
  
  public function getObject1() {
      return $this->_object;
  }
  
  public function configure()
  {
      unset($this['logged_at'],$this['mod_permissions'],$this['cat_permissions']);
      
      // WIDGETS
      $this->widgetSchema['email']        = new sfWidgetFormInputText(array(), array('style'=>'width:250px;'));
      $this->widgetSchema['password']     = new sfWidgetFormInputPassword(array(), array('style'=>'width:250px;'));
      
      // VALIDATORS
      $this->validatorSchema['email']    = new sfValidatorCallback(array('required'=>true, 'callback' => array($this, 'validateEmail')), array('required'=> 'Имэйл хаягаа оруулна уу.'));
      $this->validatorSchema['password'] = new sfValidatorCallback(array('required'=>true, 'callback' => array($this, 'validatePassword')), array('required'=>'Нууц үгээ оруулна уу.'));
  }
  
  
  public function validateEmail($validator, $value)
  {
      $admin = Doctrine::getTable('Admin')->doFetchOne(array('email'=>$value));
      if (!$admin)
      {
        
          throw new sfValidatorError($validator, 'Email not found!');
      }
      $this->_object = $admin;
  
      return $value;
  }


  public function validatePassword($validator, $value)
  {
      if($admin = $this->_object) {
          if($admin->getPassword() != md5($value)) {
              throw new sfValidatorError($validator, 'Invalid password!');
          }
      }
      return $value;
  }
  


}