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
      'id'          => new sfWidgetFormInputHidden(),
      'object_type' => new sfWidgetFormInputText(),
      'object_id'   => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'body'        => new sfWidgetFormTextarea(),
      'sort'        => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputText(),
      'is_featured' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'object_type' => new sfValidatorString(array('max_length' => 255)),
      'object_id'   => new sfValidatorInteger(),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'body'        => new sfValidatorString(),
      'sort'        => new sfValidatorInteger(),
      'is_active'   => new sfValidatorInteger(),
      'is_featured' => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
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
