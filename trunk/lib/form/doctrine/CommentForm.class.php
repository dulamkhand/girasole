<?php

/**
 * Comment form.
 *
 * @package    barilga
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CommentForm extends BaseCommentForm
{
  public function configure()
  {
      unset($this['id'],$this['ip_address'],$this['user_id'],$this['created_at']);
      
      // WIDGETS
      $this->widgetSchema['body']       = new sfWidgetFormFCKEditor(array('width'=>520, 'height'=>100));
      $this->widgetSchema['captcha']    = new sfWidgetFormInputText(array(), array('style'=>'width:75px;'));
      
      $this->validatorSchema['body']    = new sfValidatorString(array('required'=>true), array('required'=>'&darr; Утга оруулна уу &darr;'));
      $this->validatorSchema['captcha'] = new sfValidatorSfCryptoCaptcha(array('required' => true, 'trim' => true),
                                                   array('wrong_captcha' => '&darr; Буруу код оруулсан байна &darr;'));
                                                   
      $this->validatorSchema['object_type'] = new sfValidatorPass();
      $this->validatorSchema['object_id']   = new sfValidatorPass();
      
      // LABELS
      $this->widgetSchema->setLabel('captcha', 'Код *');
  }


}