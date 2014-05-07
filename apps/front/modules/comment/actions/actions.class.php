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
          $name = myTools::clearInput($request->getParameter('commentName'));
          $text = myTools::clearInput($request->getParameter('commentBody'));
          $ipAddress = $request->getRemoteAddress();
          
          if($text)
          {
            if(!Doctrine::getTable('Comment')->doFetchOne(array('objectType'=>$objectType, 'objectId'=>$objectId, 'text'=>$text, 'name'=>$name, 'ipAddress'=>$ipAddress)))
            {
                // save comment
                $comment = new Comment();
                $comment->setObjectType($objectType);
                $comment->setObjectId($objectId);
                $comment->setIpAddress($ipAddress);
                $comment->setName($name);
                $comment->setText($text);
                $comment->save();
                
                // save mirror
                $m = new CommentMirror();
                $m->setId($comment->getId());
                $m->setObjectType($objectType);
                $m->setObjectId($objectId);
                $m->setIpAddress($ipAddress);
                $m->setName($name);
                $m->setText($text);
                $m->save();
  
                # update content nb_comment
                if($content = Doctrine::getTable('Content')->doFetchOne(array('id'=>$objectId))) {
                    $content->setNbComment($content->getNbComment() + 1);  
                    $content->save();
                }
                
                $rs = Doctrine::getTable('Comment')->doFetchOne(array('id'=>$comment->getId()));
                return $this->renderPartial('comment/box', array('rs'=>$rs));
            }
            else $errorString = "Таны сэтгэгдэл амжилттай хадгалагдсан байна.";
          }
          else $errorString = "Та сэтгэгдлээ оруулна уу.";
      }
  
      $str = <<<EOF
               <script type="text/javascript">
                 $('#comment-error').html("{$errorString}");
               </script>
EOF;
      return $this->renderText($str);
  }
  

  public function executeShowAll(sfWebRequest $request)
  {
      $this->objectType = $request->getParameter('objectType');
      $this->objectId = $request->getParameter('objectId');
      $this->setLayout(false);
  }


}