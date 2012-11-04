<?php

/**
 * BannerTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class BannerTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object BannerTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Banner');
    }
    
    
    
    
    public function doExecute($params = array())
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
        
        return $q->execute();
    }
    
  
    public function doFetchArray($params = array())
    {
        $q = Doctrine_Query::create()->select('id, path, ext, link, target, position, start_date, end_date, sort, is_active, created_at');
        $q = self::params($q, $params);
                
        return $q->fetchArray();
    }
    
    
    public function doFetchSelection($params = array())
    {
        $res = array();
        $rss = self::doFetchArray($params);
        foreach ($rss as $rs)
        {
          $res[$rs['id']] = $rs['link'];
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
                
        $pager = new sfDoctrinePager('Banner', sfConfig::get('app_pager', 30));
        $pager->setPage($page);
        $pager->setQuery($q);
        $pager->init();
        
        return $pager;
    }
    
    
    private function params($q, $params = array())
    {
        $q->from('Banner');
        $q->where('id <> ? ', (isset($params['id']) && $params['id'] ? $params['id'] : 0));
  
        if(isset($params['position']) && $params['position'])
            $q->andWhere('position= ?', $params['position']);
          
        if(isset($params['keyword']) && $params['keyword'])
            $q->andWhere('link LIKE ? OR path LIKE ? OR ext LIKE ?', array('%'.$params['keyword'].'%', '%'.$params['keyword'].'%', '%'.$params['keyword'].'%'));
  
        if(isset($params['isActive']) && in_array($params['isActive'], array('0', '1'))) 
            $q->andWhere('is_active = ?', $params['isActive']);
        
        $limit = isset($params['limit']) ? $params['limit'] : sfConfig::get('app_pager', 30);
        $q->limit($limit);
        
        $q->orderBy('sort DESC, created_at ASC');
  
        return $q;
    }
}