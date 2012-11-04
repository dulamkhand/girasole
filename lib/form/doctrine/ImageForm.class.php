<?php

/**
 * Image form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ImageForm extends BaseImageForm
{
  public function configure()
  {
    unset($this['id'],$this['created_at']);
      
      # WIDGETS
      $choices = myTools::getArray('image_type');
    	$this->widgetSchema['object_type'] = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:400px;height:24px;', 'onchange'=>'loadObjects();'));
    	$this->setDefault('object_type', $this->getOption('objectType'));
    	
    	$this->widgetSchema['title']       = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));      
      $this->widgetSchema['description'] = new sfWidgetFormTextarea(array(), array('style'=>'width:400px;height:200px;'));
      $this->widgetSchema['filename']    = new sfWidgetFormInputFile(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['sort']        = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      $this->widgetSchema['iscover']     = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      $this->widgetSchema['folder']      = new sfWidgetFormInputHidden(array(), array('value'=>'image201205')); //TODO: change folder name
      
      
      # VALIDATORS
    	$this->validatorSchema['title']       = new sfValidatorString(array(), array());
    	$this->validatorSchema['object_type'] = new sfValidatorPass();
    	$this->validatorSchema['object_id']   = new sfValidatorPass();
    	$this->validatorSchema['description'] = new sfValidatorPass();
    	$this->validatorSchema['sort']        = new sfValidatorPass();
    	$this->validatorSchema['iscover']     = new sfValidatorPass();
    	$this->validatorSchema['folder']      = new sfValidatorPass();
      $this->validatorSchema['filename']    = new sfValidatorFile(
                                                  array('required' => false,
                                                      'path'       => sfConfig::get("sf_upload_dir")."/image201205",
                                                      'max_size'   => 209715200,
                                                      'mime_types' =>  array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif',)),
                                                  array(
                                                      'max_size'   => 'Файлын хэмжээ хамгийн ихдээ 20MB байна',
                                                      'mime_types' => 'Дараах өргөтгөлтэй файлууд зөвшөөрөгдөнө: jpg, png, gif'));

      $this->widgetSchema->setHelp('filename', 'max-height:650px | width:400px, 700px | ext:png, gif, jpg | max-size:20MB');
  }
  
}