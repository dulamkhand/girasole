<?php

/**
 * Page form base class.
 *
 * @method Page getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'category_id' => new sfWidgetFormInputText(),
      'type'        => new sfWidgetFormInputText(),
      'route'       => new sfWidgetFormInputText(),
      'title'       => new sfWidgetFormInputText(),
      'content'     => new sfWidgetFormTextarea(),
      'sort'        => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'is_active'   => new sfWidgetFormInputCheckbox(),
      'nb_love'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'category_id' => new sfValidatorInteger(),
      'type'        => new sfValidatorString(array('max_length' => 255)),
      'route'       => new sfValidatorString(array('max_length' => 255)),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'content'     => new sfValidatorString(),
      'sort'        => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
      'is_active'   => new sfValidatorBoolean(),
      'nb_love'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('page[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Page';
  }

}
