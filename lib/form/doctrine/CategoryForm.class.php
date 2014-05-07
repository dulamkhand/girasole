<?php

/**
 * Category form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CategoryForm extends BaseCategoryForm
{
  
  public function configure()
  {
      unset($this['type'],$this['parent_name']);
      
      // WIDGETS
      $choices = myTools::getArray('catTypes');
      $this->widgetSchema['type'] = new sfWidgetFormChoice(array('choices' => $choices), array('style'=>'width:250px;height:24px;'));
      $this->widgetSchema['name']      = new sfWidgetFormInputText(array(), array());
      $choices = myTools::getArray('catPositions');
      $this->widgetSchema['position'] = new sfWidgetFormChoice(array('choices' => $choices), array());
      $this->widgetSchema['backcolor'] = new sfWidgetFormInputText(array(), array('style'=>'width:150px;'));
      $this->widgetSchema['forecolor'] = new sfWidgetFormInputText(array(), array('style'=>'width:150px;'));

      // VALIDATORS
      $this->validatorSchema['type'] = new sfValidatorPass();
      $this->validatorSchema['parent_id'] = new sfValidatorPass();
      $this->validatorSchema['name']      = new sfValidatorString(array(), array());
      $this->validatorSchema['position']  = new sfValidatorPass();
      $this->validatorSchema['backcolor'] = new sfValidatorPass();
      $this->validatorSchema['forecolor'] = new sfValidatorPass();
      
      $host = sfContext::getInstance()->getRequest()->getHost();
      $this->widgetSchema->setHelp('position', 'Branch1 хуудасны байрлал - <a href="http://'.$host.'/girasole/images/help/branch1pos.png" target="_blank">see here</a>');
      $this->widgetSchema->setHelp('backcolor', 'Одоохондоо хоосон үлдээж болно');
      $this->widgetSchema->setHelp('forecolor', 'Одоохондоо хоосон үлдээж болно');      
  }

}