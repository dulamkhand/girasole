<?php foreach ($contents as $content):?>
    <li style="text-align:left;border:0;padding:8px 0;margin:0;background:url(<?php echo sfConfig::get('app_host')?>/images/dotted_line.gif) repeat-x;">
    		<?php echo link_to($content['title'], 'content/leaf1?type='.$content['type'].'&route='.$content['route'], array('class'=>'title arrow'));?><br>
    		<span class="timestamp left" style="font-size:10px;"><?php echo time_ago($content['created_at'])?> &nbsp;&nbsp; | &nbsp;&nbsp; </span>
    		<?php echo link_to($content['category_name'], 'content/branch2?type='.$content['type'].'&last=1&catId='.$content['category_id'], array('class'=>'category left', 'style'=>'color:green;opacity:0.7;font-size:10px;letter-spacing:0;'));?>
    		<br clear="all">
    </li>
<?php endforeach;?>