<?php

/**
 * aphorism actions.
 *
 * @package    zzz
 * @subpackage aphorism
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class aphorismActions extends sfActions
{
  public function preExecute()
  {
  }

  
  public function executeIndex(sfWebRequest $request)
  {
      $this->pager = Doctrine::getTable('Aphorism')->getPager(array(), $request->getParameter('page'));
  }
  

  public function executeNew(sfWebRequest $request)
  {
      $this->form = new AphorismForm();
      $this->setTemplate('edit');
  }

  
  public function executeCreate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
  
      $this->form = new AphorismForm();
  
      $this->processForm($request, $this->form);
  
      $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
      $this->forward404Unless($aphorism = Doctrine::getTable('Aphorism')->find(array($request->getParameter('id'))), sprintf('Object aphorism does not exist (%s).', $request->getParameter('id')));
      $this->form = new AphorismForm($aphorism, array());
  }

  public function executeUpdate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($aphorism = Doctrine::getTable('Aphorism')->find(array($request->getParameter('id'))), sprintf('Object aphorism does not exist (%s).', $request->getParameter('id')));
      $this->form = new AphorismForm($aphorism, array());
  
      $this->processForm($request, $this->form);
  
      $this->setTemplate('edit');
  }
  
  public function executeDelete(sfWebRequest $request)
  {
      $this->forward404Unless($aphorism = Doctrine::getTable('Aphorism')->find(array($request->getParameter('id'))), sprintf('Object aphorism does not exist (%s).', $request->getParameter('id')));
  
      try {
        $aphorism->delete();
        $this->getUser()->setFlash('success', 'Successfully deleted.', true);
      }catch (Exception  $e){}
  
      $this->redirect('aphorism/index');
  }

  public function executeActivate(sfWebRequest $request)
  {
      $this->forward404Unless($aphorism = Doctrine::getTable('Aphorism')->find($request->getParameter('id')));
  
      $aphorism->setIsActive($request->getParameter('status'));
      $aphorism->save();
  
      $this->getUser()->setFlash('success', 'Successfully saved.', true);
      $this->redirect('aphorism/index');
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $aphorism = $form->save();
          
          $this->getUser()->setFlash('success', 'Successfully saved.', true);
    
          $this->redirect('aphorism/index');
      }
  }


}