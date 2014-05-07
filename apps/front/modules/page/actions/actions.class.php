<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class pageActions extends sfActions
{
    public function preExecute()
    {
        $this->getResponse()->setSlot('sideright', true);
    }
    
    public function executePatriot(sfWebRequest $request)
    {
        $this->content = $content = Doctrine::getTable('Content')->doFetchOne(array('id'=>447));
        $this->forward404Unless($content);

        $content->setNbViews($content->getNbViews() + 1);
        $content->save();
        
        $this->type = $type = $content->getType();
        //$this->category = $category = Doctrine::getTable('Category')->find($content->get());
        
        // check if use ip-address
        $myContentIds = $this->getUser()->getAttribute('myViewedRelatedContentIds', array());
        $myContentIds[] = $content->getId();
        $this->getUser()->setAttribute('myViewedRelatedContentIds', $myContentIds);
        
        // META
        $meta = $content.' - '.$content->getCategoryName().' - '.sfConfig::get('app_webname');
        $this->getResponse()->setTitle($meta);
        $this->getResponse()->addMeta('description', $content->getKeywords().' - '.$meta);
        $this->getResponse()->addMeta('keywords', $content->getKeywords().' - '.$meta);   
        $this->setLayout('layoutPatriot');
    }

    
    public function executeAbout(sfWebRequest $request)
    {
        $this->getResponse()->setTitle('"ДАГИНА"-Ы ТУХАЙ');
    }
    
    public function executeContact(sfWebRequest $request)
    {	
    		$form = new FeedbackForm();
    		if($request->isMethod(sfRequest::POST)) {
    				$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
			      if ($form->isValid()) {
			          $feedback = $form->save();
								
			          // send mail to hello@dagina.mn
					  $body = $this->getPartial("mail/feedback", array('rs'=>$feedback));
					  $message = $this->getMailer()->compose($feedback->getEmail(), sfConfig::get('app_feedbackmail'), 'dagina.mn feedback', $body); 
					  $this->getMailer()->send($message);
                      //$this->sendMail(sfConfig::get('app_feedbackmail'), 'dagina.mn feedback', $body);
			          $this->getUser()->setFlash('flash', 'Таны захидлыг амжилттай илгээлээ.', true);
			          $this->redirect('page/contact');
			      }
    		}
			$this->form = $form;
        $this->getResponse()->setTitle('ХОЛБОО БАРИХ - '.sfConfig::get('app_webname'));
    }
    
    public function executeSitemap(sfWebRequest $request)
    {
        $this->getResponse()->setTitle('ВЭБИЙН БҮТЭЦ - '.sfConfig::get('app_webname')); 
    }
    
    public function executeHelp(sfWebRequest $request)
    {
        $this->getResponse()->setTitle('ТУСЛАМЖ - '.sfConfig::get('app_webname'));
    }
    
    public function executeContribute(sfWebRequest $request)
    {
        $this->getResponse()->setTitle('ХАМТРАН АЖИЛЛАХ - '.sfConfig::get('app_webname'));
    }
    
    
    public function executePromote(sfWebRequest $request)
    {
        $this->getResponse()->setTitle('ЗАР СУРТАЛЧИЛГАА БАЙРШУУЛАХ - '.sfConfig::get('app_webname'));
    }
    
    public function executePost(sfWebRequest $request)
    {
        $this->getResponse()->setTitle('НИЙТЛЭЛ БИЧИХ - '.sfConfig::get('app_webname'));
    }

}