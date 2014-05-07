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
  function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('category'), 'admin', 'perm');  
  }

  public function executeList(sfWebRequest $request) {
      
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
  
      $type = $category->getType();
      $a = Doctrine::getTable('Category')->doCount(array('parentId'=>$category->getId(), 'isActive'=>'all'));
      $b = Doctrine::getTable('Content')->doCount(array('categoryId'=>$category->getId(), 'isActive'=>'all'));
      $c = Doctrine::getTable('Content')->doCount(array('parentCategoryId'=>$category->getId(), 'isActive'=>'all'));
      if($a > 0 || $b > 0 || $c > 0) {
          $this->getUser()->setFlash('flash', "There are ".$a." subcategories and ".($b + $c)." contents in this category. Empty it before delete.", true);
      } else {
          $category->delete();
          $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
      }
      $this->redirect('category/list?type='.$type);
  }

  public function executeActivate(sfWebRequest $request)
  {
      $this->forward404Unless($category = Doctrine::getTable('Category')->find($request->getParameter('id')));
  
      $category->setIsActive($request->getParameter('status'));
      $category->save();
  
      $this->getUser()->setFlash('flash', 'Successfully saved.', true);
      $this->redirect('category/list');
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $isNew = $form->getObject()->isNew();
          $oldName = $form->getObject()->getName();
          $category = $form->save();
          $newName = $form->getObject()->getName();
          
          $parentCat = Doctrine::getTable('Category')->findOneBy('id', $category->getParentId());
          if($parentCat){
              $category->setParentName($parentCat->getName());
              $category->setType($parentCat->getType());
          }
          // set route
          $category->setRoute(myTools::slugify(myTools::mn2en($category->getName())));
          $category->save();

          // category name uurchlugdsun bol category daxi bux content update xiine
          if($oldName != $newName) {
              // update t_category.parent_name
              Doctrine::getTable('Category')->updateSubcatsParentNames($category->getId(), $newName);
              // update t_content.category_name
              Doctrine::getTable('Content')->updateCatsNames($category->getId(), $newName);
              // update t_content.parent_category_name
              Doctrine::getTable('Content')->updateParentCatsNames($category->getId(), $newName);
          }

          if($isNew) {
              $this->getUser()->setFlash('flash', 'The category was successfully created. Please manage the category permissions for admins. And relogin before adding contents into this category.', true);
              $this->redirect('admin/index');    
          } 
          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
          $this->redirect('category/list?type='.$category->getType());
      }
  }


}