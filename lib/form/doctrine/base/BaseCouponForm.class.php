<?php

/**
 * Coupon form base class.
 *
 * @method Coupon getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCouponForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'type'       => new sfWidgetFormInputText(),
      'file'       => new sfWidgetFormInputText(),
      'route'      => new sfWidgetFormInputText(),
      'title'      => new sfWidgetFormInputText(),
      'body'       => new sfWidgetFormInputText(),
      'image'      => new sfWidgetFormInputText(),
      'nb_print'   => new sfWidgetFormInputText(),
      'is_active'  => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'       => new sfValidatorString(array('max_length' => 30)),
      'file'       => new sfValidatorString(array('max_length' => 255)),
      'route'      => new sfValidatorString(array('max_length' => 255)),
      'title'      => new sfValidatorString(array('max_length' => 255)),
      'body'       => new sfValidatorString(array('max_length' => 255)),
      'image'      => new sfValidatorString(array('max_length' => 255)),
      'nb_print'   => new sfValidatorInteger(),
      'is_active'  => new sfValidatorBoolean(),
      'created_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('coupon[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Coupon';
  }

}
