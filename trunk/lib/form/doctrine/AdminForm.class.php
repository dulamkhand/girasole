<?php

/**
 * Admin form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdminForm extends BaseAdminForm
{
  public function configure()
  {
        unset($this['logged_at'],$this['mod_permissions'],$this['cat_permissions']);
      
        // WIDGETS
        $this->widgetSchema['email']        = new sfWidgetFormInputText(array(), array());
        $this->widgetSchema['password']     = new sfWidgetFormInputPassword(array(), array());
        
        // VALIDATORS
        $this->validatorSchema['email']       = new sfValidatorEmail(array(), array());
        $this->validatorSchema['password']    = new sfValidatorPass();
  }

}
