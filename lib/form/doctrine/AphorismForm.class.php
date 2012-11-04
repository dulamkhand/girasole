<?php

/**
 * Aphorism form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AphorismForm extends BaseAphorismForm
{
  public function configure()
  {
      unset($this['id'],$this['created_at']);
      
      // WIDGETS
      $this->widgetSchema['text']        = new sfWidgetFormTextarea(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['source']      = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['sort']        = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      

      // VALIDATORS
      $this->validatorSchema['text']      = new sfValidatorString(array(), array());
    	$this->validatorSchema['source']  	= new sfValidatorPass();
      $this->validatorSchema['sort']      = new sfValidatorPass();
  }

}