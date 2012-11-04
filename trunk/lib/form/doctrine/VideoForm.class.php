<?php

/**
 * Video form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VideoForm extends BaseVideoForm
{
  public function configure()
  {
    unset($this['id'],$this['created_at'], $this['thumb']);
      
      # WIDGETS
      $choices = myTools::getArray('video_type');
    	$this->widgetSchema['object_type'] = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:400px;height:24px;', 'onchange'=>'loadObjects();'));
    	$this->setDefault('object_type', $this->getOption('object_type'));
    	
    	$this->widgetSchema['title']       = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));      
      $this->widgetSchema['description'] = new sfWidgetFormTextarea(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['embed']       = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['sort']        = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      $this->widgetSchema['iscover']     = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      $this->widgetSchema['is_featured'] = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      
      
      # VALIDATORS    	
    	$this->validatorSchema['title']       = new sfValidatorString(array(), array());
    	$this->validatorSchema['embed']       = new sfValidatorString(array(), array());
    	$this->validatorSchema['object_type'] = new sfValidatorPass();
    	$this->validatorSchema['object_id']   = new sfValidatorPass();
    	$this->validatorSchema['description'] = new sfValidatorPass();
    	$this->validatorSchema['sort']        = new sfValidatorPass();
    	$this->validatorSchema['is_featured'] = new sfValidatorPass();

      $this->widgetSchema->setHelp('embed', 'Youtube embed link example: '.htmlspecialchars('http://youtu.be/coulDkd1Jw0'));
  }

}