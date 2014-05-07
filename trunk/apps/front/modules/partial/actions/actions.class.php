<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class partialActions extends sfActions
{
	
	public function executeCouponPrint(sfWebRequest $request)
  {
  		$this->forward404Unless($this->rs = GlobalTable::doFetchOne('Coupon', array('route'=>$request->getParameter('route'))));
  		$key = 'code'.$this->rs['id'];
  		$code = $this->getUser()->getAttribute($key, null);
  		// TODO: not working here
  		if(!$code) {
  				// select CouponCode
  				$tmp = GlobalTable::doFetchOne('CouponCode', array('type'=>$request->getParameter('type'), 'isActive'=>'all', 'isUsed'=>'0'));
  				$this->forward404Unless($code = $tmp['code']);
					$this->getUser()->setAttribute($key, $code);
					// update CouponCode
					Doctrine::getTable('CouponCode')->createQuery('a')->update('CouponCode')->set('is_used = 1')->where('id =?', $code['id'])->execute();
  				// insert CouponPrint
		  		$cp = new CouponPrint();
		  		$cp->setCouponId($this->rs['id']);
		  		$cp->setCode($code);
		  		$cp->setIp($request->getRemoteAddress());
		  		$cp->save();
  		}
  		$this->code = $code;
			$this->setLayout('layoutPrint');
  }
  
	public function executeLove(sfWebRequest $request)
  {
      if(!$this->getUser()->isAuthenticated()) $this->forward('user', 'new');

	    $res = "Алдаа гарлаа. Та хэсэг хугацааны дараа дахин оролдоод үзнэ үү.";
	    if($request->isMethod(sfRequest::POST))
	    {
	        $this->setLayout(false);
	        $this->setTemplate(false);
	      
          $objectType = $request->getParameter('objectType');
          $objectId = $request->getParameter('objectId');     
          $userId = $this->getUser()->getId();
          $ipAddress = $request->getRemoteAddress();
  
          $rs = Doctrine::getTable('Comment')->doFetchOne(array('id'=>$objectId));
          $nbLove = $rs ? $rs['nb_love'] : 0;
  
          // unlove
          if($love = Doctrine::getTable('Love')->doFetchOne(array('objectType'=>$objectType, 'objectId'=>$objectId, 'ipAddress'=>$ipAddress)))
          {
              $love->delete();
              --$nbLove;
              //$rs = Doctrine::getTable('Love')->doCount(array('objectType'=>$objectType, 'objectId'=>$objectId));
              //return $this->renderPartial('love/box', array('rs'=>$rs));
          }
          else 
          {// love
          
  					  $love = new Love();
              $love->setObjectType($objectType);
              $love->setObjectId($objectId);
              $love->setUserId($userId);
              $love->setIpAddress($ipAddress);
              $love->save();
              ++$nbLove;
          }
          Doctrine::getTable('Comment')->updateNbLove($objectId, $nbLove);          
          return $this->renderText($nbLove);
	    } else {
	       $this->forward('user', 'new');
	    }
      
      return $this->renderText("");
  }
  
  
  public function subscribe(){
  		if($request->isMethod(sfRequest::POST))
	    {
	    		if(!Doctrine::getTable('Subscriber')->doFetchOne(array('email'=>$request->getParameter("subscribeEmail"))))
        	{
        			$sub = new Subscriber();
        			$sub->setEmail();
        			$sub->save();
        			return "Амжилттай хадгалагдлаа.";
        	}
        	return "Энэ имэйл бүртгэлтэй байна.";
	    }
  }
  
  
  
}