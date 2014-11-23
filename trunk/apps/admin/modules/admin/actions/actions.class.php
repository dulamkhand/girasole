<?php

/**
 * admin actions.
 *
 * @package    zzz
 * @subpackage admin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class adminActions extends sfActions
{

  public function executePerm() {
      $this->getUser()->setFlash('flash', 'Permission denied!', true);
  }
  
  public function executeLogin(sfWebRequest $request) {      
      $form = new AdminLoginForm();
      if ($request->isMethod(sfRequest::POST)) {
          $form->bind($request->getParameter($form->getName()));
          if ($form->isValid()) {
              $admin = $form->getObject1();
              $this->getUser()->signIn($admin);
              $this->getUser()->setFlash('flash', 'Successfully logged in.', true);
              $this->redirect("@homepage");
          }
      }
      $this->form = $form;
  }

  public function executeLogout(sfWebRequest $request) {
      $this->getUser()->signOut();
      $this->getUser()->setFlash('flash', 'Successfully logged out.', true);
      $this->redirect('@login');
  }
  
  public function executeIndex(sfWebRequest $request) {
      $this->forwardUnless($this->getUser()->hasCredential('admin'), 'admin', 'perm');
      $params   = array();
      $params['isActive'] = 'all';
      if($request->getParameter('keyword')) $params['keyword'] = $request->getParameter('keyword');
      $this->pager = Doctrine::getTable('Admin')->getPager($params);
  }
  

  public function executeNew(sfWebRequest $request) {
      $this->forwardUnless($this->getUser()->hasCredential('admin'), 'admin', 'perm');
      $this->form = new AdminForm();
      $this->setTemplate('edit');
  }

  
  public function executeCreate(sfWebRequest $request) {
      $this->forwardUnless($this->getUser()->hasCredential('admin'), 'admin', 'perm');
      $this->forward404Unless($request->isMethod(sfRequest::POST));
      $this->form = new AdminForm();
      $this->processForm($request, $this->form);
      $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request) {
      $this->forwardUnless($this->getUser()->hasCredential('admin'), 'admin', 'perm');
      $this->forward404Unless($admin = Doctrine::getTable('Admin')->find(array($request->getParameter('id'))), sprintf('Object admin does not exist (%s).', $request->getParameter('id')));
      $this->form = new AdminForm($admin);
  }

  public function executeUpdate(sfWebRequest $request) {
      $this->forwardUnless($this->getUser()->hasCredential('admin'), 'admin', 'perm');
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($admin = Doctrine::getTable('Admin')->find(array($request->getParameter('id'))), sprintf('Object admin does not exist (%s).', $request->getParameter('id')));
      $this->form = new AdminForm($admin);
      $this->processForm($request, $this->form);
      $this->setTemplate('edit');
  }
  
  public function executeDelete(sfWebRequest $request) {
      $this->forwardUnless($this->getUser()->hasCredential('admin'), 'admin', 'perm');
      $this->forward404Unless($admin = Doctrine::getTable('Admin')->find(array($request->getParameter('id'))), sprintf('Object admin does not exist (%s).', $request->getParameter('id')));
      try {
          $admin->delete();
          $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
      } catch (Exception  $e){}
      $this->redirect('admin/index');
  }

  public function executeActivate(sfWebRequest $request) {
      $this->forwardUnless($this->getUser()->hasCredential('admin'), 'admin', 'perm');
      
      $this->forward404Unless($admin = Doctrine::getTable('Admin')->find($request->getParameter('id')));
      $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
      $admin->setIsActive($cmd);
      $admin->save();
      $this->getUser()->setFlash('flash', 'Successfully saved.', true);
      $this->redirect('admin/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form) {
      $this->forwardUnless($this->getUser()->hasCredential('admin'), 'admin', 'perm');
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid()) {
          $admin = $form->save();
          
          if($form->getValue('password')) $admin->setPassword(md5($form->getValue('password')));
          $admin->setUpdatedAt(date('Y-m-d H:i:s'));
          $admin->setModPermissions(join(";", $request->getParameter('mod_permissions')));
          $admin->setCatPermissions(join(";", $request->getParameter('cat_permissions')));
          $admin->save();
    
          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
          $this->redirect('admin/index');
      }
  }


}