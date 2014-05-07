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
        $q = Doctrine_Query::create()->select('*');
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
    
  
    public function doCount($params = array())
    {
        $q = Doctrine_Query::create()->select('count(id)');
        $q = self::params($q, $params);
        return $q->count();
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

        if(isset($params['id']) && $params['id'] != null)
            $q->andWhere('id = ?', $params['id']);
            
        if(isset($params['idO']) && $params['idO'] != null)
            $q->andWhere('id <> ?', $params['idO']);

        if(isset($params['ids']) && sizeof($params['ids'] != null))
            $q->andWhereIn('id', $params['ids']);

        if(isset($params['idsO']) && sizeof($params['idsO'] != null))
            $q->andWhereNotIn('id', $params['idsO']);
            
        if(isset($params['route']) && $params['route'] != null)
            $q->andWhere('route= ?', $params['route']);
  
        if(isset($params['type']) && $params['type'] != null)
            $q->andWhere('type= ?', $params['type']);
        
        if(isset($params['typeO']) && $params['typeO'] != null)
            $q->andWhere('type <> ?', $params['typeO']);
          
        if(isset($params['keyword']) && $params['keyword'])
            $q->andWhere('title LIKE ? OR summary LIKE ? OR content LIKE ?', 
            array('%'.$params['keyword'].'%', '%'.$params['keyword'].'%', '%'.$params['keyword'].'%'));        
        
        if(isset($params['isActive'])) {
            if($params['isActive'] != "all" && in_array($params['isActive'], array('0', '1'))) // all ued filter hiihgui
                $q->andWhere('is_active = ?', $params['isActive']);
        } else {
            $q->andWhere('is_active = ?', 1);
        }
        
        // group, offset, limit, order
        if(isset($params['groupBy']) && $params['groupBy']) 
            $q->groupBy($params['groupBy']);

        if(isset($params['offset']) && $params['offset']) 
            $q->offset($params['offset']);    

        $limit = isset($params['limit']) ? $params['limit'] : sfConfig::get('app_limit', 30);
        $q->limit($limit);
        
        $order = isset($params['orderBy']) ? $params['orderBy'] : 'sort DESC, created_at DESC, title ASC';
        $q->orderBy($order);
  
        return $q;
    }
  

}