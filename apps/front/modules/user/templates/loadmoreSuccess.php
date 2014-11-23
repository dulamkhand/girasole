<?php if(sizeof($contents)):?>

<?php foreach ($contents as $content):?>

  <li style="border-bottom:1px dotted #ccc;padding:15px 0 15px 0;width:100%;">

      <a href="<?php echo url_for('content/leaf1?route='.$content['route'].'&type='.$type)?>" class="box-img" style="width:300px;height:150px;">
          <?php echo image_tag($content['cover'], array('style'=>''));?>
      </a>
      
      <div class="left" style="width:500px;">
        <?php echo link_to($content['title'], 'content/leaf1?route='.$content['route'].'&type='.$type, array('class'=>'title', 'style'=>'line-height:24px'));?>
        <br clear="all">
	  
	      <div class="timestamp left"><?php echo time_ago($content['created_at'])?></div>
	  
        <a href="#" class="font9 gray" style="line-height:10px;">
            <?php echo image_tag('icons/heart.png', array())?>
            6
        </a>
        
        &nbsp; 
        
        <a href="#" class="font9 gray" style="line-height:10px;">
            <?php echo image_tag('icons/comments.png', array())?>
            12
        </a>
      </div>
      
      <br clear="all">
      
  </li>
<?php endforeach;?>

<!--<li>
  <a style="margin:5px 0;" href="javascript:loadmore();" class="loadmore" id="link-showall">Цааш унших &darr; </a>
</li>-->

<?php else:?>
  <div class="flash">Үр дүн олдсонгүй.</div>
<?php endif?>