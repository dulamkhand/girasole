<?php

/**
 * page actions.
 *
 * @package    barilga
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class commentActions extends sfActions
{
    function preExecute() {
      $this->forwardUnless($this->getUser()->hasCredential('comment'), 'admin', 'perm');  
    }

    /**
     * all commentMirror-g haruulna
     * search by contentId
     * @param sfWebRequest $request
     */
    public function executeIndexMirror(sfWebRequest $request)
    {
        $this->pager = Doctrine::getTable('CommentMirror')->getPager(array(
                'objectType'=>'content',
                'objectId'=>$request->getParameter('objectId'), // optional
                'keyword'=>$request->getParameter('keyword')
            ), $request->getParameter('page'));
    }
    
    /**
     * ids-r confirm|deactivate hiine
     * confirm - CommentMirror-s ustgana
     * deactivate - CommentMirror-s ustgana, comment.deactivate = 1 set hiine
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
                $comment = Doctrine::getTable('CommentMirror')->delete($params);
                $this->getUser()->setFlash('flash', 'Successfully confirmed.', true);                
            } else if($cmd == "deactivate") {                
                $comment = Doctrine::getTable('Comment')->updateDeactivated(1, $params);
                $comment = Doctrine::getTable('CommentMirror')->delete($params);
                $this->getUser()->setFlash('flash', 'Successfully deactivated.', true);
            } else {
                $this->getUser()->setFlash('flash', 'Invalid command!', true);
            }
        } else {
            $this->getUser()->setFlash('flash', 'Select 1 comment at least!', true);
        }
        $this->redirect('comment/indexMirror');
    }
    
    
    
    
    
    /**
     * 1 content-n all comments-g haruulna(active & deactivated both)
     * search by keyword
     * @param sfWebRequest $request
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->forward404Unless($this->content = Doctrine::getTable('Content')->doFetchOne(array('id'=>$this->getRequestParameter('objectId'))));
        
        $this->pager = Doctrine::getTable('Comment')->getPager(array(
                'objectType'=>'content',
                'objectId'=>$this->content->getId(),
                'deactivated'=>'all',
                'keyword'=>$request->getParameter('keyword')), 
            $request->getParameter('page'));
    }


    /**
     * all content-n all deactivated comments-g haruulna. 
     * search by contentId
     * @param sfWebRequest $request
     */
    public function executeIndexDeactivated(sfWebRequest $request)
    {
        $this->pager = Doctrine::getTable('Comment')->getPager(array(
                'deactivated'=>'1',
                'objectType'=>'content',
                'objectId'=>$request->getParameter('objectId'), // optional
                'keyword'=>$request->getParameter('keyword')
            ), $request->getParameter('page'));
    }


    /**
     * 1 comment-n deactivate-g update(0|1) hiine
     *
     * @param sfWebRequest $request
     */
    public function executeCmd(sfWebRequest $request)
    {
        if(in_array($cmd = $request->getParameter('cmd'), array('confirm', 'deactivate'))) {
            $comment = Doctrine::getTable('Comment')->find($this->getRequestParameter('id'));
            if($comment) {
                $comment->setDeactivated($cmd == 'deactivate' ? 1 : 0);
                $comment->save();
                $this->getUser()->setFlash('flash', 'Successfully saved.', true);
            } else {
                $this->getUser()->setFlash('flash', 'Comment not found!', true);
            }
        } else {
            $this->getUser()->setFlash('flash', 'Invalid command!', true);
        }
        $this->redirect($request->getReferer());
    }



}