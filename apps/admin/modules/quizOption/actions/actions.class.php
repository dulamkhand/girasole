<?php

/**
 * quizOption actions.
 *
 * @package    vogue
 * @subpackage quizOption
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class quizOptionActions extends sfActions
{
    function preExecute() {
        $this->forwardUnless($this->getUser()->hasCredential('quiz'), 'admin', 'perm');  
    }

    public function executeNew(sfWebRequest $request)
    {
        $this->form = new QuizOptionForm(null, array('questionId'=>$request->getParameter('questionId')));
    }
  
    public function executeCreate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST));
    
        $this->form = new QuizOptionForm(null, array('questionId'=>($request->getParameter('questionId') ? $request->getParameter('questionId') : $request->getParameter('quizOption[questionId]'))));
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('new');
    }
  
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine_Core::getTable('QuizOption')->find(array($request->getParameter('id'))), sprintf('Object quizOption does not exist (%s).', $request->getParameter('id')));
        $this->form = new QuizOptionForm($rs, array('questionId'=>$rs->getQuestionId()));
    }
  
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($rs = Doctrine_Core::getTable('QuizOption')->find(array($request->getParameter('id'))), sprintf('Object quizOption does not exist (%s).', $request->getParameter('id')));
        $this->form = new QuizOptionForm($rs, array('questionId'=>$rs->getQuestionId()));
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('edit');
    }
  
    public function executeDelete(sfWebRequest $request)
    {
        $request->checkCSRFProtection();
    
        $rs = Doctrine_Core::getTable('QuizOption')->find(array($request->getParameter('id')));
        $this->forward404Unless($rs);
        $quizId = $rs->getQuestion()->getQuizId();
        $rs->delete();

        $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
        $this->redirect('quizQuestion/index?quizId='.$quizId);
    }
  
    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $rs = $form->save();
            $this->getUser()->setFlash('flash', 'Successfully saved.', true);
            $this->redirect('quizOption/new?questionId='.$rs->getQuestionId());
        }
    }

}
