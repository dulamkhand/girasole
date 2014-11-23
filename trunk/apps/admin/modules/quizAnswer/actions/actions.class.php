<?php

/**
 * quizAnswer actions.
 *
 * @package    vogue
 * @subpackage quizAnswer
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class quizAnswerActions extends sfActions
{
    function preExecute() {
        $this->forwardUnless($this->getUser()->hasCredential('quiz'), 'admin', 'perm');  
    }

    public function executeIndex(sfWebRequest $request)
    {
        $params = array();
        $params['isActive'] = 'all';
        if($request->getParameter('quizId')) $params['quizId'] = $request->getParameter('quizId');
        if($request->getParameter('keyword')) $params['keyword'] = $request->getParameter('keyword');
        $this->pager = Doctrine_Core::getTable('QuizAnswer')->getPager($params, $request->getParameter('page'));
    }
  
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new QuizAnswerForm(null, array('quizId'=>$request->getParameter('quizId')));
    }
  
    public function executeCreate(sfWebRequest $request)
    {        
        $this->forward404Unless($request->isMethod(sfRequest::POST));
    
        $this->form = new QuizAnswerForm(null, array('quizId'=>($request->getParameter('quizId') ? $request->getParameter('quizId') : $request->getParameter('quizQuestion[quizId]'))));
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('new');
    }
  
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('QuizAnswer')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new QuizAnswerForm($rs, array('quizId'=>$rs->getquizId()));
    }
  
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($rs = Doctrine::getTable('QuizAnswer')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new QuizAnswerForm($rs, array('quizId'=>$rs->getquizId()));
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('edit');
    }
  
    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();

        $this->forward404Unless($rs = Doctrine::getTable('QuizAnswer')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $quizId = $rs->getQuizId();
        $rs->delete();
        $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'quizAnswer/index?quizId='.$quizId);
    }
    

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $rs = $form->save();
            $rs->setRoute(myTools::slugify(myTools::mn2en($rs->getTitle())));
            $rs->save();
            
            // create thumb if thum doesn't exists and remove original image
            if($rs->getImage() && !file_exists(sfConfig::get('sf_upload_dir').'/quiz/450t-'.$rs->getImage())) {
                $b = myTools::createThumbs($rs->getImage(), 'quiz', array(450), true);
            }
            
            $this->getUser()->setFlash('flash', 'Successfully saved.', true);
            $this->redirect('quizAnswer/index?quizId='.$rs->getQuizId());
        }
    }


}
