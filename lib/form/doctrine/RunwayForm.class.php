<?php

/**
 * Runway form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class RunwayForm extends BaseRunwayForm
{
  public function configure()
  {
      unset($this['id'],$this['created_at'], $this['cover'], $this['date'], $this['designer_name']);
    
    	# WIDGETS
    	$choices = Doctrine::getTable('Season')->doFetchSelection();
    	$this->widgetSchema['season_id'] = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:400px;height:24px;'));

    	$choices = Doctrine::getTable('Designer')->doFetchSelection();
    	$this->widgetSchema['designer_id']     = new sfWidgetFormChoice(array('choices'=>$choices), array('style'=>'width:400px;height:24px;'));

      $this->widgetSchema['title']       = new sfWidgetFormInputText(array(), array('style'=>'width:400px;'));      
    	$this->widgetSchema['sort']   		 = new sfWidgetFormInputText(array(), array('size'=>30));
    	$this->widgetSchema['is_featured'] = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
    	$this->widgetSchema['is_active']   = new sfWidgetFormInputCheckbox(array(), array('value'=>1));

    	# VALIDATORS
    	$this->validatorSchema['title']       = new sfValidatorPass();
    	$this->validatorSchema['season_id']   = new sfValidatorPass();
    	$this->validatorSchema['designer_id'] = new sfValidatorPass();
    	$this->validatorSchema['sort']  	    = new sfValidatorInteger(array('required'=>false));
    	$this->validatorSchema['is_featured'] = new sfValidatorPass();
    	$this->validatorSchema['is_active']   = new sfValidatorPass();
  }

}