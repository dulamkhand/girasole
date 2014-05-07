<?php

/**
 * company actions.
 *
 * @package    zzz
 * @subpackage company
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class companyActions extends sfActions
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
  
        //checking company login action
        if ($form->isValid())
        {
            $admin = $form->getObject1();
            $this->getCompany()->signIn($admin);
            $this->getCompany()->setFlash('flash', 'Successfully logged in.', true);
            $this->redirect("@homepage");
        }
    }

    $this->form = $form;
  }


  public function executeLogout(sfWebRequest $request)
  {
    $this->getCompany()->signOut();
    $this->getCompany()->setFlash('flash', 'Successfully logged out.', true);
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
    $companyname    = $request->getParameter('companyname');
    $email       = $request->getParameter('email');
    

    $this->pager = Doctrine::getTable('Company')->getPager(
            $request->getParameter('page'),
            $isActive,
            $fullname,
            $mobile,
            $companyname,
            $email
    );

    $q_str_arr = array();
    if ($isActive)$q_str_arr[] = 'isActive='.$isActive;
    if ($fullname) $q_str_arr[] = 'fullname='.$fullname;
    if ($mobile) $q_str_arr[] = 'mobile='.$mobile;
    if ($companyname) $q_str_arr[] = 'companyname='.$companyname;
    if ($email) $q_str_arr[] = 'email='.$email;
    
    $this->q_str_arr = $q_str_arr;
    sfConfig::set('sf_escaping_strategy', false);
  }
  

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new CompanyEditForm();
    $this->setTemplate('edit');
  }

  
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new CompanyEditForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($company = Doctrine::getTable('Company')->find(array($request->getParameter('id'))), sprintf('Object company does not exist (%s).', $request->getParameter('id')));
    $this->form = new CompanyEditForm($company, array('company_name' => $company->getCompanyname(), 'mail'=>$company->getEmail()));
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($company = Doctrine::getTable('Company')->find(array($request->getParameter('id'))), sprintf('Object company does not exist (%s).', $request->getParameter('id')));
    $this->form = new CompanyEditForm($company, array('company_name' => $company->getCompanyname(), 'mail'=>$company->getEmail()));

    $this->processFormSave($request, $this->form);

    $this->setTemplate('edit');
  }
  
  
  public function executeDeleteSubscriber(sfWebRequest $request)
  {
      $this->forward404Unless($obj = Doctrine::getTable('Subscriber')->find(array($request->getParameter('id'))), sprintf('Object company does not exist (%s).', $request->getParameter('id')));
  
      try {
          $obj->delete();
          $this->getCompany()->setFlash('flash', 'Successfully deleted.', true);
      }catch (Exception  $e){}
  
      $this->redirect('company/list');
  }


  public function executeDelete(sfWebRequest $request)
  {
      $this->forward404Unless($company = Doctrine::getTable('Company')->find(array($request->getParameter('id'))), sprintf('Object company does not exist (%s).', $request->getParameter('id')));
  
      try {
        @unlink(sfConfig::get('sf_upload_dir').'/avator/'.$company->getAvator());
        Doctrine::getTable('Image')->deleteByObject('company', $company->getId());
        $company->delete();
        $this->getCompany()->setFlash('flash', 'Successfully deleted.', true);
      }catch (Exception  $e){}
  
      $this->redirect('company/index');
  }

  public function executeActivate(sfWebRequest $request)
  {
    $this->forward404Unless($company = Doctrine::getTable('Company')->find($request->getParameter('id')));

    $company->setIsActive($request->getParameter('status'));
    $company->save();

    $this->getCompany()->setFlash('flash', 'Successfully saved.', true);
    $this->redirect('company/index');
  }


  protected function processFormSave(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $isNew = $form->getObject()->isNew();
          $company = $form->save();
          
          if($form->getValue('password')) $company->setPassword(md5($form->getValue('password')));
    
          $date = date('Y-m-d H:i:s');
          $company->setUpdatedAt($date);
          if($isNew) $company->setCreatedAt($date);
    
          $company->save();
    
          $this->getCompany()->setFlash('flash', 'Successfully saved.', true);
    
          $this->redirect('company/index');
      }

  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $isNew = $form->getObject()->isNew();
          $company = $form->save();
          
          if($form->getValue('password')) $company->setPassword(md5($form->getValue('password')));
    
          $date = date('Y-m-d H:i:s');
          $company->setUpdatedAt($date);
          if($isNew) $company->setCreatedAt($date);
    
          $company->save();
    
          $this->getCompany()->setFlash('flash', 'Successfully saved.', true);
    
          $this->redirect('company/index');
      }
  }


}