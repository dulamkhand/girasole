<?php $position = 5?>

<a href="<?php echo url_for('content/branch2?type='.$type.'&catId='.$cats[$position]['id'])?>" class="title-branch">
  <?php echo $cats[$position]['name']?>
</a>

<hr style="background:#000;height:1px;">

<ul class="none">
  <?php $rss = Doctrine::getTable('Content')->doFetchArray(
            array(
                    //'groupBy'=>'category_id',
                    'type'=>$cats[$position]['type'],
                    'parentCategoryId'=>$cats[$position]['id'], 
                    'limit'=>3
                 ));?>

  <?php foreach ($rss as $rs):?>
    <li style="margin:0;padding:10px 0;border-bottom:1px dotted #ccc;height:230px;" class="intro">
            
        <?php if($rs['cover']):?>
            <a href="<?php echo url_for('content/leaf1?type='.$type.'&route='.$rs['route'])?>" class="left">
                <?php echo image_tag($rs['cover'], array('class'=>'box-img', 'style'=>'margin-top:7px;'));?>
            </a>
        <?php endif;?>
    
        <?php echo link_to($rs['title'], 'content/leaf1?type='.$type.'&route='.$rs['route'], array('class'=>'title'));?><br>    
		<?php echo myTools::utf8_substr(striptags($rs['intro']), 0, 350)?> ...
		<br clear="all">

		<div style="position:absolute;left:0;bottom:10px;width:375px;">
    		<?php echo link_to($rs['category_name'], 'content/branch2?type='.$type.'&last=1&catId='.$rs['category_id'], array('class'=>'category left', 'style'=>''));?>
    		<span class="timestamp right"><?php echo time_ago($rs['created_at'])?></span>
    		<br clear="all">
		</div>
    </li>
  <?php endforeach;?>
  
    <li style="margin:0;padding:10px 0 0 0;text-align:right;text-transform:uppercase;">
        <a href="<?php echo url_for('content/branch2?type='.$type.'&catId='.$cats[$position]['id'])?>">
            "<?php echo $cats[$position]['name']?>" <span class="category" style="font-weight:bold;font-style:normal;">-н бусад сэдвүүд &raquo;</span>
        </a>
    </li>
</ul>


