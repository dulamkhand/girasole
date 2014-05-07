<?php

/**
 * image actions.
 *
 * @package    grand
 * @subpackage image
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class imageActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
      $this->forwardUnless($this->getUser()->hasCredential('content-view'), 'admin', 'perm');
      $this->objectType = $request->getParameter('objectType');
      $this->objectId = $request->getParameter('objectId');
      if($this->objectType && $this->objectId) {
          $this->pager = Doctrine::getTable('Image')->getPager(array('objectType'=>$this->objectType, 'objectId'=>$this->objectId), $request->getParameter('page'));
      }
  }

  
  public function executeLoadObjects(sfWebRequest $request)
  {
      $objects = array();
      $objectType = $request->getParameter('objectType');
      $objectId = $request->getParameter('objectId');
  	  $params = array();
  	  $params['order'] = 'created_at DESC';
  	  if($objectId)
  			$params['id'] = $objectId;
        switch ($objectType)
        {
          	case 'content': $objects = Doctrine::getTable('Content')->doFetchSelection($params); break;
          	//case 'runway': $objects = Doctrine::getTable('Runway')->doFetchSelection(); break;
        }
        if (!sizeof($objects)) return sfView::NONE;

      $this->objects = $objects;
      $this->objectId;
  }
  
  
  public function executeNew(sfWebRequest $request)
  {
      $this->forwardUnless($this->getUser()->hasCredential('content-edit'), 'admin', 'perm');
      $this->objectType = $request->getParameter('objectType');
      $this->objectId = $request->getParameter('objectId');
      $this->form = new ImageForm(null, array('objectType'=>$this->objectType, 'objectId'=>$this->objectId));
  }

  public function executeCreate(sfWebRequest $request)
  {
      $this->forwardUnless($this->getUser()->hasCredential('content-edit'), 'admin', 'perm');
      $this->forward404Unless($request->isMethod(sfRequest::POST));
      
      $this->objectType = $request->getParameter('objectType') ? $request->getParameter('objectType') : $request->getParameter('image[objectType]');
      $this->objectId = $request->getParameter('objectId') ? $request->getParameter('objectId') : $request->getParameter('image[objectId]');  
      $this->form = new ImageForm(null, array('objectType'=>$this->objectType, 'objectId'=>$this->objectId));

      $this->processForm($request, $this->form);
      $this->setTemplate('new');
  }
  

  public function executeEdit(sfWebRequest $request)
  {
      $this->forwardUnless($this->getUser()->hasCredential('content-edit'), 'admin', 'perm');
      $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
      
      $this->objectType = $image->getObjectType();
      $this->objectId = $image->getObjectId();
      $this->form = new ImageForm($image, array('objectType'=>$this->objectType, 'objectId'=>$this->objectId));
  }
  
  public function executeUpdate(sfWebRequest $request)
  {
      $this->forwardUnless($this->getUser()->hasCredential('content-edit'), 'admin', 'perm');
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));

      $this->objectType = $image->getObjectType();
      $this->objectId = $image->getObjectId();
      $this->form = new ImageForm($image, array('objectType'=>$this->objectType, 'objectId'=>$this->objectId));
  
      $this->processForm($request, $this->form);
      $this->setTemplate('edit');
  }
  
  public function executeDelete(sfWebRequest $request)
  {
      $this->forwardUnless($this->getUser()->hasCredential('content-edit'), 'admin', 'perm');
      $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
            
      $objectType = $image->getObjectType();
      $objectId = $image->getObjectId();
      $image->delete();
      
      $this->getUser()->setFlash('flash', 'Successfully deleted.', true);
      $this->redirect('image/index?objectType='.$objectType.'&objectId='.$objectId);
  }


  protected function processForm(sfWebRequest $request, sfForm $form)
  {
      $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
      if ($form->isValid())
      {
          $image = $form->save();
                    
          // save cover photo for content
          if($image->getIsCover())
          {
              $obj = Doctrine::getTable(strtoupper($image->getObjectType()))->find($image->getObjectId());
              if($obj){
                  $obj->setCover('/uploads/'.$image->getFolder().'/'.$image->getFilename());
                  $obj->save();	  
              }
              /*switch ($image->getObjectType()) 
              {
              	case "content":
                  $content = Doctrine::getTable('Content')->find($image->getObjectId());
                  $content->setCover($image->getFolder().'/'.$image->getFilename());
                  $content->save();	
              		break;
                case "runway":
                  $runway= Doctrine::getTable('Runway')->find($image->getObjectId());
                  $runway->setCover($image->getFolder().'/'.$image->getFilename());
                  $runway->save();
              		break;
              	default:
              		break;
              }*/
          }

          myTools::createThumbs($image->getFilename(), $image->getFolder(), array(600));
          //myTools::createQualities($image->getFilename(), $image->getFolder(), array(50));

          $this->getUser()->setFlash('flash', 'Successfully saved.', true);
          $this->redirect('image/new?objectType='.$image->getObjectType().'&objectId='.$image->getObjectId());
      }
  }

}