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
  public function preExecute()
  {
  }

  
  
  // LOGIN
  public function executeLogin(sfWebRequest $request)
  {
    $form = new LoginForm();

    if ($request->isMethod(sfRequest::POST))
    {
        $form->bind($request->getParameter($form->getName()));
  
        //checking user login action
        if ($form->isValid())
        {
            $admin = $form->getObject1();
            $this->getUser()->signIn($admin);
            $this->getUser()->setFlash('success', 'Амжилттай нэвтэрлээ.', true);
            $this->redirect("@homepage");
        }
    }

    $this->form = $form;
  }


  public function executeLogout(sfWebRequest $request)
  {
    $this->getUser()->signOut();
    $this->getUser()->setFlash('success', 'Холболт амжилттай тасарлаа.', true);
    $this->redirect('@login');
  }
  
  public function executeList(sfWebRequest $request)
  {
      $this->pager = Doctrine::getTable('Subscriber')->getPager($request->getParameter('page'));
  }



  public function executeIndex(sfWebRequest $request)
  {
    $isActive    = $request->getParameter('isActive', 'all');
    $fullname   = $request->getParameter('fullname');
    $mobile       = $request->getParameter('mobile');
    $username    = $request->getParameter('username');
    $email       = $request->getParameter('email');
    

    $this->pager = Doctrine::getTable('User')->getPager(
            $request->getParameter('page'),
            $isActive,
            $fullname,
            $mobile,
            $username,
            $email
    );

    $q_str_arr = array();
    if ($isActive)$q_str_arr[] = 'isActive='.$isActive;
    if ($fullname) $q_str_arr[] = 'fullname='.$fullname;
    if ($mobile) $q_str_arr[] = 'mobile='.$mobile;
    if ($username) $q_str_arr[] = 'username='.$username;
    if ($email) $q_str_arr[] = 'email='.$email;
    
    $this->q_str_arr = $q_str_arr;
    sfConfig::set('sf_escaping_strategy', false);
  }
  

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new UserEditForm();
    $this->setTemplate('edit');
  }

  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new UserEditForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($user = Doctrine::getTable('User')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
    $this->form = new UserEditForm($user, array('user_name' => $user->getUsername(), 'mail'=>$user->getEmail()));
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($user = Doctrine::getTable('User')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
    $this->form = new UserEditForm($user, array('user_name' => $user->getUsername(), 'mail'=>$user->getEmail()));

    $this->processFormSave($request, $this->form);

    $this->setTemplate('edit');
  }
  
  
  public function executeDeleteSubscriber(sfWebRequest $request)
  {
      $this->forward404Unless($obj = Doctrine::getTable('Subscriber')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
  
      try {
          $obj->delete();
          $this->getUser()->setFlash('success', 'Амжилттай устлаа.', true);
      }catch (Exception  $e){}
  
      $this->redirect('user/list');
  }


  public function executeDelete(sfWebRequest $request)
  {
      $this->forward404Unless($user = Doctrine::getTable('User')->find(array($request->getParameter('id'))), sprintf('Object user does not exist (%s).', $request->getParameter('id')));
  
      try {
        @unlink(sfConfig::get('sf_upload_dir').'/avator/'.$user->getAvator());
        Doctrine::getTable('Image')->deleteByObject('user', $user->getId());
        $user->delete();
        $this->getUser()->setFlash('success', 'Амжилттай устлаа.', true);
      }catch (Exception  $e){}
  
      $this->redirect('user/index');
  }

  public function executeActivate(sfWebRequest $request)
  {
    $this->forward404Unless($user = Doctrine::getTable('User')->find($request->getParameter('id')));

    $user->setIsActive($request->getParameter('status'));
    $user->save();

    $this->getUser()->setFlash('success', 'Амжилттай хадгалагдлаа.', true);
    $this->redirect('user/index');
  }


  protected function processFormSave(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $isNew = $form->getObject()->isNew();
          $user = $form->save();
          
          if($form->getValue('password')) $user->setPassword(md5($form->getValue('password')));
    
          $date = date('Y-m-d H:i:s');
          $user->setUpdatedAt($date);
          if($isNew) $user->setCreatedAt($date);
    
          $user->save();
    
          $this->getUser()->setFlash('success', 'Амжилттай хадгалагдлаа.', true);
    
          $this->redirect('user/index');
      }

  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $isNew = $form->getObject()->isNew();
          $user = $form->save();
          
          if($form->getValue('password')) $user->setPassword(md5($form->getValue('password')));
    
          $date = date('Y-m-d H:i:s');
          $user->setUpdatedAt($date);
          if($isNew) $user->setCreatedAt($date);
    
          $user->save();
    
          $this->getUser()->setFlash('success', 'Амжилттай хадгалагдлаа.', true);
    
          $this->redirect('user/index');
      }
  }


}