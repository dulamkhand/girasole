<?php

/**
 * User form.
 *
 * @package    zzz
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class LoginForm extends BaseUserForm
{
  protected $_object;
  
  public function getObject1()
  {
      return $this->_object;
  }
  
  public function configure()
  {
      unset($this['id'],$this['username'],$this['fullname'],$this['lastname'],$this['firstname'],
            $this['mobile'],$this['activation_code'],$this['avator'],$this['image'],
            $this['created_at'],$this['updated_at'],$this['logged_at'],$this['ip'],
            $this['is_active'],$this['is_admin'],$this['about']);
      
      // WIDGETS
      $this->widgetSchema['email']        = new sfWidgetFormInputText(array(), array('style'=>'width:250px;'));
      $this->widgetSchema['password']     = new sfWidgetFormInputPassword(array(), array('style'=>'width:250px;'));
      
      // VALIDATORS
      $this->validatorSchema['email']    = new sfValidatorCallback(array('required'=>true, 'callback' => array($this, 'validateEmail')), array('required'=> 'Имэйл хаягаа оруулна уу.'));
      $this->validatorSchema['password'] = new sfValidatorCallback(array('required'=>true, 'callback' => array($this, 'validatePassword')), array('required'=>'Нууц үгээ оруулна уу.'));
      
      // LABELS
      $this->widgetSchema->setLabel('email', 'Имэйл хаяг');
      $this->widgetSchema->setLabel('password', 'Нууц үг');
  }
  
  
  public function validateEmail($validator, $value)
  {
      $user = Doctrine::getTable('User')->findOneByEmail($value);
      if (!$user)
      {
        
          throw new sfValidatorError($validator, 'Энэ имэйл хаяг бүртгэлгүй байна. Та бүртгүүлэхийг хүсвэл энд дарна уу.');
      }
      $this->_object = $user;
  
      return $value;
  }


  public function validatePassword($validator, $value)
  {
      if($user = $this->_object)
      {
          if($user->getPassword() != md5($value))
          {
              throw new sfValidatorError($validator, 'Нууц үг буруу байна.');
          }
      }
      return $value;
  }
  


}