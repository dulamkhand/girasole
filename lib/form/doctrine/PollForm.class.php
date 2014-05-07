<?php

/**
 * Poll form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PollForm extends BasePollForm
{
  public function configure()
  {
      unset($this['content_id']);

      // WIDGETS
      $this->widgetSchema['title']   = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['body']    = new sfWidgetFormTextarea(array(), array());
      $this->widgetSchema['options_addable'] = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      $this->widgetSchema['multiple_choice'] = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      
      // VALIDATORS
      $this->validatorSchema['title'] = new sfValidatorString(array(), array());
      $this->validatorSchema['body']  = new sfValidatorPass();
      $this->validatorSchema['options_addable']  = new sfValidatorPass();
      $this->validatorSchema['multiple_choice']  = new sfValidatorPass();
  }

}
