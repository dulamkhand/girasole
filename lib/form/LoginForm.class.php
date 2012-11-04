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
      unset($this['id'],$this['username'],$this['lastname'],$this['firstname'],$this['mobile'],$this['activation_code'],
            $this['created_at'],$this['updated_at'],$this['logged_at'], $this['is_active'],$this['is_admin']);
      
      // WIDGETS
      $this->widgetSchema['email']        = new sfWidgetFormInputText(array(), array('size'=>30));
      $this->widgetSchema['password']     = new sfWidgetFormInputPassword(array(), array('size'=>30));
      
      // VALIDATORS
      $this->validatorSchema['email']    = new sfValidatorCallback(array('required'=>true, 'callback' => array($this, 'validateEmail')), array('required'=> 'Required.'));
      $this->validatorSchema['password'] = new sfValidatorCallback(array('required'=>true, 'callback' => array($this, 'validatePassword')), array('required'=>'Required.'));
      
      // LABELS
      $this->widgetSchema->setLabel('email', 'Email');
      $this->widgetSchema->setLabel('password', 'Password');
  }
  
  
  public function validateEmail($validator, $value)
  {
      $user = Doctrine::getTable('User')->findOneByEmail($value);
      if (!$user)
      {
        
          throw new sfValidatorError($validator, 'Email not found.');
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
              throw new sfValidatorError($validator, 'Invalid password.');
          }
      }
      return $value;
  }
  


}