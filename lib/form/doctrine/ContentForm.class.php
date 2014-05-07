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
      unset($this['type'],$this['category_name'], $this['parent_category_name'],$this['parent_category_id'],
            $this['nb_views'], $this['nb_comment'], $this['nb_discuss'], $this['cover'], $this['cover_width'],
            $this['is_new'],$this['poll_id'],$this['related_ids'],$this['']);
            
      $obj = $this->getObject();

      # WIDGETS
      $this->widgetSchema['title']       = new sfWidgetFormInputText(array(), array('style'=>'width:600px;'));
      //$this->widgetSchema['intro']       = new sfWidgetFormTextarea(array(), array('style'=>'width:600px;height:100px;'));
      $this->widgetSchema['intro']       = new sfWidgetFormFCKEditor(array('width'=>750, 'height'=>180));
    	$this->widgetSchema['body']        = new sfWidgetFormFCKEditor(array('width'=>750, 'height'=>350));
    	$this->widgetSchema['source']      = new sfWidgetFormInputText(array(), array('style'=>'width:194px;'));
    	$this->widgetSchema['source_link'] = new sfWidgetFormInputText(array(), array('style'=>'width:194px;'));    	
    	$this->widgetSchema['is_top']      = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
    	//$this->widgetSchema['is_new']          = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
    	$this->widgetSchema['is_featured']       = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
    	$this->widgetSchema['is_featured_home']  = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
    	$this->widgetSchema['is_featured_home1'] = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
    	$this->widgetSchema['is_discuss']        = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
  	  $this->widgetSchema['ask18']             = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
  	  $this->widgetSchema['keywords']        = new sfWidgetFormInputText(array(), array('style'=>'width:744px;'));    	

  	  # quiz
  	  $choice = Doctrine::getTable('Quiz')->doFetchSelection();
  	  $choice[0] = '';
  	  $this->widgetSchema['quiz_id'] = new sfWidgetFormChoice(array('choices'=>$choice), array());
  	  $this->setDefault('quiz_id', $obj->getQuizId());
  	  
  	  # coupon
  	  $choice = GlobalTable::doFetchSelection('Coupon', 'title', array());
  	  $choice[0] = '';
  	  $this->widgetSchema['coupon_id'] = new sfWidgetFormChoice(array('choices'=>$choice), array());
  	  //$this->setDefault('coupon_id', $obj ? $this->getObject()->getCouponId() : 0);
  	  
  	  # poll
  	  /*$choice = Doctrine::getTable('Poll')->doFetchSelection();
  	  $choice[0] = '';
  	  $this->widgetSchema['poll_id']           = new sfWidgetFormChoice(array('choices'=>$choice, 'default'=>0), array());
  	  $this->setDefault('poll_id', 0);*/
  	  $this->widgetSchema['admin_id']        = new sfWidgetFormInputHidden(array(), array('value'=>sfContext::getInstance()->getUser()->getId()));
  	  # author & photogtapher
    	$choices = Doctrine::getTable('User')->doFetchSelection(array('isAdmin'=>'1'));
    	$choices[0] = '';
    	$this->widgetSchema['author_id']       = new sfWidgetFormChoice(array('choices'=>$choices, 'default'=>0), array('style'=>'width:200px;'));
    	$this->widgetSchema['author_show']     = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
    	$this->widgetSchema['photographer_id'] = new sfWidgetFormChoice(array('choices'=>$choices, 'default'=>0), array('style'=>'width:200px;'));
    	$this->widgetSchema['photographer_show'] = new sfWidgetFormInputCheckbox(array(), array('value'=>1));
      $this->setDefault('author_id', 0);
      $this->setDefault('photographer_id', 0);

    	# VALIDATORS
    	$this->validatorSchema['category_id']     = new sfValidatorInteger(array(), array());
    	$this->validatorSchema['title']           = new sfValidatorString(array(), array());    	
    	$this->validatorSchema['intro']  	        = new sfValidatorPass();
    	$this->validatorSchema['body']            = new sfValidatorPass();
    	$this->validatorSchema['source']  	      = new sfValidatorPass();
    	$this->validatorSchema['source_link']  	  = new sfValidatorUrl(array('required'=>false), array());
    	$this->validatorSchema['is_featured']  	  = new sfValidatorPass();
    	$this->validatorSchema['is_featured_home']  = new sfValidatorPass();
    	$this->validatorSchema['is_featured_home1'] = new sfValidatorPass();
    	$this->validatorSchema['is_top']  	      = new sfValidatorPass();
    	//$this->validatorSchema['is_new']  	    = new sfValidatorPass();
    	$this->validatorSchema['is_discuss']  	  = new sfValidatorPass();
    	$this->validatorSchema['ask18']  	        = new sfValidatorPass();
    	$this->validatorSchema['quiz_id']  	      = new sfValidatorPass();
    	$this->validatorSchema['coupon_id']  	    = new sfValidatorPass();
    	//$this->validatorSchema['poll_id']  	    = new sfValidatorPass();
    	$this->validatorSchema['admin_id']  	    = new sfValidatorPass();
    	$this->validatorSchema['author_id']  	    = new sfValidatorPass();
    	$this->validatorSchema['author_show']  	  = new sfValidatorPass();
    	$this->validatorSchema['photographer_id'] = new sfValidatorPass();
    	$this->validatorSchema['photographer_show'] = new sfValidatorPass();
    	$this->validatorSchema['keywords']        = new sfValidatorPass();

      # LABEL
      $this->widgetSchema->setLabel('keywords', 'Search keywords');      
      
      # HELP
      $this->widgetSchema->setHelp('source', 'Балбарын блог');
      $this->widgetSchema->setHelp('source_link', 'http://www.balbar-blog.mn');
      $this->widgetSchema->setHelp('is_featured', 'Show in Branch1-Sliders');
      $this->widgetSchema->setHelp('is_featured_home', 'Show in Homepage-Slider');
      $this->widgetSchema->setHelp('is_featured_home1', 'Show in Homepage-Textbox');
      $this->widgetSchema->setHelp('is_top', 'Show in Homepage-Шилдэг');
      //$this->widgetSchema->setHelp('is_new', 'Show in homepage ШИНЭ tab');
      $this->widgetSchema->setHelp('is_discuss', 'Show discussion and Hide comments (in leaf1 page)');
  }
  

}