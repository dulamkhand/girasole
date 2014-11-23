<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class discussActions extends sfActions
{
  public function preExecute()
  {
  }
  
  public function executeSave(sfWebRequest $request)
  {
      $errorString = "Алдаа гарлаа. Та хэсэг хугацааны дараа дахин оролдоод үзнэ үү.";
      
      if($request->isMethod(sfRequest::POST))
      {
          $objectType = $request->getParameter('discussObjectType');
          $objectId = $request->getParameter('discussObjectId');        
          $name = myTools::clearInput($request->getParameter('discussName'));
          $text = myTools::clearInput($request->getParameter('discussBody'));
          $ipAddress = $request->getRemoteAddress();
  
          if($text)
          {
            if(!Doctrine::getTable('Discuss')->doFetchOne(array('objectType'=>$objectType, 'objectId'=>$objectId, 'text'=>$text, 'name'=>$name, 'ipAddress'=>$ipAddress)))
            {
                // save discuss
                $discuss = new Discuss();
                $discuss->setObjectType($objectType);
                $discuss->setObjectId($objectId);
                $discuss->setIpAddress($ipAddress);
                $discuss->setName($name);
                $discuss->setText($text);
                $discuss->save();
                
                // save mirror
                $m = new DiscussMirror();
                $m->setId($discuss->getId());
                $m->setObjectType($objectType);
                $m->setObjectId($objectId);
                $m->setIpAddress($ipAddress);
                $m->setName($name);
                $m->setText($text);
                $m->save();
                
                $rs = Doctrine::getTable('Discuss')->doFetchOne(array('id'=>$discuss->getId()));
                return $this->renderPartial('discuss/box', array('rs'=>$rs));
            }
            else $errorString = "Таны сэтгэгдэл амжилттай хадгалагдсан байна.";
          }
          else $errorString = "Та сэтгэгдлээ оруулна уу.";
      }

      $str = <<<EOF
             <script type="text/javascript">
               $('#discuss-error').html("{$errorString}");
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