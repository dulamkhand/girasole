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
      unset($this['id'],$this['created_at'],$this['updated_at'],$this['logged_at'],$this['is_active'],$this['is_admin']);
      
      // WIDGETS
      $this->widgetSchema['email']        = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['username']     = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['fullname']     = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['password']     = new sfWidgetFormInputPassword(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['mobile']       = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['is_active']    = new sfWidgetFormInputHidden(array(), array('value'=>1));
      $this->widgetSchema['is_admin']     = new sfWidgetFormInputHidden(array(), array('value'=>1));
      

      // VALIDATORS
      $this->validatorSchema['username']    = new sfValidatorString(array(), array());
      $this->validatorSchema['fullname']    = new sfValidatorPass(array(), array());
      $this->validatorSchema['password']    = new sfValidatorPass();
      $this->validatorSchema['mobile']      = new sfValidatorPass();
      $this->validatorSchema['is_active']   = new sfValidatorPass();
      $this->validatorSchema['is_admin']    = new sfValidatorPass();
      $this->validatorSchema['email']       = new sfValidatorEmail(array(), array());
  }
  


}