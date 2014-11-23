<?php

/**
 * Subscriber actions.
 *
 * @package    vogue
 * @subpackage Subscriber
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class subscriberActions extends sfActions
{
  function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('subscriber'), 'admin', 'perm');  
  }

  public function executeIndex(sfWebRequest $request)
  {
      $this->pager = Doctrine_Core::getTable('subscriber')->getPager(array('keyword'=>$request->getParameter('keyword')), $request->getParameter('page'));
  }

  public function executeNew(sfWebRequest $request)
  {
      $this->form = new SubscriberForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
  
      $this->form = new SubscriberForm();
  
      $this->processForm($request, $this->form);
  
      $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
      $this->forward404Unless($subscriber = Doctrine_Core::getTable('subscriber')->find(array($request->getParameter('id'))), sprintf('Object Subscriber does not exist (%s).', $request->getParameter('id')));
      $this->form = new SubscriberForm($subscriber);
  }

  public function executeUpdate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($subscriber = Doctrine_Core::getTable('subscriber')->find(array($request->getParameter('id'))), sprintf('Object Subscriber does not exist (%s).', $request->getParameter('id')));
      $this->form = new SubscriberForm($subscriber);
  
      $this->processForm($request, $this->form);

      $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($subscriber = Doctrine_Core::getTable('subscriber')->find(array($request->getParameter('id'))), sprintf('Object Subscriber does not exist (%s).', $request->getParameter('id')));
    $subscriber->delete();

    $this->redirect('subscriber/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $subscriber = $form->save();
  
          $this->redirect('subscriber/index');
      }
  }
}
