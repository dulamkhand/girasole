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
      $this->objectType = $objectType = $request->getParameter('objectType');
      $this->objectId = $objectId = $request->getParameter('objectId');
      
      if($objectType && $objectId)
      {
          $this->pager = Doctrine::getTable('Image')->getPager(array('objectType'=>$objectType, 'objectId'=>$objectId), $request->getParameter('page'));    
      }
  }
  
  public function executeLoadObjects(sfWebRequest $request)
  {
      $objects = array();
      $objectType = $request->getParameter('objectType');
      switch ($objectType)
      {
        	case 'content': $objects = Doctrine::getTable('Content')->doFetchSelection(); break;
        	case 'runway': $objects = Doctrine::getTable('Runway')->doFetchSelection(); break;
      }
      if (!sizeof($objects)) return sfView::NONE;

      $this->objects = $objects;
      $this->objectId = $request->getParameter('objectId') ? $request->getParameter('objectId') : 0;
  }
  
  
  public function executeNew(sfWebRequest $request)
  {
      $this->objectType = $objectType = $request->getParameter('objectType');
      $this->objectId = $objectId = $request->getParameter('objectId');

      $this->form = new ImageForm(null, array('objectType'=>$objectType, 'objectId'=>$objectId));
  }

  public function executeCreate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST));
  
      $this->form = new ImageForm();
  
      $this->processForm($request, $this->form);
  
      $this->setTemplate('new');
  }
  

  public function executeEdit(sfWebRequest $request)
  {
      $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
      
      $this->objectType = $objectType = $image->getObjectType();
      $this->objectId = $objectId = $image->getObjectId();
      
      $this->form = new ImageForm($image, array('objectType'=>$objectType, 'objectId'=>$objectId));
  }
  
  public function executeUpdate(sfWebRequest $request)
  {
      $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
      $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
      $this->form = new ImageForm($image, array());
  
      $this->processForm($request, $this->form);
  
      $this->setTemplate('edit');
  }
  
  public function executeDelete(sfWebRequest $request)
  {
      $this->forward404Unless($image = Doctrine_Core::getTable('Image')->find(array($request->getParameter('id'))), sprintf('Object image does not exist (%s).', $request->getParameter('id')));
            
      $objectType = $image->getObjectType();
      $objectId = $image->getObjectId();
      $image->delete();
      
      $this->getUser()->setFlash('info', 'Successfully deleted.', true);

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
              $obj->setCover($image->getFolder().'/'.$image->getFilename());
              $obj->save();	
                  
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
          
          //runway: 120,310,org
          //content: 400,700,org

          myTools::createThumbs($image->getFilename(), $image->getFolder(), array(120, 310));
          //myTools::createQualities($image->getFilename(), $image->getFolder(), array(50));

          $this->getUser()->setFlash('info', 'Successfully saved.', true);
          
          $this->redirect('image/new?objectType='.$image->getObjectType().'&objectId='.$image->getObjectId());
      }
  }

}