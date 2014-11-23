<?php

/**
 * pollOption actions.
 *
 * @package    vogue
 * @subpackage pollOption
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pollOptionActions extends sfActions
{
    function preExecute() {
        $this->forwardUnless($this->getUser()->hasCredential('poll'), 'admin', 'perm');  
    }

    public function executeIndex(sfWebRequest $request)
    {
        $this->forwardUnless($request->getParameter('pollId'), 'poll', 'index');
        $params = array();
        $params['isActive'] = 'all';
        if($request->getParameter('pollId')) $params['pollId'] = $request->getParameter('pollId');
        if($request->getParameter('keyword')) $params['keyword'] = $request->getParameter('keyword');
        $this->pager = Doctrine_Core::getTable('PollOption')->getPager($params, $request->getParameter('page'));
    }  
    
    public function executePrint(sfWebRequest $request)
    {
        if(!$request->getParameter('pollId')) {
            $this->getUser()->setFlash('flash', 'Please select the poll!');
            $this->forward('pollOption', 'index');
        }
        $this->poll = Doctrine::getTable('Poll')->doFetchOne(array('id'=>$request->getParameter('pollId')));

        $params = array();
        $params['isActive'] = 'all';
        $params['pollId'] = $this->poll->getId();
        if($request->getParameter('keyword')) $params['keyword'] = $request->getParameter('keyword');
        $this->rss = Doctrine_Core::getTable('PollOption')->doFetchArray($params);
        $this->setLayout(false);
    }  
    
    public function executeActivate(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('PollOption')->find($request->getParameter('id')));
        $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
    
        $rs->setIsActive($cmd);
        $rs->save();
        $this->getUser()->setFlash('flash', 'Successfully saved.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'pollOption/index?pollId='.$rs->getPollId());
    }
  
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new PollOptionForm(null, array('pollId'=>$request->getParameter('pollId')));
    }
  
    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));
    
        $this->form = new PollOptionForm(null, array('pollId'=>($request->getParameter('pollId') ? $request->getParameter('pollId') : $request->getParameter('pollOption[pollId]'))));
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('new');
    }
  
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine_Core::getTable('PollOption')->find(array($request->getParameter('id'))), sprintf('Object pollOption does not exist (%s).', $request->getParameter('id')));
        $this->form = new PollOptionForm($rs, array('pollId'=>$rs->getPollId()));
    }
  
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($rs = Doctrine_Core::getTable('PollOption')->find(array($request->getParameter('id'))), sprintf('Object pollOption does not exist (%s).', $request->getParameter('id')));
        $this->form = new PollOptionForm($rs, array('pollId'=>$rs->getPollId()));
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('edit');
    }
  
    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();
    
        $rs = Doctrine_Core::getTable('PollOption')->find(array($request->getParameter('id')));
        $this->forward404Unless($rs);
        $pollId = $rs->getPollId();
        $rs->delete();

        $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
        $this->redirect('pollOption/index?pollId='.$pollId);
    }
  
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $rs = $form->save();
            $rs->setUserId($this->getUser()->getId());
            $rs->setIp($request->getRemoteAddress());
            $rs->save();
            
            $this->getUser()->setFlash('flash', 'Successfully saved.', true);
            $this->redirect('pollOption/new?pollId='.$rs->getPollId());
        }
    }

}
