<?php

/**
 * Content form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContentForm extends BaseContentForm
{
  public function configure()
  {
      unset($this['id'],$this['category_name'],$this['type'],$this['created_at'], $this['nb_views'], 
            $this['cover'], $this['cover_width']);

      # WIDGETS
      $choices = Doctrine::getTable('Category')->doFetchSelection();
    	$this->widgetSchema['category_id'] = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:400px;height:24px;'));
      $this->widgetSchema['title']       = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));      
      $this->widgetSchema['intro']       = new sfWidgetFormTextarea(array(), array('style'=>'width:600px;height:150px;'));
    	#$this->widgetSchema['body']        = new sfWidgetFormFCKEditor(array('width'=>600, 'height'=>400));
    	$this->widgetSchema['body']        = new sfWidgetFormTextarea(array(), array('style'=>'width:600px;height:400px;'));
    	$this->widgetSchema['source']      = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));
    	$this->widgetSchema['sort']   		 = new sfWidgetFormInputText(array(), array('style'=>'width:40px;'));
    	$this->widgetSchema['is_featured'] = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
    	$this->widgetSchema['is_active']   = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
    	$choices = myTools::getArray('view_list');
    	$this->widgetSchema['view_list']   = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:400px;height:24px;'));
    	$choices = myTools::getArray('view_detail');
    	$this->widgetSchema['view_detail'] = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:400px;height:24px;'));


    	# VALIDATORS
    	$this->validatorSchema['category_id']     = new sfValidatorInteger(array(), array());
    	$this->validatorSchema['title']           = new sfValidatorString(array(), array());
    	$this->validatorSchema['intro']  	        = new sfValidatorPass();
    	$this->validatorSchema['body']            = new sfValidatorPass();
    	$this->validatorSchema['source']  	      = new sfValidatorUrl();
    	$this->validatorSchema['sort']  	        = new sfValidatorInteger(array('required'=>false));
    	$this->validatorSchema['is_featured']  	  = new sfValidatorPass();
    	$this->validatorSchema['is_active']  	    = new sfValidatorPass();
    	$this->validatorSchema['view_list']       = new sfValidatorPass();
    	$this->validatorSchema['view_detail']     = new sfValidatorPass();

  }
  

}