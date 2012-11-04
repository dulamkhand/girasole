<?php

/**
 * banner actions.
 *
 * @package    broadway
 * @subpackage banner
 * @author     singleton
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bannerActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->position = $position = $request->getParameter('position');
    $this->pager = Doctrine::getTable('Banner')->getPager(array('position'=>$position), $request->getParameter('page'));
  }
  
  
  public function executeActive(sfWebRequest $request)
  {
    $banner = Doctrine::getTable('Banner')->find($request->getParameter('id'));
    $this->forward404Unless($banner);

    $banner->setIsActive($request->getParameter('status'));
    $banner->save();

    $this->getUser()->setFlash('success', 'Амжилттай хадгалагдлаа.', true);
    $this->redirect('banner/index');
  }
  

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new BannerForm();
    $this->setTemplate('edit');
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new BannerForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($banner = Doctrine::getTable('Banner')->find(array($request->getParameter('id'))), sprintf('Object banner does not exist (%s).', $request->getParameter('id')));
    $this->form = new BannerForm($banner);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($banner = Doctrine::getTable('Banner')->find(array($request->getParameter('id'))), sprintf('Object banner does not exist (%s).', $request->getParameter('id')));
    $this->form = new BannerForm($banner);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $this->forward404Unless($banner = Doctrine::getTable('Banner')->find(array($request->getParameter('id'))), sprintf('Object banner does not exist (%s).', $request->getParameter('id')));
      
    try {
      $banner->delete();
      
      $this->getUser()->setFlash('success', 'Successfully deleted.', true);
    }catch (Exception $e){}
    
    $this->redirect('banner/index');
    
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $banner = $form->save();

      $ext = myTools::getFileExtension($banner->getPath());
      $banner->setExt($ext);
      $banner->setIsActive(1);
      $banner->save();

      $this->getUser()->setFlash('success', 'Successfully saved.', true);
      
      $this->redirect('banner/index');
    }
  }

  
}