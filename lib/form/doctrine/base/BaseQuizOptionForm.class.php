<?php

/**
 * QuizOption form base class.
 *
 * @method QuizOption getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuizOptionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'question_id' => new sfWidgetFormInputText(),
      'route'       => new sfWidgetFormInputText(),
      'body'        => new sfWidgetFormTextarea(),
      'point'       => new sfWidgetFormInputText(),
      'sort'        => new sfWidgetFormInputText(),
      'nb_love'     => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'question_id' => new sfValidatorInteger(),
      'route'       => new sfValidatorString(array('max_length' => 255)),
      'body'        => new sfValidatorString(),
      'point'       => new sfValidatorInteger(),
      'sort'        => new sfValidatorInteger(),
      'nb_love'     => new sfValidatorInteger(array('required' => false)),
      'created_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('quiz_option[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'QuizOption';
  }

}
