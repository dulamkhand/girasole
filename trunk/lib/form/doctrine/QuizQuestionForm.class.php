<?php

/**
 * QuizQuestion form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuizQuestionForm extends BaseQuizQuestionForm
{
  public function configure()
  {
        // WIDGETS
        $this->widgetSchema['quiz_id']     = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Quiz'), 'add_empty' => false));
        $this->widgetSchema['number']      = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
        $this->widgetSchema['body']        = new sfWidgetFormTextarea(array(), array('style'=>'width:400px;height:150px;'));

        // DEFAULTS
        $this->setDefault('quiz_id', $this->getOption('quizId'));
        
        // VALIDATORS
        $this->validatorSchema['quiz_id']  = new sfValidatorPass();
        $this->validatorSchema['number']   = new sfValidatorInteger(array(), array());
        $this->validatorSchema['body']     = new sfValidatorString(array(), array());
  }

}
