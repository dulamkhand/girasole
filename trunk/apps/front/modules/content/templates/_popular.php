<h2 class="title-branch" style="text-align:center;border-bottom:1px dotted #ccc;">Их уншигдсан нийтлэлүүд</h2>

<?php 
$params = array();
if(isset($type) && $type) $params['type'] = $type;
$params['orderBy'] = 'nb_views DESC';
$params['limit'] = (isset($limit) ? $limit : 8);
$rss = Doctrine::getTable('Content')->doFetchArray($params);?>

<div class="" style="border-bottom:1px dotted #ccc;">
	  <?php $i = 0;?>
    <?php foreach ($rss as $rs):?>
        <div class="left intro" style="padding:0 20px 0 20px;margin:0;height:400px;width:218px;overflow:hidden;border:1px dotted #ccc;
    				<?php if(++$i == 1) echo 'border-left:0;padding-left:0;'; else if($i == 4) echo 'border-right:0;padding-right:0;';?>">

            <?php echo link_to(image_tag($rs['cover'], array('style'=>'max-width:212px;max-height:160px;border:3px solid green;margin:15px 0 7px 0;','class'=>'')), 
                                'content/leaf1?type='.$rs['type'].'&route='.$rs['route'], array());?>
            <br clear="all">            
            <?php echo link_to($rs['title'], 'content/leaf1?type='.$rs['type'].'&route='.$rs['route'], array('class'=>'title','style'=>'margin:0 0 5px 0;display:block;', 'title'=>$rs['title']));?>            
            <?php echo myTools::utf8_substr(striptags($rs['intro']), 0, 200)?> ...
            
            <div style="position:absolute;left:10px;bottom:10px;width:208px;">
                <?php echo link_to($rs['category_name'], 'content/branch2?type='.$rs['type'].'&last=1&catId='.$rs['category_id'], array('class'=>'category', 'style'=>''));?>
                <span class="timestamp right"><?php echo time_ago($rs['created_at'])?></span>                
                <br clear="all">
            </div>
        </div>
        
        <?php if($i == 4) {
                  $i = 0;
                  echo '<br clear="all">';
        }?>

    <?php endforeach;?>
</div>

<br clear="all">