<?php

/**
 * Page form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PageForm extends BasePageForm
{
  public function configure()
  {
      unset($this['id'],$this['route'],$this['created_at']);
    
    	# WIDGETS
    	$choices = myTools::getArray('page');
    	$this->widgetSchema['type']        = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:400px;height:24px;'));
    	$this->widgetSchema['category_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'add_empty' => false));
      $this->widgetSchema['title']       = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));
    	$this->widgetSchema['content']     = new sfWidgetFormFCKEditor(array('width'=>800, 'height'=>400));
    	$this->widgetSchema['sort']   		 = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
    	$this->widgetSchema['is_active']   = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
    	
    	  	
    	# VALIDATORS
    	$this->validatorSchema['type']  	    = new sfValidatorPass();
    	$this->validatorSchema['category_id'] = new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Category'), 'required' => false));
    	$this->validatorSchema['title']       = new sfValidatorString(array(), array());
    	$this->validatorSchema['content']  	  = new sfValidatorPass();
    	$this->validatorSchema['sort']  	    = new sfValidatorPass();
    	$this->validatorSchema['is_active']   = new sfValidatorPass();
  }

  
}