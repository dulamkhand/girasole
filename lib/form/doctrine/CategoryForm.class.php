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
      unset($this['id'],$this['type']);
      
      // WIDGETS
      $choices = Doctrine::getTable('Category')->doFetchSelection();
      $choices[0] = "---";
      $this->widgetSchema['parent_id'] = new sfWidgetFormChoice(array('choices' => $choices), array('style'=>'width:400px;height:24px;'));
      $this->widgetSchema['name']      = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));
      $this->widgetSchema['sort']      = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
      

      // VALIDATORS
      $this->validatorSchema['parent_id'] = new sfValidatorPass();
      $this->validatorSchema['name']      = new sfValidatorString(array(), array());
      $this->validatorSchema['sort']      = new sfValidatorPass();
  }

}