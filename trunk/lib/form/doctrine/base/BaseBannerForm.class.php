<?php

/**
 * Banner form base class.
 *
 * @method Banner getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBannerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'path'       => new sfWidgetFormInputText(),
      'ext'        => new sfWidgetFormInputText(),
      'link'       => new sfWidgetFormInputText(),
      'route'      => new sfWidgetFormInputText(),
      'target'     => new sfWidgetFormInputCheckbox(),
      'position'   => new sfWidgetFormInputText(),
      'start_date' => new sfWidgetFormDate(),
      'end_date'   => new sfWidgetFormDate(),
      'sort'       => new sfWidgetFormInputText(),
      'is_active'  => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
      'nb_love'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'path'       => new sfValidatorString(array('max_length' => 255)),
      'ext'        => new sfValidatorString(array('max_length' => 255)),
      'link'       => new sfValidatorString(array('max_length' => 255)),
      'route'      => new sfValidatorString(array('max_length' => 255)),
      'target'     => new sfValidatorBoolean(array('required' => false)),
      'position'   => new sfValidatorString(array('max_length' => 255)),
      'start_date' => new sfValidatorDate(),
      'end_date'   => new sfValidatorDate(),
      'sort'       => new sfValidatorInteger(array('required' => false)),
      'is_active'  => new sfValidatorBoolean(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'nb_love'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('banner[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Banner';
  }

}
