<?php

/**
 * QuizQuestion form base class.
 *
 * @method QuizQuestion getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuizQuestionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'quiz_id'    => new sfWidgetFormInputText(),
      'route'      => new sfWidgetFormInputText(),
      'number'     => new sfWidgetFormInputText(),
      'body'       => new sfWidgetFormTextarea(),
      'is_active'  => new sfWidgetFormInputCheckbox(),
      'sort'       => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'nb_love'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'quiz_id'    => new sfValidatorInteger(),
      'route'      => new sfValidatorString(array('max_length' => 255)),
      'number'     => new sfValidatorInteger(),
      'body'       => new sfValidatorString(),
      'is_active'  => new sfValidatorBoolean(),
      'sort'       => new sfValidatorInteger(),
      'created_at' => new sfValidatorDateTime(),
      'nb_love'    => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('quiz_question[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'QuizQuestion';
  }

}
