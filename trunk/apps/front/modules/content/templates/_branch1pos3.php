<?php $position = 3?>

<?php //use_stylesheet('/addons/flexslider/flexsliderBranch2.css');?> <!--not used-->

<a href="<?php echo url_for('content/branch2?type='.$type.'&catId='.$cats[$position]['id'])?>" class="title-branch">
    <?php echo $cats[$position]['name']?>
</a>

<a href="<?php echo url_for('content/branch2?type='.$type.'&catId='.$cats[$position]['id'])?>" 
    style="position:absolute;right:5px;top:20px;padding:0;font-weight:bold;font-style:normal;" class="category">
    бусад сэдвүүд &raquo;
</a>


<style type="text/css">
.flex-direction-nav{width:450px;}
</style>

<div style="border:1px solid #ccc;"> <!--class="flexslider"-->
<ul class="slides" style="border:0;height:842px;overflow:hidden;padding:0 10px;">
  <!-- TODO update -->
  <?php $rss = Doctrine::getTable('Content')->doFetchArray(
            array(
                    //'groupBy'=>'category_id',
                    'type'=>$cats[$position]['type'],
                    'parentCategoryId'=>$cats[$position]['id'], 
                    'limit'=>4
                 ));
                 ?>
  <?php $last = sizeof($rss); $i=0;?>
  <?php foreach ($rss as $rs):?>
    <li style="float:left;margin:10px 10px 0 0;padding:0 10px 0 0;width:200px;
        <?php if(++$i%2 == 0) echo 'border-right:0;margin-right:0;padding-right:0;'?>">
    
        <a href="<?php echo url_for('content/leaf1?type='.$type.'&route='.$rs['route'])?>">
            <?php echo image_tag($rs['cover'], array('class'=>'box-img', 'style'=>'width:200px;height:150px;'));?>
        </a>
        <br clear="all">
        
        <div style="margin:10px 0 0 0;text-align:center;border-bottom:1px dotted #CCCCCC;">
            <?php echo link_to($rs['title'], 'content/leaf1?type='.$type.'&route='.$rs['route'], array('class'=>'title','style'=>'margin:0;'));?>
            <br clear="all">
            <?php if($rs['intro']):?>
          		<div style="height:170px;overflow:hidden;" class="intro">
          		    <?php echo myTools::utf8_substr(striptags($rs['intro']), 0, 350)?>...
          		</div>
        		<?php endif;?>
    		    
    		    <span class="timestamp left"><?php echo time_ago($rs['created_at'])?></span>
    		    <?php echo link_to($rs['category_name'], 'content/branch2?type='.$type.'&last=1&catId='.$rs['category_id'], array('class'=>'category right', 'style'=>''));?>
    		    <br clear="all">
        </div>
    </li>
  <?php endforeach;?>
  <li></li>
</ul>
</div>


<!--not used-->
<?php //if(sizeof($rss) >= 2):?>
<!--<script type="text/javascript">
    $('.flexslider').flexslider({
      animation: "slide",
      animationLoop: false,
      itemWidth: 165,
      directionNav: true,
      controlNav:false,
      prevText:"",
      nextText:"",
      startAt:0
    });
</script>-->
<?php //endif?>