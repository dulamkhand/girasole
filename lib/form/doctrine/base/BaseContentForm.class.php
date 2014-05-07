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
      'id'                   => new sfWidgetFormInputHidden(),
      'type'                 => new sfWidgetFormInputText(),
      'parent_category_id'   => new sfWidgetFormInputText(),
      'parent_category_name' => new sfWidgetFormInputText(),
      'category_id'          => new sfWidgetFormInputText(),
      'category_name'        => new sfWidgetFormInputText(),
      'title'                => new sfWidgetFormInputText(),
      'route'                => new sfWidgetFormInputText(),
      'cover'                => new sfWidgetFormInputText(),
      'cover_width'          => new sfWidgetFormInputText(),
      'intro'                => new sfWidgetFormTextarea(),
      'body'                 => new sfWidgetFormTextarea(),
      'source'               => new sfWidgetFormInputText(),
      'source_link'          => new sfWidgetFormTextarea(),
      'sort'                 => new sfWidgetFormInputText(),
      'nb_views'             => new sfWidgetFormInputText(),
      'nb_love'              => new sfWidgetFormInputText(),
      'nb_comment'           => new sfWidgetFormInputText(),
      'nb_discuss'           => new sfWidgetFormInputText(),
      'is_active'            => new sfWidgetFormInputCheckbox(),
      'is_new'               => new sfWidgetFormInputCheckbox(),
      'is_top'               => new sfWidgetFormInputCheckbox(),
      'is_featured'          => new sfWidgetFormInputCheckbox(),
      'is_featured_home'     => new sfWidgetFormInputCheckbox(),
      'is_featured_home1'    => new sfWidgetFormInputCheckbox(),
      'is_discuss'           => new sfWidgetFormInputCheckbox(),
      'ask18'                => new sfWidgetFormInputCheckbox(),
      'quiz_id'              => new sfWidgetFormInputText(),
      'poll_id'              => new sfWidgetFormInputText(),
      'coupon_id'            => new sfWidgetFormInputText(),
      'created_at'           => new sfWidgetFormDateTime(),
      'updated_at'           => new sfWidgetFormDateTime(),
      'admin_id'             => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'), 'add_empty' => false)),
      'author_id'            => new sfWidgetFormInputText(),
      'author_show'          => new sfWidgetFormInputCheckbox(),
      'photographer_id'      => new sfWidgetFormInputText(),
      'photographer_show'    => new sfWidgetFormInputCheckbox(),
      'keywords'             => new sfWidgetFormTextarea(),
      'related_ids'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'type'                 => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'parent_category_id'   => new sfValidatorInteger(),
      'parent_category_name' => new sfValidatorString(array('max_length' => 255)),
      'category_id'          => new sfValidatorInteger(),
      'category_name'        => new sfValidatorString(array('max_length' => 255)),
      'title'                => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'route'                => new sfValidatorString(array('max_length' => 255)),
      'cover'                => new sfValidatorString(array('max_length' => 255)),
      'cover_width'          => new sfValidatorInteger(),
      'intro'                => new sfValidatorString(array('required' => false)),
      'body'                 => new sfValidatorString(array('required' => false)),
      'source'               => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'source_link'          => new sfValidatorString(array('max_length' => 500)),
      'sort'                 => new sfValidatorInteger(array('required' => false)),
      'nb_views'             => new sfValidatorInteger(array('required' => false)),
      'nb_love'              => new sfValidatorInteger(array('required' => false)),
      'nb_comment'           => new sfValidatorInteger(array('required' => false)),
      'nb_discuss'           => new sfValidatorInteger(array('required' => false)),
      'is_active'            => new sfValidatorBoolean(),
      'is_new'               => new sfValidatorBoolean(),
      'is_top'               => new sfValidatorBoolean(),
      'is_featured'          => new sfValidatorBoolean(),
      'is_featured_home'     => new sfValidatorBoolean(),
      'is_featured_home1'    => new sfValidatorBoolean(),
      'is_discuss'           => new sfValidatorBoolean(array('required' => false)),
      'ask18'                => new sfValidatorBoolean(),
      'quiz_id'              => new sfValidatorInteger(array('required' => false)),
      'poll_id'              => new sfValidatorInteger(),
      'coupon_id'            => new sfValidatorInteger(),
      'created_at'           => new sfValidatorDateTime(),
      'updated_at'           => new sfValidatorDateTime(array('required' => false)),
      'admin_id'             => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Admin'))),
      'author_id'            => new sfValidatorInteger(array('required' => false)),
      'author_show'          => new sfValidatorBoolean(),
      'photographer_id'      => new sfValidatorInteger(array('required' => false)),
      'photographer_show'    => new sfValidatorBoolean(),
      'keywords'             => new sfValidatorString(),
      'related_ids'          => new sfValidatorString(array('max_length' => 255)),
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
