<?php

/**
 * Runway form base class.
 *
 * @method Runway getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseRunwayForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'title'         => new sfWidgetFormInputText(),
      'cover'         => new sfWidgetFormInputText(),
      'season_id'     => new sfWidgetFormInputText(),
      'season_name'   => new sfWidgetFormInputText(),
      'designer_id'   => new sfWidgetFormInputText(),
      'designer_name' => new sfWidgetFormInputText(),
      'is_featured'   => new sfWidgetFormInputText(),
      'is_active'     => new sfWidgetFormInputText(),
      'sort'          => new sfWidgetFormInputText(),
      'date'          => new sfWidgetFormDate(),
      'created_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 255)),
      'cover'         => new sfValidatorString(array('max_length' => 255)),
      'season_id'     => new sfValidatorInteger(),
      'season_name'   => new sfValidatorString(array('max_length' => 255)),
      'designer_id'   => new sfValidatorInteger(),
      'designer_name' => new sfValidatorString(array('max_length' => 255)),
      'is_featured'   => new sfValidatorInteger(),
      'is_active'     => new sfValidatorInteger(),
      'sort'          => new sfValidatorInteger(),
      'date'          => new sfValidatorDate(),
      'created_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('runway[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Runway';
  }

}
