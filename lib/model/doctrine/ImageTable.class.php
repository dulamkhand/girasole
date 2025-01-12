<?php

class ImageTable extends Doctrine_Table
{

    public function doExecute($params = array())
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
        return $q->execute();
    }
    
  
    public function doFetchArray($params = array())
    {
        $q = Doctrine_Query::create()->select('id, object_type, object_id, folder, filename, title, description');
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
                
        $pager = new sfDoctrinePager('Image', sfConfig::get('app_pager', 30));
        $pager->setPage($page);
        $pager->setQuery($q);
        $pager->init();
        
        return $pager;
    }
        
    
    private function params($q, $params = array())
    {
        $q->from('Image');
        
        if(isset($params['id']) && $params['id'] != null)
            $q->andWhere('id = ?', $params['id']);
  
		    if(isset($params['objectType']) && $params['objectType'])
            $q->andWhere('object_type= ?', $params['objectType']);

        if(isset($params['objectId']) && $params['objectId'])
            $q->andWhere('object_id= ?', $params['objectId']);
          
        if(isset($params['keyword']) && $params['keyword'])
            $q->andWhere('title LIKE ? OR description LIKE ?', array('%'.$params['keyword'].'%', '%'.$params['keyword'].'%'));        
        
        # group, order, limit
        if(isset($params['groupBy']) && $params['groupBy']) 
            $q->groupBy($params['groupBy']);

        if(isset($params['offset']) && $params['offset'])
            $q->offset($params['offset']);
        
        $limit = isset($params['limit']) ? $params['limit'] : sfConfig::get('app_limit', 30);
        $q->limit($limit);
  
        $order = isset($params['orderBy']) ? $params['orderBy'] : 'sort DESC, created_at DESC';
        $q->orderBy($order);
  
        return $q;
    }
  

}