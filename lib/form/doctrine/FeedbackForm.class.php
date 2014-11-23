<?php

/**
 * Feedback form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FeedbackForm extends BaseFeedbackForm
{
  public function configure()
  {
    	# WIDGETS
      $this->widgetSchema['organization']= new sfWidgetFormInputText(array(), array('class'=>'feedback', 'value'=>'Байгууллага', 'id'=>'feedback_org')); // TODO: should be autocomplete
      $this->widgetSchema['name']        = new sfWidgetFormInputText(array(), array('class'=>'feedback', 'value'=>'Таны бүтэн нэр', 'id'=>'feedback_name'));
      $this->widgetSchema['email']       = new sfWidgetFormInputText(array(), array('class'=>'feedback', 'value'=>'Имэйл хаяг', 'id'=>'feedback_email'));
      $this->widgetSchema['phone']       = new sfWidgetFormInputText(array(), array('class'=>'feedback', 'value'=>'Утасны дугаар', 'id'=>'feedback_phone'));
    	$this->widgetSchema['message']     = new sfWidgetFormTextarea(array(), array('class'=>'feedback', 'value'=>'Санал хүсэлт', 'id'=>'feedback_message'));
    	  	
    	# VALIDATORS
    	$this->validatorSchema['organization']= new sfValidatorPass();
    	$this->validatorSchema['name'] 				= new sfValidatorString(array(), array());
    	$this->validatorSchema['email']       = new sfValidatorEmail(array(), array());
    	$this->validatorSchema['phone']       = new sfValidatorInteger(array(), array());
    	$this->validatorSchema['message']  	  = new sfValidatorString(array(), array());
  }
}
