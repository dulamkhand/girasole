<?php $position = 2?>

<a href="<?php echo url_for('content/branch2?type='.$type.'&catId='.$cats[$position]['id'])?>" class="title-branch">
    <?php echo $cats[$position]['name']?>
</a>

<hr style="background:#000;height:1px;">

<ul style="border-left:3px solid green;margin:20px 0 0 0;padding:0 0 0 15px" class="none">
  <?php $rss = Doctrine::getTable('Content')->doFetchArray(
            array(
                    //'groupBy'=>'category_id',
                    'type'=>$cats[$position]['type'], 
                    'parentCategoryId'=>$cats[$position]['id'],
                    'limit'=>5
        ));?>

  <?php foreach ($rss as $rs):?>
    <li style="margin:0 0 13px 0;padding:0 0 13px 0;position:relative;border-bottom:1px dotted #ccc">

		<?php echo link_to($rs['title'], 'content/leaf1?type='.$type.'&route='.$rs['route'], array('class'=>'title'));?>
		<br clear="all">
    
		<div style="height:162px;overflow:hidden;" class="intro">
			<a href="<?php echo url_for('content/leaf1?type='.$type.'&route='.$rs['route'])?>" style="float:left;">
			  <?php echo image_tag($rs['cover'], array('class'=>'box-img', 'style'=>'margin:5px 8px 0 0;'));?>
			</a>
			<?php echo myTools::utf8_substr(striptags($rs['intro']), 0, 210)?>...
		</div>
		
		<?php echo link_to($rs['category_name'], 'content/branch2?type='.$type.'&last=1&catId='.$rs['category_id'], array('class'=>'category left', 'style'=>''));?>
		<div class="timestamp right"><?php echo time_ago($rs['created_at'])?></div>
		<br clear="all">
		<?php //echo link_to("Дэлгэрэнгүй &raquo;", 'content/leaf1?type='.$type.'&route='.$rs['route'], array('class'=>'more', 'style'=>'position:absolute;bottom:-2px;right:5px;'));?>
	</li>
  <?php endforeach;?>
  
  <!-- more topics -->
  <li style="margin:-5px 0 0 0;padding:0 0 10px 0;border-bottom:1px solid #ccc;text-align:right;text-transform:uppercase;">
      <a href="<?php echo url_for('content/branch2?type='.$type.'&catId='.$cats[$position]['id'])?>">
          "<?php echo $cats[$position]['name']?>" <span class="category" style="font-weight:bold;font-style:normal;">-н бусад сэдвүүд &raquo;</span>
      </a>
  </li>
  
</ul>