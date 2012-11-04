<?php

class ContentTable extends Doctrine_Table
{

    public function doExecute($params = array())
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
        
        return $q->execute();
    }
    
  
    public function doFetchArray($params = array())
    {
        $q = Doctrine_Query::create()->select('id, category_id, category_name, title, cover, intro, body, source, created_at');
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
                
        $pager = new sfDoctrinePager('Content', sfConfig::get('app_pager', 30));
        $pager->setPage($page);
        $pager->setQuery($q);
        $pager->init();
        
        return $pager;
    }
    
    
    private function params($q, $params = array())
    {
        $q->from('Content');
  
        if(isset($params['id']) && $params['id'])
            $q->andWhere('id= ?', $params['id']);

        if(isset($params['categoryId']) && $params['categoryId'])
            $q->andWhere('category_id= ?', $params['categoryId']);
          
        if(isset($params['keyword']) && $params['keyword'])
            $q->andWhere('title LIKE ? OR description LIKE ? OR keywords LIKE ?', array('%'.$params['keyword'].'%', '%'.$params['keyword'].'%', '%'.$params['keyword'].'%'));
  
        if(isset($params['isFeatured']) && in_array($params['isFeatured'], array('0', '1'))) 
            $q->andWhere('is_featured = ?', $params['isFeatured']);
        
        if(isset($params['isActive']) && in_array($params['isActive'], array('0', '1'))) 
            $q->andWhere('is_active = ?', $params['isActive']);
        
        $limit = isset($params['limit']) ? $params['limit'] : sfConfig::get('app_pager', 30);
        $q->limit($limit);
        
        $q->orderBy('sort DESC, created_at ASC');
  
        return $q;
    }
  

}