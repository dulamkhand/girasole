<?php

/**
 * Quiz form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuizForm extends BaseQuizForm
{
  public function configure()
  {
      unset($this['content_id']);

      // WIDGETS
      $this->widgetSchema['title']   = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['body']    = new sfWidgetFormTextarea(array(), array());
      
      // VALIDATORS
      $this->validatorSchema['title'] = new sfValidatorString(array(), array());
      $this->validatorSchema['body']  = new sfValidatorPass(array(), array());
  }

}
