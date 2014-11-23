<?php

/**
 * Coupon form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CouponForm extends BaseCouponForm
{
  public function configure()
  {
      unset($this['nb_print']);
      
      // WIDGETS
      $this->widgetSchema['title']            = new sfWidgetFormInputText(array(), array());
      $choices = array();
      $rss = Doctrine::getTable('CouponCode')->createQuery("*")->select('type')->groupBy('type')->fetchArray();
      foreach ($rss as $rs){
      		$choices[$rs['type']] = $rs['type'];
      }
      $this->widgetSchema['type']             = new sfWidgetFormChoice(array('choices'=>$choices), array());
      $this->widgetSchema['file']             = new sfWidgetFormInputFile(array(), array());
      $this->widgetSchema['body']             = new sfWidgetFormTextarea(array(), array());
      $this->widgetSchema['image']            = new sfWidgetFormInputFile(array(), array());

      // VALIDATORS
      $this->validatorSchema['title']         = new sfValidatorString(array(), array());
      $this->validatorSchema['type']          = new sfValidatorPass();
      $this->validatorSchema['body']          = new sfValidatorPass();
      $this->validatorSchema['image']         = new sfValidatorFile($this->getFileAttrs('coupon'), $this->getFileOpts());
      $this->validatorSchema['file']          = new sfValidatorFile($this->getFileAttrs('coupon'), $this->getFileOpts());
      
      // HELP
      $this->widgetSchema->setHelp('file', 'max-width:480px, height:140px. When the image width is greater that 480px, itll be resized to 480px. <br>Зураг оруулсан үед, title, body, image хэрэглэгчид харагдахгүй тул оруулах шаардлагагүй.');
      $this->widgetSchema->setHelp('image', 'max-width:150px, height:80px. When the image width is greater that 150px, itll be resized to 150px. <br>Зураг оруулаагүй үед Дагина лого харагдана.');
  }

}
