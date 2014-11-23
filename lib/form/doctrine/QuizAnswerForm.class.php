<?php

/**
 * QuizAnswer form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class QuizAnswerForm extends BaseQuizAnswerForm
{
  public function configure()
  {
        // WIDGETS
        $this->widgetSchema['quiz_id']     = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Quiz'), 'add_empty' => false));
        $this->widgetSchema['title']       = new sfWidgetFormInputText(array(), array());
        $this->widgetSchema['image']       = new sfWidgetFormInputFile(array(), array());
        $this->widgetSchema['body']        = new sfWidgetFormTextarea(array(), array());
        $this->widgetSchema['point_start'] = new sfWidgetFormInputText(array(), array('style'=>'width:100px;'));
        $this->widgetSchema['point_end']   = new sfWidgetFormInputText(array(), array('style'=>'width:100px;'));
        
        // DEFAULTS
        $this->setDefault('quiz_id', $this->getOption('quizId'));
        
        // VALIDATORS
        $this->validatorSchema['quiz_id']     = new sfValidatorPass();
        $this->validatorSchema['title']       = new sfValidatorString(array(), array());
        $this->validatorSchema['body']        = new sfValidatorString(array(), array());
        $this->validatorSchema['point_start'] = new sfValidatorInteger(array(), array());
        $this->validatorSchema['point_end']   = new sfValidatorInteger(array(), array());
        $this->validatorSchema['image']       = new sfValidatorFile(
                                                  array('required' => $this->getObject()->isNew(),
                                                      'path'       => sfConfig::get("sf_upload_dir")."/quiz",
                                                      'max_size'   => 209715200,
                                                      'mime_types' =>  array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif',)),
                                                  array(
                                                      'max_size'   => 'Файлын хэмжээ хамгийн ихдээ 20MB байна',
                                                      'mime_types' => 'Дараах өргөтгөлтэй файлууд зөвшөөрөгдөнө: jpg, png, gif'));

        $this->widgetSchema->setHelp('filename', 'width:600px, height:450px, ext: png, gif, jpg, max-size:5MB');
      
  }


}