<?php

/**
 * page actions.
 *
 * @package    barilga
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contentActions extends sfActions
{

    public function executeIndex(sfWebRequest $request)
    {
        $this->pager = Doctrine::getTable('Content')->getPager(array(
          "categoryId"=>$request->getParameter('categoryId'),
          "keyword"=>$request->getParameter('keyword')
          ), $request->getParameter('page'));
    }
    
    public function executeActive(sfWebRequest $request)
    {
        $this->forward404Unless($content = Doctrine::getTable('Content')->find($request->getParameter('id')));
    
        $content->setIsActive($request->getParameter('status'));
        $content->save();
    
        $this->getUser()->setFlash('info', 'Successfully saved.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'content/index');
    }
    
    public function executeFeatured(sfWebRequest $request)
    {
        $this->forward404Unless($content = Doctrine::getTable('Content')->find($request->getParameter('id')));
    
        $content->setIsFeatured($request->getParameter('status'));
        $content->save();
    
        $this->getUser()->setFlash('info', 'Successfully saved.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'content/index');
    }

  
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new ContentForm();
    }
  
    public function executeCreate(sfWebRequest $request)
    {        
        $this->forward404Unless($request->isMethod(sfRequest::POST));
    
        $this->form = new ContentForm();
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('new');
    }
  
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($content = Doctrine::getTable('Content')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new ContentForm($content);
    }
  
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($content = Doctrine::getTable('Content')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new ContentForm($content);
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('edit');
    }
  
    public function executeDelete(sfWebRequest $request)
    {
        $this->forward404Unless($content = Doctrine::getTable('Content')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        try {
          $content->delete();
          $this->getUser()->setFlash('info', 'Successfully deleted.', true);
        }catch (Exception $e){}
        
        $this->redirect($request->getReferer() ? $request->getReferer() : 'content/index');
    }
  
    protected function processForm(sfWebRequest $request, sfForm $form)
    {        
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {          
          $content = $form->save();
          
          $categoryName = Doctrine::getTable('Category')->find($content->getCategoryId())->getName();
          $content->setCategoryName($categoryName);
          $content->save();
          
          $this->getUser()->setFlash('info', 'Successfully saved.', true);
          $this->redirect($request->getReferer() ? $request->getReferer() : 'content/index');
        }

    }

}