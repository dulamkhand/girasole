<ul style="margin:0;padding:0;" class="none">
  <?php $rss = Doctrine::getTable('Content')->doFetchArray(
            array(
                    'groupBy'=>'category_id',
                    'type'=>$type,
                    'isFeatured'=>1, 
                    'limit'=>(isset($limit) ? $limit : 4
                 )
        ));?>

  <?php $i = 0?>
  <?php foreach ($rss as $rs):?>
  
    <li class="home-flow" style="margin:0 <?php echo ++$i==4 ? 0 : '11px'?> 0 0;">
    
        <a href="<?php echo url_for('content/leaf1?route='.$rs['route'].'&type='.$type)?>" style="height:120px;overflow:hidden;display:block;">
            <?php echo image_tag($rs['cover'], array('style'=>'max-width:300px;position:absolute;top:-50px;left:-50px;','class'=>''));?>
        </a>
        
        <div style="padding:5px 10px 0 10px;text-align:center;">
  
      			<?php echo link_to($rs['title'], 'content/leaf1?route='.$rs['route'].'&type='.$type, 
      			                   array('class'=>'title font16', 'style'=>'color:green;font-weight:bold;'));?>
      			<br clear="all">

      			<!--TODO: author-->
      			
      			<div class="timestamp align-center"><?php echo time_ago($rs['created_at'])?></div>
      			
      			<?php echo link_to($rs['category_name'], 'content/branch2?last=1&catId='.$rs['category_id'], array('class'=>'category', 'style'=>'color:#000;font-weight:normal;'));?>
  			</div>
  			
  			<br clear="all">
    </li>
  <?php endforeach;?>
</ul>

