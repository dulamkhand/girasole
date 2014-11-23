<?php

/**
 * content actions.
 *
 * @package    khas
 * @subpackage content
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class contentActions extends sfActions
{
    public function preExecute()
    {
    }
    
    public function executeBranch1(sfWebRequest $request)
    {
        //$this->rss = Doctrine::getTable('Content')->doFetchArray(array('categoryId'=>$request->getParameter('categoryId')), $request->getParameter('page'));
        
        //$listtype = $request->getParameter('listtype', 'list1');
        //$this->setTemplate($listtype);
        
        // META TODO ?
        /* $meta = $category.' - '.sfConfig::get('app_webname');
        $this->getResponse()->setTitle($meta);
        $this->getResponse()->addMeta('description', $meta);
        $this->getResponse()->addMeta('keywords', $meta); */
    }
    
    public function executeBranch2(sfWebRequest $request)
    {
        $this->category = $category = Doctrine::getTable('Category')->find($request->getParameter('catId'));
        $this->forward404Unless($category);
        
        $this->last = $last = $request->getParameter('last');
        $this->type = $type = $category->getType();
        
        $params = array();
        $params['type'] = $type;
        $params['orderBy'] = 'sort DESC, updated_at DESC';
        if($last) $params['categoryId'] = $category->getId();
        else $params['parentCategoryId'] = $category->getId();
        $this->pager = Doctrine::getTable('Content')->getPager($params, $request->getParameter('page'));
        
        // META
        $meta = $category.' - '.sfConfig::get('app_webname');
        $this->getResponse()->setTitle($meta);
        $this->getResponse()->addMeta('description', $meta);
        $this->getResponse()->addMeta('keywords', $meta);
    }


    public function executeLeaf1(sfWebRequest $request)
    {
        $this->content = $content = Doctrine::getTable('Content')->doFetchOne(array('route'=>$request->getParameter('route'), 'type'=>$request->getParameter('type')));
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
    }
    

    public function executePrint(sfWebRequest $request)
    {
        $this->content = $content = Doctrine::getTable('Content')->doFetchOne(array('route'=>$request->getParameter('route'), 'type'=>$request->getParameter('type')));
        $this->forward404Unless($content);
		    $this->setLayout('layoutPrint');
    }

}