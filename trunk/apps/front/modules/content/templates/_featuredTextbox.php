<?php $rs = Doctrine::getTable('Content')->doFetchOne(array('isFeaturedHome1'=>1, 'orderBy'=>'updated_at DESC, category_id ASC'));?>
<?php if($rs):?>
<?php $uri = url_for('content/leaf1?type='.$rs['type'].'&route='.$rs['route'])?>
<ul style="margin:0;padding:0;">
    <li class="home-flow-nohover" style="margin:20px 0 0 0;width:580px;height:282px;overflow:hidden;text-align:justify;padding:10px;position:relative;">
    		<a href="<?php echo $uri?>" style="height:122px;overflow:hidden;float:left;margin:0 10px 0 0;">
            <?php echo image_tag($rs['cover'], array('style'=>'margin:0;','class'=>'box-img'));?>
        </a>
        
        <a href="<?php echo $uri?>" class="title" style="color:green;font-weight:bold;">
            <?php echo $rs['title']?>
        </a>
        <br>
        
    		<?php echo myTools::utf8_substr(striptags($rs['body']), 0, 350)?>...
    		
    		<div style="position:absolute;bottom:10px;left:10px;width:580px">			
    			<?php echo link_to($rs['category_name'], 'content/branch2?type='.$rs['type'].'&last=1&catId='.$rs['category_id'], array('class'=>'category left', 'style'=>'color:#000;font-weight:normal;'));?>
    			<a href="<?php echo $uri?>" class="more right" style="margin:0;display:block;">Дэлгэрэнгүй &raquo;</a>
    			<br clear="all">
    		</div>		
    </li>
</ul>
<?php endif;?>