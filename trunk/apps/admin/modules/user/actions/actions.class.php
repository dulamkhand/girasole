<?php

/**
 * user actions.
 *
 * @package    zzz
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
  function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('user'), 'admin', 'perm');  
  }

  public function executeIndex(sfWebRequest $request)
  {
      $params = array();
      $params['id'] = $request->getParameter('id');
      $params['email'] = $request->getParameter('email');
      $params['fullname'] = $request->getParameter('fullname');
      $params['keyword'] = $request->getParameter('keyword');
      $this->pager = Doctrine::getTable('User')->getPager($params, $request->getParameter('page'));
  }
  

  public function executeNew(sfWebRequest $request)
  {
      $this->form = new UserForm();
      $this->setTemplate('edit');
  }

  
  public function executeCreate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
      $this->form = new UserForm();
      $this->processForm($request, $this->form);
      $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
      $this->forward404Unless($user = Doctrine::getTable('User')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
      $this->form = new UserForm($user);
  }

  public function executeUpdate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($user = Doctrine::getTable('User')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
      $this->form = new UserForm($user);
      $this->processForm($request, $this->form);
      $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
      $this->forward404Unless($user = Doctrine::getTable('User')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
      $user->delete();
      $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
      $this->redirect('user/index');
  }

  
  public function executeActivate(sfWebRequest $request)
  {
      $this->forward404Unless($user = Doctrine::getTable('User')->find($request->getParameter('id')));
      $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
      $user->setIsActive($cmd);
      $user->setIsActive($request->getParameter('status'));
      $user->save();
  
      $this->getUser()->setFlash('flash', 'Successfully saved.', true);
      $this->redirect('user/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          //$form->setV
          $rs = $form->save();
          if($form->getValue('password')) $rs->setPassword(md5($form->getValue('password')));
          $rs->setUpdatedAt(date('Y-m-d H:i:s'));
          $tmp = explode('@', $rs->getEmail());
          $rs->setUsername($tmp[0]);
          $rs->save();
          
          // create thumb if thum doesn't exists and remove original image
          if($rs->getAvator() && !file_exists(sfConfig::get('sf_upload_dir').'/user/100t-'.$rs->getAvator())) {
              $b = myTools::createThumbs($rs->getAvator(), 'user', array(100), true);
          }

          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
          $this->redirect('user/index');
      }
  }


}