<?php

/**
 * Quiz form base class.
 *
 * @method Quiz getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseQuizForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'content_id'  => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'route'       => new sfWidgetFormInputText(),
      'body'        => new sfWidgetFormTextarea(),
      'sort'        => new sfWidgetFormInputText(),
      'nb_love'     => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'is_featured' => new sfWidgetFormInputCheckbox(),
      'created_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'content_id'  => new sfValidatorInteger(),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'route'       => new sfValidatorString(array('max_length' => 255)),
      'body'        => new sfValidatorString(),
      'sort'        => new sfValidatorInteger(),
      'nb_love'     => new sfValidatorInteger(),
      'is_active'   => new sfValidatorBoolean(),
      'is_featured' => new sfValidatorBoolean(),
      'created_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('quiz[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Quiz';
  }

}
