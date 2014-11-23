<?php

/**
 * page actions.
 *
 * @package    barilga
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class discussActions extends sfActions
{
    function preExecute() {
        $this->forwardUnless($this->getUser()->hasCredential('discuss'), 'admin', 'perm');  
    }

    /**
     * all discussMirror-g haruulna
     * search by contentId
     * @param sfWebRequest $request
     */
    public function executeIndexMirror(sfWebRequest $request)
    {
        $this->pager = Doctrine::getTable('DiscussMirror')->getPager(array(
                'objectType'=>'content',
                'objectId'=>$request->getParameter('objectId'), // optional
                'keyword'=>$request->getParameter('keyword')
            ), $request->getParameter('page'));
    }
    
    /**
     * ids-r confirm|deactivate hiine
     * confirm - DiscussMirror-s ustgana
     * deactivate - DiscussMirror-s ustgana, discuss.deactivate = 1 set hiine
     * @param sfWebRequest $request
     */
    public function executeCmdMirror(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        // 
        $params = array();
        $ids = $request->getParameter('checkbox_ids');
        foreach($ids as $k=>$v) {
            $params[] = $v;
        }
        if(sizeof($params)) {
            $cmd = $request->getParameter('cmd');
            if($cmd == "confirm") {
                $discuss = Doctrine::getTable('DiscussMirror')->delete($params);
                $this->getUser()->setFlash('flash', 'Successfully confirmed.', true);                
            } else if($cmd == "deactivate") {                
                $discuss = Doctrine::getTable('Discuss')->updateDeactivated(1, $params);
                $discuss = Doctrine::getTable('DiscussMirror')->delete($params);
                $this->getUser()->setFlash('flash', 'Successfully deactivated.', true);
            } else {
                $this->getUser()->setFlash('flash', 'Invalid command!', true);
            }
        } else {
            $this->getUser()->setFlash('flash', 'Select 1 discuss at least!', true);
        }
        $this->redirect('discuss/indexMirror');
    }
    
    
    
    
    
    /**
     * 1 content-n all discusss-g haruulna(active & deactivated both)
     * search by keyword
     * @param sfWebRequest $request
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->forward404Unless($this->content = Doctrine::getTable('Content')->doFetchOne(array('id'=>$this->getRequestParameter('objectId'))));
        
        $this->pager = Doctrine::getTable('Discuss')->getPager(array(
                'objectType'=>'content',
                'objectId'=>$this->content->getId(),
                'deactivated'=>'all',
                'keyword'=>$request->getParameter('keyword')), 
            $request->getParameter('page'));
    }


    /**
     * all content-n all deactivated discusss-g haruulna. 
     * search by contentId
     * @param sfWebRequest $request
     */
    public function executeIndexDeactivated(sfWebRequest $request)
    {
        $this->pager = Doctrine::getTable('Discuss')->getPager(array(
                'deactivated'=>'1',
                'objectType'=>'content',
                'objectId'=>$request->getParameter('objectId'), // optional
                'keyword'=>$request->getParameter('keyword')
            ), $request->getParameter('page'));
    }


    /**
     * 1 discuss-n deactivate-g update(0|1) hiine
     *
     * @param sfWebRequest $request
     */
    public function executeCmd(sfWebRequest $request)
    {
        if(in_array($cmd = $request->getParameter('cmd'), array('confirm', 'deactivate'))) {
            $discuss = Doctrine::getTable('Discuss')->find($this->getRequestParameter('id'));
            if($discuss) {
                $discuss->setDeactivated($cmd == 'deactivate' ? 1 : 0);
                $discuss->save();
                $this->getUser()->setFlash('flash', 'Successfully saved.', true);
            } else {
                $this->getUser()->setFlash('flash', 'Discuss not found!', true);
            }
        } else {
            $this->getUser()->setFlash('flash', 'Invalid command!', true);
        }
        $this->redirect($request->getReferer());
    }



}