<?php

/**
 * Content form base class.
 *
 * @method Content getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'type'          => new sfWidgetFormInputText(),
      'category_id'   => new sfWidgetFormInputText(),
      'category_name' => new sfWidgetFormInputText(),
      'title'         => new sfWidgetFormInputText(),
      'cover'         => new sfWidgetFormInputText(),
      'cover_width'   => new sfWidgetFormInputText(),
      'intro'         => new sfWidgetFormTextarea(),
      'body'          => new sfWidgetFormTextarea(),
      'source'        => new sfWidgetFormInputText(),
      'sort'          => new sfWidgetFormInputText(),
      'nb_views'      => new sfWidgetFormInputText(),
      'is_active'     => new sfWidgetFormInputText(),
      'is_featured'   => new sfWidgetFormInputText(),
      'view_list'     => new sfWidgetFormInputText(),
      'view_detail'   => new sfWidgetFormInputText(),
      'created_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'category_id'   => new sfValidatorInteger(),
      'category_name' => new sfValidatorString(array('max_length' => 255)),
      'title'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cover'         => new sfValidatorString(array('max_length' => 255)),
      'cover_width'   => new sfValidatorInteger(),
      'intro'         => new sfValidatorString(array('required' => false)),
      'body'          => new sfValidatorString(array('required' => false)),
      'source'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'sort'          => new sfValidatorInteger(array('required' => false)),
      'nb_views'      => new sfValidatorInteger(array('required' => false)),
      'is_active'     => new sfValidatorInteger(array('required' => false)),
      'is_featured'   => new sfValidatorInteger(array('required' => false)),
      'view_list'     => new sfValidatorString(array('max_length' => 255)),
      'view_detail'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'created_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Content';
  }

}
