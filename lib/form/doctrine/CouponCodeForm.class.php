<?php

/**
 * CouponCode form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CouponCodeForm extends BaseCouponCodeForm
{
  public function configure()
  {
  		unset($this['code']);
  		
  		$this->widgetSchema['is_used'] = new sfWidgetFormInputHidden(array('value'=>0), array());
  		$this->widgetSchema['type'] = new sfWidgetFormInputText(array(), array());
  		$this->widgetSchema['file'] = new sfWidgetFormInputFile(array(), array());
  		
  		$this->validatorSchema['type'] = new sfValidatorString(array(), array());
  		$this->validatorSchema['is_used'] = new sfValidatorFile();
  		$this->validatorSchema['file'] = new sfValidatorFile();
  				//	$this->getFileAttrs('couponCode', true, 20, array('text/comma-separated-values','text/csv','application/csv','application/octetstream','application/excel','application/x-excel','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')),
  				// $this->getFileOpts('20MB', 'csv'));
  					
  		$this->widgetSchema->setHelp('file', 'Only csv file is available to upload, maxsize: 20MB');
  }

}
