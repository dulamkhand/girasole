<?php

/**
 * Category form base class.
 *
 * @method Category getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'type'        => new sfWidgetFormInputText(),
      'parent_id'   => new sfWidgetFormInputText(),
      'parent_name' => new sfWidgetFormInputText(),
      'name'        => new sfWidgetFormInputText(),
      'route'       => new sfWidgetFormInputText(),
      'position'    => new sfWidgetFormInputText(),
      'sort'        => new sfWidgetFormInputText(),
      'backcolor'   => new sfWidgetFormInputText(),
      'forecolor'   => new sfWidgetFormInputText(),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'        => new sfValidatorString(array('max_length' => 255)),
      'parent_id'   => new sfValidatorInteger(),
      'parent_name' => new sfValidatorString(array('max_length' => 255)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'route'       => new sfValidatorString(array('max_length' => 255)),
      'position'    => new sfValidatorString(array('max_length' => 255)),
      'sort'        => new sfValidatorInteger(),
      'backcolor'   => new sfValidatorString(array('max_length' => 255)),
      'forecolor'   => new sfValidatorString(array('max_length' => 255)),
      'is_active'   => new sfValidatorBoolean(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Category';
  }

}
