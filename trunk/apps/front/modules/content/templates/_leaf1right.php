<ul class="none">
  <?php 
  $params = array();
  $params['idsO'] = $sf_user->getAttribute('myViewedRelatedContentIds', array());
  $params['limit'] = 10;
  if($content->getRelatedIds()) 
      $params['ids'] = explode(';', $content->getRelatedIds());
  else {
      $params['categoryId'] = $categoryId;
      $params['idO'] = $content->getId();
  }
  $contents = Doctrine::getTable('Content')->doFetchArray($params);?>

  <?php foreach ($contents as $content):?>
  
    <li style="border-bottom:1px dotted #ccc;padding:15px 0 15px 0;width:330px;">

        <a href="<?php echo url_for('content/leaf1?type='.$content['type'].'&route='.$content['route'])?>" style="height:90px;">
            <?php echo image_tag($content['cover'], array('class'=>'box-img'));?>
        </a>
        
        <div class="left" style="width:148px;">
            <?php echo link_to($content['title'], 'content/leaf1?type='.$content['type'].'&route='.$content['route'], array('class'=>'title', 'style'=>'line-height:24px'));?>
            <br clear="all">
  		  
  		      <div class="timestamp left"><?php echo time_ago($content['created_at'])?></div>
            &nbsp; &nbsp; 
            <a href="<?php echo url_for('content/leaf1?type='.$content['type'].'&route='.$content['route'].'#comments-title')?>" class="font9 gray" style="line-height:10px;">
                <?php echo image_tag('icons/comment12.png', array())?>
                <span class="timestamp"><?php echo $content['nb_comment']?></span>
            </a>
        </div>
        
        <br clear="all">
        
    </li>
  <?php endforeach;?>

</ul>

