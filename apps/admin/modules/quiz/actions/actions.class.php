<?php

/**
 * quiz actions.
 *
 * @package    vogue
 * @subpackage quiz
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class quizActions extends sfActions
{
    function preExecute() {
        $this->forwardUnless($this->getUser()->hasCredential('quiz'), 'admin', 'perm');  
    }

    public function executeIndex(sfWebRequest $request)
    {
        $params = array();
        $params['isActive'] = 'all';
        if($request->getParameter('keyword')) $params['keyword'] = $request->getParameter('keyword');
        $this->pager = Doctrine_Core::getTable('Quiz')->getPager($params, $request->getParameter('page'));
    }
  
    public function executeActivate(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('Quiz')->find($request->getParameter('id')));
        $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
    
        $rs->setIsActive($cmd);
        $rs->save();
        $this->getUser()->setFlash('flash', 'Successfully saved.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'quiz/index');
    }
    
    public function executeFeaturate(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('Quiz')->find($request->getParameter('id')));
        $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
    
        $rs->setIsFeatured($cmd);
        $rs->save();
        $this->getUser()->setFlash('flash', 'Successfully saved.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'quiz/index');
    }

  
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new QuizForm();
    }
  
    public function executeCreate(sfWebRequest $request)
    {        
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new QuizForm();
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('new');
    }
  
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('Quiz')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new QuizForm($rs);
    }
  
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($rs = Doctrine::getTable('Quiz')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new QuizForm($rs);
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('edit');
    }
  
    public function executeDelete(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('Quiz')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $rs->delete();
        $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'quiz/index');
    }
    

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $rs = $form->save();
            $rs->setRoute(myTools::slugify(myTools::mn2en($rs->getTitle())));
            $rs->save();
                     
            $this->getUser()->setFlash('flash', 'Successfully saved.', true);
            $this->redirect('quiz/index');
        }
    }


}
