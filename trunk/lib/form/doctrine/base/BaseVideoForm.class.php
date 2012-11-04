<?php

/**
 * Video form base class.
 *
 * @method Video getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseVideoForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'object_type' => new sfWidgetFormInputText(),
      'object_id'   => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'description' => new sfWidgetFormTextarea(),
      'thumb'       => new sfWidgetFormInputText(),
      'embed'       => new sfWidgetFormInputText(),
      'sort'        => new sfWidgetFormInputText(),
      'iscover'     => new sfWidgetFormInputText(),
      'is_featured' => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'object_type' => new sfValidatorString(array('max_length' => 255)),
      'object_id'   => new sfValidatorInteger(),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'description' => new sfValidatorString(),
      'thumb'       => new sfValidatorString(array('max_length' => 255)),
      'embed'       => new sfValidatorString(array('max_length' => 255)),
      'sort'        => new sfValidatorInteger(),
      'iscover'     => new sfValidatorInteger(),
      'is_featured' => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('video[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Video';
  }

}
