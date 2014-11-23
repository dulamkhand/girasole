<?php

/**
 * User form.
 *
 * @package    zzz
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RegisterForm extends BaseUserForm
{
  protected $_object;
  
  public function getObject1()
  {
      return $this->_object;
  }
  
  public function configure()
  {
      unset($this['id'],$this['username'],$this['fullname'],$this['activation_code'],$this['avator'],$this['image'],
            $this['created_at'],$this['updated_at'],$this['logged_at'],$this['ip'],
            $this['is_active'],$this['is_admin'],$this['about']);
      
      // WIDGETS
      $this->widgetSchema['email']        = new sfWidgetFormInputText(array(), array('style'=>'width:250px;'));
      $this->widgetSchema['lastname']     = new sfWidgetFormInputText(array(), array('style'=>'width:250px;'));
      $this->widgetSchema['firstname']    = new sfWidgetFormInputText(array(), array('style'=>'width:250px;'));
      $this->widgetSchema['mobile']       = new sfWidgetFormInputText(array(), array('style'=>'width:250px;'));
      $this->widgetSchema['password']     = new sfWidgetFormInputPassword(array(), array('style'=>'width:250px;'));
      
      // VALIDATORS
      $this->validatorSchema['email']    = new sfValidatorCallback(array('required'=>true, 'callback' => array($this, 'validateEmail')), array('required'=> 'Та имэйл хаягаа оруулна уу.'));
      $this->validatorSchema['lastname'] = new sfValidatorString(array(), array('required'=> 'Та овогоо оруулна уу.'));
      $this->validatorSchema['firstname']= new sfValidatorString(array(), array('required'=> 'Нэрээ оруулна уу.'));
      $this->validatorSchema['mobile']   = new sfValidatorString(array(), array('required'=> 'Утасны дугаараа оруулна уу.'));
      $this->validatorSchema['password']   = new sfValidatorString(array(), array('required'=> 'Нууц үгээ оруулна уу.'));
      
      // LABELS
      $this->widgetSchema->setLabel('email', 'Имэйл хаяг');
      $this->widgetSchema->setLabel('lastname', 'Овог');
      $this->widgetSchema->setLabel('firstname', 'Нэр');
      $this->widgetSchema->setLabel('mobile', 'Утасны дугаар');
      $this->widgetSchema->setLabel('password', 'Нууц үг');
  }
  
  
  public function validateEmail($validator, $value)
  {
      $user = Doctrine::getTable('User')->findOneByEmail($value);
      if ($user)
      {
          throw new sfValidatorError($validator, 'Энэ имэйл хаяг бүртгэлтэй байна. Та нууц үгээ мартсан бол энд дарна уу.');
      }
      $this->_object = $user;
  
      return $value;
  }

  public function validateConfirmPassword($validator, $value)
  {
      if($this->getObject1()->getPassword() != $value)
      {
          throw new sfValidatorError($validator, 'Давтан оруулсан нууц үг буруу байна.');
      }
      return $value;
  }
  


}