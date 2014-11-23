<?php

/**
 * Coupon actions.
 *
 * @package    vogue
 * @subpackage Coupon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class couponActions extends sfActions
{
  function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('coupon'), 'admin', 'perm');  
  }

  public function executeIndex(sfWebRequest $request)
  {
      $this->pager = GlobalTable::getPager('Coupon', array('keyword'=>$request->getParameter('keyword')), $request->getParameter('page'));
  }

  public function executeNew(sfWebRequest $request)
  {
      $this->form = new CouponForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
  
      $this->form = new CouponForm();
  
      $this->processForm($request, $this->form);
  
      $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
      $this->forward404Unless($rs = Doctrine_Core::getTable('Coupon')->find(array($request->getParameter('id'))), sprintf('Object Coupon does not exist (%s).', $request->getParameter('id')));
      $this->form = new CouponForm($rs);
  }

  public function executeUpdate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($rs = Doctrine_Core::getTable('Coupon')->find(array($request->getParameter('id'))), sprintf('Object Coupon does not exist (%s).', $request->getParameter('id')));
      $this->form = new CouponForm($rs);
  
      $this->processForm($request, $this->form);

      $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($rs = Doctrine_Core::getTable('Coupon')->find(array($request->getParameter('id'))), sprintf('Object Coupon does not exist (%s).', $request->getParameter('id')));
    $rs->delete();

    $this->redirect('coupon/index');
  }
  
  public function executeDeleteFile(sfWebRequest $request)
  {
    $this->forward404Unless($rs = Doctrine_Core::getTable('Coupon')->find(array($request->getParameter('id'))), sprintf('Object Coupon does not exist (%s).', $request->getParameter('id')));
    $rs->setFile('');
    $rs->save();
    $this->redirect($request->getReferer() ? $request->getReferer() : 'coupon/edit?id='.$rs->getId());
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $rs = $form->save();
          $rs->setRoute(myTools::slugify(myTools::mn2en($rs->getCreatedAt())));
          $rs->save();
          
          // TODO: 
          // resize
          if($rs->getFile()) myTools::createThumbs($rs->getFile(), 'coupon', array(480), true);
          if($rs->getImage()) myTools::createThumbs($rs->getImage(), 'coupon', array(150), true);
  
          $this->redirect('coupon/index');
      }
  }
}
