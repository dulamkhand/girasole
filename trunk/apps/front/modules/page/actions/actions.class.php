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
    
    public function executeShow(sfWebRequest $request)
    {
        $menu = $request->getParameter('menu');
        $this->forward404Unless(in_array($menu, myConstants::getMenuKeys()));
        
        $this->pages = $pages = Doctrine::getTable('Page')->getPages($menu);
        
        $showpage = null;
        if($request->getParameter('id')) $showpage = Doctrine::getTable('Page')->find($request->getParameter('id'));
        foreach ($pages as $page)
        {
            if(!$showpage) $showpage = $page;
        }
            
        $this->menu = $menu;
        $this->showpage = $showpage;
    }

}