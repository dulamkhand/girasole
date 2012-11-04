<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class mainActions extends sfActions
{

    public function preExecute()
    {
        
    }
  
    /**
     * Enter description here...
     *
     * @param sfWebRequest $request
     */
    public function executeHome(sfWebRequest $request)
    {
        $this->rss = Doctrine::getTable('Content')->doFetchArray(array('categoryId'=>$request->getParameter('categoryId')), $request->getParameter('page'));

        $listtype = $request->getParameter('listtype', 'list1');
        $this->setTemplate($listtype);
    }

    
    public function executeList(sfWebRequest $request)
    {
        $this->rss = Doctrine::getTable('Content')->doFetchArray(array('categoryId'=>$request->getParameter('categoryId')), $request->getParameter('page'));
        
        $listtype = $request->getParameter('listtype', 'list1');
        $this->setTemplate($listtype);
    }
    
    
    public function executeDetail(sfWebRequest $request)
    {
        $this->rs = $rs= Doctrine::getTable('Content')->doFetchOne(array('id'=>$request->getParameter('id')));

        //$this->setTemplate($content->getViewDetail());
        //$this->setTemplate('detail1');
        $this->setTemplate('detail2');
    }
    


    public function executeContact(sfWebRequest $request)
    {
        $this->page = Doctrine::getTable('Page')->findOneByType('contact');
        $this->forward404Unless($this->page);
    }

}
