<?php

class PageTable extends Doctrine_Table
{

    public function doExecute($params = array())
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
        
        return $q->execute();
    }
    
  
    public function doFetchArray($params = array())
    {
        $q = Doctrine_Query::create()->select('id, type, menu, title, summary, content');
        $q = self::params($q, $params);
                
        return $q->fetchArray();
    }
    
    
    public function doFetchSelection($params = array())
    {
        $res = array();
        $rss = self::doFetchArray($params);
        foreach ($rss as $rs)
        {
          $res[$rs['id']] = $rs['title'];
        }
        return $res;
    }
  
    
    public function doFetchOne($params = array())
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
        return $q->fetchOne();
    }
    
  
    
    public function getPager($params = array(), $page=1)
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
                
        $pager = new sfDoctrinePager('Page', sfConfig::get('app_pager', 30));
        $pager->setPage($page);
        $pager->setQuery($q);
        $pager->init();
        
        return $pager;
    }
    
    
    private function params($q, $params = array())
    {
        $q->from('Page');
        $q->where('id <> ? ', (isset($params['id']) && $params['id'] ? $params['id'] : 0));
  
        if(isset($params['type']) && $params['type'])
            $q->andWhere('type= ?', $params['type']);
          
        if(isset($params['keyword']) && $params['keyword'])
            $q->andWhere('title LIKE ? OR summary LIKE ? OR content LIKE ?', array('%'.$params['keyword'].'%', '%'.$params['keyword'].'%', '%'.$params['keyword'].'%'));        
        
        if(isset($params['isActive']) && in_array($params['isActive'], array('0', '1'))) 
            $q->andWhere('is_active = ?', $params['isActive']);
        
        $limit = isset($params['limit']) ? $params['limit'] : sfConfig::get('app_pager', 30);
        $q->limit($limit);
        
        $q->orderBy('sort DESC, created_at DESC');
  
        return $q;
    }
  

}