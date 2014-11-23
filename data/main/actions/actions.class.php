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
  
    public function executeHome(sfWebRequest $request)
    {
      // home
    }    
    
    public function execute404(sfWebRequest $request)
    {
        
    }
    
    public function executeSearch(sfWebRequest $request)
    {
        $this->pager = Doctrine::getTable('Content')->getPager(
            array('keyword'=>$request->getParameter('keyword'), 'limit'=>24), $request->getParameter('page'));
        
    }
    
    public function executeTmp(sfWebRequest $request)
    {
        echo 'success'; die();
    }

}
