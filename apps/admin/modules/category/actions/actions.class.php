<?php

/**
 * category actions.
 *
 * @package    zzz
 * @subpackage category
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends sfActions
{
  public function preExecute()
  {
  }

  
  public function executeIndex(sfWebRequest $request)
  {
      $this->pager = Doctrine::getTable('Category')->getPager(array(), $request->getParameter('page'));
  }
  

  public function executeNew(sfWebRequest $request)
  {
      $this->form = new CategoryForm();
      $this->setTemplate('edit');
  }

  
  public function executeCreate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
  
      $this->form = new CategoryForm();
  
      $this->processForm($request, $this->form);
  
      $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
      $this->forward404Unless($category = Doctrine::getTable('Category')->find(array($request->getParameter('id'))), sprintf('Object category does not exist (%s).', $request->getParameter('id')));
      $this->form = new CategoryForm($category, array());
  }

  public function executeUpdate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($category = Doctrine::getTable('Category')->find(array($request->getParameter('id'))), sprintf('Object category does not exist (%s).', $request->getParameter('id')));
      $this->form = new CategoryForm($category, array());
  
      $this->processForm($request, $this->form);
  
      $this->setTemplate('edit');
  }
  
  public function executeDelete(sfWebRequest $request)
  {
      $this->forward404Unless($category = Doctrine::getTable('Category')->find(array($request->getParameter('id'))), sprintf('Object category does not exist (%s).', $request->getParameter('id')));
  
      try {
        $category->delete();
        $this->getCategory()->setFlash('success', 'Successfully deleted.', true);
      }catch (Exception  $e){}
  
      $this->redirect('category/index');
  }

  public function executeActivate(sfWebRequest $request)
  {
      $this->forward404Unless($category = Doctrine::getTable('Category')->find($request->getParameter('id')));
  
      $category->setIsActive($request->getParameter('status'));
      $category->save();
  
      $this->getCategory()->setFlash('success', 'Successfully saved.', true);
      $this->redirect('category/index');
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $category = $form->save();
          
          $this->getCategory()->setFlash('success', 'Successfully saved.', true);
    
          $this->redirect('category/index');
      }
  }


}