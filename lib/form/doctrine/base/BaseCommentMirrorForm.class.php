<?php

/**
 * CommentMirror form base class.
 *
 * @method CommentMirror getObject() Returns the current form's model object
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCommentMirrorForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'object_type' => new sfWidgetFormInputText(),
      'object_id'   => new sfWidgetFormInputText(),
      'created_at'  => new sfWidgetFormDateTime(),
      'user_id'     => new sfWidgetFormInputText(),
      'avator'      => new sfWidgetFormInputText(),
      'ip_address'  => new sfWidgetFormInputText(),
      'name'        => new sfWidgetFormInputText(),
      'text'        => new sfWidgetFormTextarea(),
      'nb_love'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'object_type' => new sfValidatorString(array('max_length' => 255)),
      'object_id'   => new sfValidatorInteger(),
      'created_at'  => new sfValidatorDateTime(),
      'user_id'     => new sfValidatorInteger(),
      'avator'      => new sfValidatorString(array('max_length' => 255)),
      'ip_address'  => new sfValidatorString(array('max_length' => 15)),
      'name'        => new sfValidatorString(array('max_length' => 255)),
      'text'        => new sfValidatorString(),
      'nb_love'     => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('comment_mirror[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CommentMirror';
  }

}
