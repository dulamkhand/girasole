<?php

/**
 * quote actions.
 *
 * @package    vogue
 * @subpackage quote
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class quoteActions extends sfActions
{
    function preExecute() {
        $this->forwardUnless($this->getUser()->hasCredential('quote'), 'admin', 'perm');  
    }

    public function executeIndex(sfWebRequest $request)
    {
        $params = array();
        if($request->getParameter('keyword')) $params['keyword'] = $request->getParameter('keyword');
        $this->pager = Doctrine_Core::getTable('Quote')->getPager($params, $request->getParameter('page'));
    }
  
    public function executeNew(sfWebRequest $request)
    {
        $this->form = new QuoteForm();
    }
  
    public function executeCreate(sfWebRequest $request)
    {        
        $this->forward404Unless($request->isMethod(sfRequest::POST));

        $this->form = new QuoteForm();
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('new');
    }
  
    public function executeEdit(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('Quote')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new QuoteForm($rs);
    }
  
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($rs = Doctrine::getTable('Quote')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new QuoteForm($rs);
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('edit');
    }
  
    public function executeDelete(sfWebRequest $request)
    {
        $this->forward404Unless($rs = Doctrine::getTable('Quote')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $rs->delete();
        $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'quote/index');
    }
    

    protected function processForm(sfWebRequest $request, sfForm $form)
    {
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {
            $rs = $form->save();
            
            // not used yet
            if($rs->getTitle()) {
                $rs->setRoute(myTools::slugify(myTools::mn2en($rs->getTitle())));
                $rs->save();
            }

            // create thumb if thum doesn't exists and remove original image
            if($rs->getImage() && !file_exists(sfConfig::get('sf_upload_dir').'/quote/300t-'.$rs->getImage())) {
                $b = myTools::createThumbs($rs->getImage(), 'quote', array(300), true);
            }
            
            $this->getUser()->setFlash('flash', 'Successfully saved.', true);
            $this->redirect('quote/index');
        }
    }


}
