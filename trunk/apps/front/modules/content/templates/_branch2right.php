<div style="border:1px solid #ccc;padding:0 5px 0 15px;" class="right">

<div style="padding:10px 0;border-bottom:2px solid #ccc;">
    <span class="title-branch2" style="color:green;">ШИЛДЭГ</span>
    <span class="title-branch2" style="">НИЙТЛЭЛҮҮД</span> 
</div>

<ul style="border-top:0px solid #ccc;" class="none right">
  <?php 
      $params = array();
      $params['isTop'] = 1;
      $params['groupBy'] = 'category_id';
      $params['type'] = $type;
      $params['limit'] = 10;
      //if($sf_params->get('last')) $params['categoryId0'] = $category->getId();
      //else $params['parentCategoryId0'] = $category->getId();

      $contents = Doctrine::getTable('Content')->doFetchArray($params);
      include_partial('content/li', array('contents'=>$contents, 'type'=>$type));
  ?>
</ul>
</div>
