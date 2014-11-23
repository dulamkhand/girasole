<?php

/**
 * CouponCodeCode actions.
 *
 * @package    vogue
 * @subpackage CouponCode
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class couponCodeActions extends sfActions
{
  function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('coupon'), 'admin', 'perm');  
  }

  public function executeIndex(sfWebRequest $request)
  {
      $this->pager = GlobalTable::getPager('CouponCode', array(
      		'keyword'=>$request->getParameter('keyword'),
      		'isActive'=>'all',
      		'type'=>$request->getParameter('type'),
      		'isUsed'=>$request->getParameter('isUsed'),
  		), $request->getParameter('page'));
  }

  public function executeNew(sfWebRequest $request)
  {
      $this->form = new CouponCodeForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
  
      $this->form = new CouponCodeForm();
  
      $this->processForm($request, $this->form);
  
      $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
      $this->forward404Unless($rs = Doctrine_Core::getTable('CouponCode')->find(array($request->getParameter('id'))), sprintf('Object CouponCode does not exist (%s).', $request->getParameter('id')));
      $this->form = new CouponCodeForm($rs);
  }

  public function executeUpdate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($rs = Doctrine_Core::getTable('CouponCode')->find(array($request->getParameter('id'))), sprintf('Object CouponCode does not exist (%s).', $request->getParameter('id')));
      $this->form = new CouponCodeForm($rs);
  
      $this->processForm($request, $this->form);

      $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
	    $request->checkCSRFProtection();
	
	    $this->forward404Unless($rs = Doctrine_Core::getTable('CouponCode')->find(array($request->getParameter('id'))), sprintf('Object CouponCode does not exist (%s).', $request->getParameter('id')));
	    
	    // before delete check: select * from coupon where type = $rs->getType()
	    $rs->delete();
	
	    $this->redirect('couponCode/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          // upload xlsfile
          $filename = sfConfig::get("sf_upload_dir").'/couponCode/'.$_FILES['coupon_code']['name']['file'];
          $type = myTools::slugify($form->getValue('type'));
  				move_uploaded_file($_FILES['coupon_code']['tmp_name']['file'], $filename);
  				
  				// read file
			    $data = array();
			    if (($handle = fopen($filename, 'r')) !== FALSE) {
			        while (($row = fgetcsv($handle, 1000, ',')) !== FALSE) {
	                $data[] = $row;
			        }
			        fclose($handle);
			    }
  				
  				// insert codes into db
  				foreach ($data as $k=>$v) {
  						$a = new CouponCode();
  						$a->setType($type);
  						$a->setCode($v[0]);
  						$a->save();
  				}
  				$this->getUser()->setFlash(sizeof($data).' codes uploaded.');
  				
          $this->redirect('couponCode/index');
      }
  }
  

}
