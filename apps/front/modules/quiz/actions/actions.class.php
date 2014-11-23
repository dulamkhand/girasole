<?php

/**
 * page actions.
 *
 * @package    khas
 * @subpackage page
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 3335 2007-01-23 16:19:56Z fabien $
 */
class quizActions extends sfActions
{

		public function executeAnswer(sfWebRequest $request)
    {
        $this->msg = "Уучлаарай, хүсэлт амжилтгүй боллоо. Та dagina.mn-н админтай холбогдоно уу (help@dagina.mn, 99022507)";
        if($request->isMethod(sfRequest::POST)) {
            if(($sumpoint = $request->getParameter('sumpoint')) > 0 && ($quizId = $request->getParameter('quizId'))) {
                $this->rs = Doctrine::getTable('QuizAnswer')->doFetchOne(array('quizId'=>$quizId, 'point'=>$sumpoint));
            }
        }
        $this->setLayout(false);      
        return sfView::SUCCESS;
    }
    
    public function executeDetail(sfWebRequest $request)
    {
    		$this->forward404Unless($this->rs = Doctrine::getTable('Quiz')->doFetchOne(array('route'=>$request->getParameter('route'))));
    }
    
}