<?php

/**
 * feedback actions.
 *
 * @package    broadway
 * @subpackage feedback
 * @author     singleton
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class feedbackActions extends sfActions
{
  function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('feedback'), 'admin', 'perm');  
  }
  
  /*TODO: reply options can be here*/
  
  public function executeIndex(sfWebRequest $request)
  {
      $this->pager = GlobalTable::getPager('Feedback', array('orderBy'=>'created_at DESC', 'isActive'=>'all', 'keyword'=>$request->getParameter('keyword')), $request->getParameter('page'));
  }

  public function executeDelete(sfWebRequest $request)
  {
	    $this->forward404Unless($rs = Doctrine::getTable('Feedback')->find(array($request->getParameter('id'))), sprintf('Object feedback does not exist (%s).', $request->getParameter('id')));
	    try {
		      $rs->delete();
		      $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
	    }catch (Exception $e){}
	    $this->redirect('feedback/index');
  }
  
}