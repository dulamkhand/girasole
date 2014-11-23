<?php

/**
 * PollOption form.
 *
 * @package    vogue
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PollOptionForm extends BasePollOptionForm
{
  public function configure()
  {
      unset($this['user_id'],$this['ip'],$this['nb_vote']);

      // WIDGETS    	  
      $this->widgetSchema['poll_id']  = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Poll'), 'add_empty' => false));
      $this->widgetSchema['body']     = new sfWidgetFormTextarea(array(), array());
      
      // DEFAULT VALUE
      $this->setDefault('poll_id', $this->getOption('pollId'));

      // VALIDATORS
      $this->validatorSchema['poll_id'] = new sfValidatorPass();
      $this->validatorSchema['body']    = new sfValidatorString(array(), array());
  }


}