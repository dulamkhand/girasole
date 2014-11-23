<div class="left" style="width:670px;text-align:left;margin:0;padding:0;">

    <!-- breadcump -->
    <div style="margin:0 0 15px 0;">
        <?php echo link_to(myTools::getValueByKey("catTypesMn", $type), 'content/branch1?type='.$type, array('class'=>'category', 'style'=>'display:inline;font-size:16px;'));?>
        <span style='font-size:22px;padding:0 7px;'>&raquo;</span>
        <?php if($last):?>
            <?php echo link_to($category->getParentName(), 'content/branch2?type='.$type.'&catId='.$category->getParentId(), array('class'=>'category', 'style'=>'display:inline;font-size:16px;'));?>
            <span style='font-size:22px;padding:0 7px;'>&raquo;</span>
        <?php endif?>
        <span class="title-branch2"><?php echo $category?></span>
    </div>
    
    <?php include_partial('partial/rek', array('position'=>'branch1-hor', 'width'=>670, 'limit'=>1));?>

    <!-- contents -->
    <ul class="none">
        <?php foreach ($pager->getResults() as $content):?>
            <li style="padding:30px 0;background:url(<?php echo sfConfig::get('app_host')?>/images/dotted_line.gif) repeat-x;border-right:1px solid #ccc;">
                <div class="left" style="width:280px;">
                    <?php echo link_to(image_tag($content->getCover(), array('style'=>'max-width:280px;max-height:210px;border:3px solid green;','class'=>'')), 'content/leaf1?type='.$type.'&route='.$content->getRoute(), array());?>
                </div>
                  
                <div class="left" style="width:335px;margin:-10px 0 0 30px;">
                    <?php echo link_to($content->getCategoryName(), 'content/branch2?type='.$type.'&last=1&catId='.$content->getCategoryId(), array('class'=>'category', 'style'=>''));?>
                    <span class="timestamp right"><?php echo time_ago($content->getCreatedAt())?></span>
                    
                    <br clear="all">
                    
                    <?php echo link_to($content->getTitle(), 'content/leaf1?type='.$type.'&route='.$content->getRoute(), array('class'=>'title','style'=>'margin:0 0 5px 0;display:block;', 'title'=>$content->getTitle()));?>
                    
                    <div class="intro">
                		    <?php echo myTools::utf8_substr(striptags($content->getIntro()), 0, 300)?>...
                  	</div>
        
          	        <a href="<?php echo url_for('content/leaf1?type='.$type.'&route='.$content->getRoute())?>" class="more" style="margin:13px 0 0 0;display:block;">Дэлгэрэнгүй &raquo;</a>  	        
                </div>
                <br clear="all">
            </li>
        <?php endforeach;?>
            
        <!--<li>
          <?php //include_partial('partial/rek', array('position'=>'branch1-hor', 'width'=>670, 'limit'=>1));?>
        </li>-->
        
        <li style="background:url(/images/dotted_line.gif) repeat-x;padding:10px 0;">
          	<?php echo pager($pager, 'content/branch2?type='.$type.'&catId='.$category->getId().($last == 1 ? '&last=1' : ''))?>
          	<br clear="all">
        </li>
    </ul>
</div><!-- left -->

<div class="left" style="width:300px;padding:0;margin:0 0 0 30px;">
    <?php include_partial('partial/rek', array('position'=>'branch2-right', 'width'=>300, 'limit'=>1));?>    
    <div style="margin:0 0 10px 0;"></div>
    <?php //include_partial('partial/subscribe', array());?>
    <?php include_partial('content/branch2right', array('type'=>$type, 'category'=>$category));?>
    <br clear="all">

    <?php include_partial('partial/rek', array('position'=>'branch2-right', 'width'=>300, 'limit'=>1));?>
    
    <?php $rs = Doctrine::getTable('Poll')->doFetchOne(array('isActive'=>'1','isFeatured'=>'0'))?>
		<?php if($rs) include_partial('poll/form', array('rs'=>$rs, 'width'=>271));?>
	   
	  <?php include_partial('partial/quote', array('width'=>300));?>
</div>

<br clear="all">
<?php include_partial('partial/rek', array('position'=>'footer-up', 'width'=>1000, 'limit'=>1));?>

<br clear="all">
<?php include_partial('content/popular', array('type'=>$type));?>