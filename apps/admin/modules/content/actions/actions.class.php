<?php

/**
 * page actions.
 *
 * @package    barilga
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class contentActions extends sfActions
{
    public function preExecute() {
        
    }
    

    public function executeIndex(sfWebRequest $request)
    {
        $this->forwardUnless($this->getUser()->hasCredential('content-view'), 'admin', 'perm');
        

        $this->pager = Doctrine::getTable('Content')->getPager(array(
                'categoryId'=>$request->getParameter('categoryId'),
                'categoryIds'=>$this->getUser()->getCatPermissions(), // check admin.cat_permissions
                'keyword'=>$request->getParameter('keyword'),
                'type'=>$request->getParameter('type'),                
                'isFeatured'=>$request->getParameter('isFeatured'),
                'isFeaturedHome'=>$request->getParameter('isFeaturedHome'),
                'isFeaturedHome1'=>$request->getParameter('isFeaturedHome1'),
                'isActive'=>$request->getParameter('isActive', 'all'),
                'isTop'=>$request->getParameter('isTop'),
                'isDiscuss'=>$request->getParameter('isDiscuss'),
                'ask18'=>$request->getParameter('ask18'),
                'orderBy'=>'updated_at DESC'
            ), $request->getParameter('page'));
    }
    
    public function executeActivate(sfWebRequest $request)
    {
        // check mod_permission
        $this->forwardUnless($this->getUser()->hasCredential('content-edit'), 'admin', 'perm');
        $this->forward404Unless($content = Doctrine::getTable('Content')->find($request->getParameter('id')));
        // check cat_permission
        $this->forwardUnless(in_array($content->getCategoryId(), $this->getUser()->getCatPermissions()), 'admin', 'perm');
        $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
        $content->setIsActive($cmd);
        $content->save();
        $this->getUser()->setFlash('flash', 'Successfully saved.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'content/index');
    }
    
    public function executeFeaturate(sfWebRequest $request)
    {
        $this->forwardUnless($this->getUser()->hasCredential('content-edit'), 'admin', 'perm');

        $this->forward404Unless($content = Doctrine::getTable('Content')->find($request->getParameter('id')));
        $this->forward404Unless(in_array($cmd = $request->getParameter('cmd'), array(0,1)));
    
        $content->setIsFeatured($cmd);
        $content->save();
        $this->getUser()->setFlash('flash', 'Successfully saved.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'content/index');
    }

  
    public function executeNew(sfWebRequest $request)
    {
        $this->forwardUnless($this->getUser()->hasCredential('content-edit'), 'admin', 'perm');
        $this->form = new ContentForm();
    }
  
    public function executeCreate(sfWebRequest $request)
    {
        $this->forwardUnless($this->getUser()->hasCredential('content-edit'), 'admin', 'perm');

        $this->forward404Unless($request->isMethod(sfRequest::POST));
    
        $this->form = new ContentForm();
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('new');
    }
  
    public function executeEdit(sfWebRequest $request)
    {
        $this->forwardUnless($this->getUser()->hasCredential('content-edit'), 'admin', 'perm');

        $this->forward404Unless($content = Doctrine::getTable('Content')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new ContentForm($content);
    }
  
    public function executeUpdate(sfWebRequest $request)
    {
        $this->forwardUnless($this->getUser()->hasCredential('content-edit'), 'admin', 'perm');

        $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
        $this->forward404Unless($content = Doctrine::getTable('Content')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $this->form = new ContentForm($content);
    
        $this->processForm($request, $this->form);
    
        $this->setTemplate('edit');
    }
  
    public function executeDelete(sfWebRequest $request)
    {
        $this->forwardUnless($this->getUser()->hasCredential('content-delete'), 'admin', 'perm');

        $this->forward404Unless($content = Doctrine::getTable('Content')->find(array($request->getParameter('id'))), sprintf('Object page does not exist (%s).', $request->getParameter('id')));
        $content->delete();
        $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
        $this->redirect($request->getReferer() ? $request->getReferer() : 'content/index');
    }
  
    protected function processForm(sfWebRequest $request, sfForm $form)
    {        
        $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
        if ($form->isValid())
        {          
            $content = $form->save();

            /* CATEGORY */
            // update category updated date            
            $cat = Doctrine::getTable('Category')->find($content->getCategoryId());            
            $cat->setUpdatedAt(date('Y-m-d H:i:s'));            
            $cat->save();

            // set category info
            $content->setType($cat->getType());
            $content->setCategoryName($cat->getName());
            // set route
            $content->setRoute(myTools::slugify(myTools::mn2en($content->getTitle())));

            // set parent category info
            $catParent = Doctrine::getTable('Category')->find($cat->getParentId());
            $content->setParentCategoryId($catParent->getId());
            $content->setParentCategoryName($catParent->getName());
            $content->setUpdatedAt(date('Y-m-d H:i:s'));

            /* REALTED_IDS */
            $relatedIds = join(";", $request->getParameter('related_ids'));
            $content->setRelatedIds($relatedIds);
            $content->setAdminId($this->getUser()->getId());
            $content->save();
            
            /* QUIZ */
            if($content->getQuizId()) { 
                // update quiz.content_id
                Doctrine::getTable('Quiz')->updateContentId($content->getId(), $content->getQuizId());
            }
            
            /* IMAGE */
            // image size 600x450
            // branch1 - 85x120, 125x156
            // branch2 - 
            // branch3 - 180x250, 713x400
            // leaf1 - 450x~, 70x50          
            
            $this->getUser()->setFlash('flash', 'Successfully saved.', true);
            $this->redirect('content/index');
        }

    }

}