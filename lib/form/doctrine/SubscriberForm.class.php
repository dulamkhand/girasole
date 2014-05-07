<?php

/**
 * Subscriber form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SubscriberForm extends BaseSubscriberForm
{
  public function configure()
  {
      // WIDGETS
      $this->widgetSchema['email']        = new sfWidgetFormInputText(array(), array());

      // VALIDATORS
      $this->validatorSchema['email']       = new sfValidatorEmail(array('required'=>false), array());   		 
  }
}
