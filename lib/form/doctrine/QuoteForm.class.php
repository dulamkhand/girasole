<?php

/**
 * Quote form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuoteForm extends BaseQuoteForm
{
  public function configure()
  {
    	# WIDGETS
      $this->widgetSchema['title']   = new sfWidgetFormInputText(array(), array());
      $this->widgetSchema['body']    = new sfWidgetFormTextarea(array(), array('style'=>'width:390px;height:150px;'));
      $this->widgetSchema['image']   = new sfWidgetFormInputFile(array(), array());
      $this->widgetSchema['author']  = new sfWidgetFormInputText(array(), array('style'=>'width:200px;'));
      $this->widgetSchema['date']    = new sfWidgetFormDate(array(), array('style'=>'width:60px;'));
      $choices = myTools::getArray('days');
      $this->widgetSchema['day']     = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:50px;'));
    	  	
    	# VALIDATORS
    	$this->validatorSchema['title']     = new sfValidatorPass();
      $this->validatorSchema['body']      = new sfValidatorPass();
      $this->validatorSchema['author']    = new sfValidatorPass();
      $this->validatorSchema['day']       = new sfValidatorInteger(array(), array());
      $this->validatorSchema['image']     = new sfValidatorFile(
                                                  array('required' => false,
                                                      'path'       => sfConfig::get("sf_upload_dir")."/quote",
                                                      'max_size'   => 209715200,
                                                      'mime_types' =>  array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif',)),
                                                  array(
                                                      'max_size'   => 'Файлын хэмжээ хамгийн ихдээ 20MB байна',
                                                      'mime_types' => 'Дараах өргөтгөлтэй файлууд зөвшөөрөгдөнө: jpg, png, gif'));
      $this->widgetSchema->setHelp('image', 'width:300px, ext: png, gif, jpg, max-size:5MB');

  }

}
