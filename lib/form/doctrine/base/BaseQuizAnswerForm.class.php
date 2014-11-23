<?php

/**
 * QuizAnswer form base class.
 *
 * @method QuizAnswer getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuizAnswerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'quiz_id'     => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'route'       => new sfWidgetFormInputText(),
      'image'       => new sfWidgetFormInputText(),
      'body'        => new sfWidgetFormTextarea(),
      'point_start' => new sfWidgetFormInputText(),
      'point_end'   => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'sort'        => new sfWidgetFormInputText(),
      'nb_love'     => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'quiz_id'     => new sfValidatorInteger(),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'route'       => new sfValidatorString(array('max_length' => 255)),
      'image'       => new sfValidatorString(array('max_length' => 255)),
      'body'        => new sfValidatorString(),
      'point_start' => new sfValidatorNumber(),
      'point_end'   => new sfValidatorNumber(),
      'is_active'   => new sfValidatorBoolean(),
      'sort'        => new sfValidatorInteger(),
      'nb_love'     => new sfValidatorInteger(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('quiz_answer[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'QuizAnswer';
  }

}
