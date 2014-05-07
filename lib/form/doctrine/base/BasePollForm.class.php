<?php

/**
 * Poll form base class.
 *
 * @method Poll getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePollForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'content_id'      => new sfWidgetFormInputText(),
      'title'           => new sfWidgetFormInputText(),
      'route'           => new sfWidgetFormInputText(),
      'body'            => new sfWidgetFormTextarea(),
      'options_addable' => new sfWidgetFormInputCheckbox(),
      'multiple_choice' => new sfWidgetFormInputCheckbox(),
      'sort'            => new sfWidgetFormInputText(),
      'is_active'       => new sfWidgetFormInputCheckbox(),
      'is_featured'     => new sfWidgetFormInputCheckbox(),
      'created_at'      => new sfWidgetFormDateTime(),
      'nb_love'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'content_id'      => new sfValidatorInteger(),
      'title'           => new sfValidatorString(array('max_length' => 255)),
      'route'           => new sfValidatorString(array('max_length' => 255)),
      'body'            => new sfValidatorString(),
      'options_addable' => new sfValidatorBoolean(),
      'multiple_choice' => new sfValidatorBoolean(),
      'sort'            => new sfValidatorInteger(),
      'is_active'       => new sfValidatorBoolean(),
      'is_featured'     => new sfValidatorBoolean(),
      'created_at'      => new sfValidatorDateTime(),
      'nb_love'         => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('poll[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Poll';
  }

}
