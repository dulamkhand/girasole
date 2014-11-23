<?php

/**
 * QuizOption form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuizOptionForm extends BaseQuizOptionForm
{
    public function configure()
    {
        // WIDGETS    	  
        $this->widgetSchema['question_id']  = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('QuizQuestion'), 'add_empty' => false));
        $this->widgetSchema['body']         = new sfWidgetFormTextarea(array(), array('style'=>'width:400px;height:150px;'));
        $this->widgetSchema['point']        = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
        
        // DEFAULT VALUE
        $this->setDefault('question_id', $this->getOption('questionId'));
  
        // VALIDATORS
        $this->validatorSchema['question_id'] = new sfValidatorPass();
        $this->validatorSchema['body']        = new sfValidatorString(array(), array());
        $this->validatorSchema['point']       = new sfValidatorInteger(array(), array());
        
    }

}