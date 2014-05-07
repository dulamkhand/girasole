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
        $q = Doctrine_Query::create()->select('id, parent_category_id, parent_category_name, category_id, category_name, 
                type, title, route, cover, intro, nb_comment, quiz_id, poll_id, related_ids, created_at');
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
    
    
    public function updateCatsNames($catId, $newName)
    {
        $q = Doctrine_Query::create()
            ->update('Content');
            $q->set('category_name', '"'.$newName.'"');
            $q->where('category_id = ?', $catId);
            $q->andWhere('category_name <> ?', $newName);
        $q->execute();
    }

    
    public function updateParentCatsNames($parentCatId, $newName)
    {
        $q = Doctrine_Query::create()
            ->update('Content');
            $q->set('parent_category_name', '"'.$newName.'"');
            $q->where('parent_category_id = ?', $parentCatId);
            $q->andWhere('parent_category_name <> ?', $newName);
        $q->execute();
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
        $q = Doctrine_Query::create()->select('id, parent_category_id, parent_category_name, category_id, category_name, 
                type, title, route, cover, intro, nb_comment, quiz_id, poll_id, related_ids, created_at');
        $q = self::params($q, $params);

        $pager = new sfDoctrinePager('Content', sfConfig::get('app_pager', 10));
        $pager->setPage($page);
        $pager->setQuery($q);
        $pager->init();
        
        return $pager;
    }
    
    
    private function params($q, $params = array())
    {
        $q->from('Content');
  
        if(isset($params['id']) && $params['id'] != null)
            $q->andWhere('id = ?', $params['id']);
            
        if(isset($params['idO']) && $params['idO'] != null)
            $q->andWhere('id <> ?', $params['idO']);

        if(isset($params['ids']) && sizeof($params['ids']))
            $q->andWhereIn('id', $params['ids']);

        if(isset($params['idsO']) && sizeof($params['idsO']))
            $q->andWhereNotIn('id', $params['idsO']);
            
        if(isset($params['route']) && $params['route'] != null)
            $q->andWhere('route= ?', $params['route']);

        if(isset($params['type']) && $params['type'] != null)
            $q->andWhere('type= ?', $params['type']);
            
        if(isset($params['typeO']) && $params['typeO'] != null)
            $q->andWhere('type <> ?', $params['typeO']);
            
        if(isset($params['parentCategoryId']) && $params['parentCategoryId'] != null)
            $q->andWhere('parent_category_id = ?', $params['parentCategoryId']);
            
        if(isset($params['parentCategoryId0']) && $params['parentCategoryId0'] != null)
            $q->andWhere('parent_category_id <> ?', $params['parentCategoryId0']);

        if(isset($params['categoryIds']) && $params['categoryIds'] != null)
            $q->andWhereIn('category_id', $params['categoryIds']);

        if(isset($params['categoryId']) && $params['categoryId'] != null)
            $q->andWhere('category_id = ?', $params['categoryId']);
            
        if(isset($params['categoryIdO']) && $params['categoryIdO'] != null)
            $q->andWhere('category_id <> ?', $params['categoryIdO']);
            
        if(isset($params['authorId']) && $params['authorId'] != null)
            $q->andWhere('author_id = ?', $params['authorId']);
            
        // quiz <=> content 2taldaa holbolt hiilee
        if(isset($params['quizId']) && $params['quizId']) 
            $q->andWhere('quiz_id = ?', $params['quizId']);
            
        // poll <=> content 2taldaa holbolt hiilee
        if(isset($params['pollId']) && $params['pollId']) 
            $q->andWhere('poll_id = ?', $params['pollId']);

        if(isset($params['keyword']) && $params['keyword'] != null)
            $q->andWhere('title LIKE ? OR intro LIKE ? OR body LIKE ? OR keywords LIKE ?', 
            array('%'.$params['keyword'].'%','%'.$params['keyword'].'%','%'.$params['keyword'].'%','%'.$params['keyword'].'%'));

        if(isset($params['isFeatured']) && in_array($params['isFeatured'], array('0', '1'))) 
            $q->andWhere('is_featured = ?', 1);
        if(isset($params['isFeaturedHome']) && in_array($params['isFeaturedHome'], array('0', '1')))
            $q->andWhere('is_featured_home = ?', 1);
        if(isset($params['isFeaturedHome1']) && in_array($params['isFeaturedHome1'], array('0', '1'))) 
            $q->andWhere('is_featured_home1 = ?', 1);
        
        if(isset($params['isActive'])) {
            if($params['isActive'] != "all" && in_array($params['isActive'], array('0', '1'))) // all ued filter hiihgui
                $q->andWhere('is_active = ?', $params['isActive']);
        } else {
            $q->andWhere('is_active = ?', 1);
        }
            
        if(isset($params['isTop']) && in_array($params['isTop'], array('0', '1'))) 
            $q->andWhere('is_top = ?', 1);
        if(isset($params['isNew']) && in_array($params['isNew'], array('0', '1'))) 
            $q->andWhere('is_new = ?', 1);
        if(isset($params['isDiscuss']) && in_array($params['isDiscuss'], array('0', '1'))) 
            $q->andWhere('is_discuss = ?', 1);
            
        if(isset($params['ask18']) && in_array($params['ask18'], array('0', '1'))) 
            $q->andWhere('ask18 = ?', 1);


        // group, offset, limit, order
        if(isset($params['groupBy']) && $params['groupBy']) 
            $q->groupBy($params['groupBy']);

        if(isset($params['offset']) && $params['offset']) 
            $q->offset($params['offset']);    

        $limit = isset($params['limit']) ? $params['limit'] : sfConfig::get('app_limit', 30);
        $q->limit($limit);
        
        $order = isset($params['orderBy']) ? $params['orderBy'] : 'updated_at DESC, created_at DESC, sort DESC, title ASC';
        $q->orderBy($order);
        
        return $q;
    }
  

}