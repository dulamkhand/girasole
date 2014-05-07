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
    unset($this['id'],$this['created_at'],$this['nb_love']);
      
      # WIDGETS
      $choices = myTools::getArray('objectType');
    	$this->widgetSchema['object_type'] = new sfWidgetFormChoice(array('choices'=>$choices), array('onchange'=>'loadObjects();'));
    	$this->setDefault('object_type', $this->getOption('objectType'));        	
    	
    	$this->widgetSchema['title']       = new sfWidgetFormFCKEditor(array('width'=>600, 'height'=>100));
      $this->widgetSchema['description'] = new sfWidgetFormFCKEditor(array('width'=>600, 'height'=>200));
      $this->widgetSchema['filename']    = new sfWidgetFormInputFile(array(), array());
      $this->widgetSchema['sort']        = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      $this->widgetSchema['iscover']     = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      
      $object = $this->getObject();
    	$folder = ($object && $object->getFolder()) ? $object->getFolder() : "image2013b";
      $this->widgetSchema['folder']      = new sfWidgetFormInputHidden(array(), array('value'=>$folder)); //TODO: change folder name
      
      
      # VALIDATORS
    	$this->validatorSchema['title']       = new sfValidatorPass();
    	$this->validatorSchema['object_type'] = new sfValidatorPass();
    	$this->validatorSchema['object_id']   = new sfValidatorPass();
    	$this->validatorSchema['description'] = new sfValidatorPass();
    	$this->validatorSchema['sort']        = new sfValidatorPass();
    	$this->validatorSchema['iscover']     = new sfValidatorPass();
    	$this->validatorSchema['folder']      = new sfValidatorPass();
    	
      $this->validatorSchema['filename']    = new sfValidatorFile(
                                                  array('required' => $this->getObject()->isNew(),
                                                      'path'       => sfConfig::get("sf_upload_dir")."/".$folder,
                                                      'max_size'   => 209715200,
                                                      'mime_types' =>  array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif',)),
                                                  array(
                                                      'max_size'   => 'Файлын хэмжээ хамгийн ихдээ 20MB байна',
                                                      'mime_types' => 'Дараах өргөтгөлтэй файлууд зөвшөөрөгдөнө: jpg, png, gif'));

      $this->widgetSchema->setHelp('filename', 'width:600px, height:450px, ext: png, gif, jpg, max-size:5MB');
  }
  
}