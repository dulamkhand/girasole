<?php

/**
 * Page
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    vogue
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Page extends BasePage
{
    public function __toString()
    {
        return $this->getTitle();
    }
    
    
    /*public function save(Doctrine_Connection $conn = null)
    {
        if ($conn === null)
        {
          $conn = $this->_table->getConnection();
        }
    
        $route = myTools::stripText(myTools::mn2en($this->getTitle()));
        $this->setUrlTitle($route);
    
        return parent::save($conn);
    }*/
}