<?php 
$categoryIds = null;
switch ($type) {
	case 'businesswoman': $categoryIds = array(18, 19, 21, 69);	break;
	case 'housewife': $categoryIds = array(28, 32, 39, 65);	break;
	case 'diva': $categoryIds = array(48, 42, 43, 67);	break;
	//case 'teenage': $categoryIds = array(18, 19, 21, 69);	break;
	default: 	break;
}
?>

<ul style="margin:0;padding:0;">
  <?php $rss = Doctrine::getTable('Content')->doFetchArray(
            array(
                    'type'=>$type,
                    'isFeatured'=>1, 
                    'categoryIds'=>$categoryIds,
                    'limit'=>(isset($limit) ? $limit : 4
                 )
        ));?>

  <?php $i = 0?>
  <?php foreach ($rss as $rs):?>
  
    <li class="home-flow" style="margin:0 <?php echo ++$i==4 ? 0 : '11px'?> 0 0;">
    
        <a href="<?php echo url_for('content/leaf1?type='.$rs['type'].'&route='.$rs['route'])?>" style="height:120px;overflow:hidden;display:block;">
            <?php echo image_tag($rs['cover'], array(''=>'','class'=>'box-img'));?>
        </a>
        
        <div style="padding:5px 10px 0 10px;text-align:center;">
  
      			<?php echo link_to($rs['title'], 'content/leaf1?type='.$rs['type'].'&route='.$rs['route'], 
      			                   array('class'=>'title', 'style'=>'color:green;font-weight:bold;'));?>
      			<br clear="all">

            <!--TODO: author is here-->      			

      			<div class="timestamp align-center"><?php echo time_ago($rs['created_at'])?></div>
      			
      			<?php echo link_to($rs['category_name'], 'content/branch2?type='.$rs['type'].'&last=1&catId='.$rs['category_id'], array('class'=>'category', 'style'=>'color:#000;font-weight:normal;'));?>
  			</div>
  			
  			<br clear="all">
    </li>
  <?php endforeach;?>
</ul>

