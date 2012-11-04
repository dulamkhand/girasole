<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class commentActions extends sfActions
{
  public function preExecute()
  {
    
  }
  
  public function executeSave(sfWebRequest $request)
  {
    $errorString = "Алдаа гарлаа. Та хэсэг хугацааны дараа дахин оролдоод үзнэ үү.";
    
    if($request->isMethod(sfRequest::POST))
    {
        $objectType = $request->getParameter('commentObjectType');
        $objectId = $request->getParameter('commentObjectId');        
        $name = $request->getParameter('commentName');
        $text = strip_tags($request->getParameter('commentBody'));
        $ipAddress = $request->getRemoteAddress();

        if($text)
        {
          if(!Doctrine::getTable('Comment')->doFetchOne(array('objectType'=>$objectType, 'objectId'=>$objectId, 'text'=>$text, 'name'=>$name, 'ipAddress'=>$ipAddress)))
          {
              $comment = new Comment();
              $comment->setObjectType($objectType);
              $comment->setObjectId($objectId);
              $comment->setIpAddress($ipAddress);
              $comment->setName($name);
              //$text = mb_convert_encoding(utf8_decode($text), 'UTF-8', 'windows-1251');
              $comment->setText($text);
              $comment->save();
              
              $rs = Doctrine::getTable('Comment')->doFetchOne(array('id'=>$comment->getId()));
              return $this->renderPartial('comment/box', array('rs'=>$rs));
          }
          else $errorString = "&uarr; Та энэ сэтгэгдэлээ үлдээсэн байна &uarr;";
        }
        else $errorString = "&uarr; Та сэтгэгдлээ оруулна уу &uarr;";
    }

    $str = <<<EOF
             <script type="text/javascript">
               $('#comment-error').html("{$errorString}");
             </script>
EOF;
    return $this->renderText($str);
  }
  
  


  public function executeDelete(sfWebRequest $request)
  {
    $comment = Doctrine::getTable('Comment')->find($request->getParameter('commentId'));
    
    if($comment 
       && ($this->getUser()->getId() == $comment->getCreatedBy()) // comment writer
       // TODO: && () // comment owner
      )
    {
      try {
        $comment->delete();
      }catch (Exception $e){}
    }
    return sfView::NONE;
  }


}