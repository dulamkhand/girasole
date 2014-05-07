<?php

/**
 * mail actions.
 *
 * @package    TutorBrite
 * @subpackage mail
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class mailActions extends sfActions
{

  private function setMailConfig()
  {
    $mail = new sfMail();
    $mail->initialize();
    $mail->setCharset('utf-8');
	  $mail->setContentType('text/html');

    $mail->addReplyTo('info@barilga.mn');

    return $mail;
  }

}