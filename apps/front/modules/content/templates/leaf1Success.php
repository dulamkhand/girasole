<?php $host = sfConfig::get('app_host')?>
<?php $id = $content['id']?>

<?php if($content['ask18']) include_partial("partial/ask18", array('content'=>$content));?>

<!-- breadcump -->
<div style="margin:0 0 15px 0;">
    <?php echo link_to(myTools::getValueByKey("catTypesMn", $type), 'content/branch1?type='.$type, array('class'=>'category', 'style'=>'display:inline;font-size:16px;'));?>
    <span style='font-size:22px;padding:0 7px;'>&raquo;</span>
    
    <?php echo link_to($content->getParentCategoryName(), 'content/branch2?type='.$type.'&catId='.$content->getParentCategoryId(), array('class'=>'category', 'style'=>'display:inline;font-size:16px;'));?>
    <span style='font-size:22px;padding:0 7px;'>&raquo;</span>

    <?php echo link_to($content->getCategoryName(), 'content/branch2?type='.$type.'&last=1&catId='.$content->getCategoryId(), array('class'=>'category', 'style'=>'display:inline;font-size:16px;'));?>
</div>


<div class="left" style="width:650px;">
<div class="box-shadow" style="padding:20px 25px;">
    <?php 
    if($content->getAuthorShow() && $content->getAuthorId()) {
  		$user = Doctrine::getTable('User')->doFetchOne(array('id'=>$content->getAuthorId()));
  		if($user){?>
  		    <a href="#<?php echo url_for('user/profile?username='.$user['username'])?>" style="position:absolute;top:-5px;left:-5px;z-index:1;width:150px;display:block;">
      		    <?php echo image_tag('/uploads/user/100t-'.$user['avator'], array('class'=>'border-radius-20','width'=>40, 'style'=>'position:absolute;top:0;left:0;'));?>
      		    <span style="text-transform:uppercase;line-height:48px;position:absolute;top:0;right:0;"><?php echo $user['fullname'];?></span> &nbsp;
  		    </a>
  		<?php }
    }?>
    
    <?php 
    if($content->getPhotographerShow() && $content->getPhotographerId()) {
  		$user = Doctrine::getTable('User')->doFetchOne(array('id'=>$content->getPhotographerId()));
  		if($user){?>
  		    <a href="#<?php echo url_for('user/profile?username='.$user['username'])?>" style="position:absolute;top:-5px;right:-5px;z-index:1;width:150px;display:block;">
  		        <span style="text-transform:uppercase;line-height:48px;position:absolute;top:0;left:0;"><?php echo $user['fullname'];?></span> &nbsp; 
      		    <?php echo image_tag('/uploads/user/100t-'.$user['avator'], array('class'=>'border-radius-20','width'=>40, 'style'=>'position:absolute;top:0;right:0;'));?>
  		    </a>
  		<?php }
    }?>
    
    <div class="title-leaf" style="text-align:center;padding:10px 30px 10px 30px;">
        <?php echo $content['title']?>
    </div>
    
    <div class="timestamp align-center" style="margin:0 0 10px 0;">
  		<?php echo time_ago($content['created_at'])?>
    </div>
    
    <?php //echo image_tag($content['cover'], array('style'=>'max-width:600px;'))?>
    
    <?php if($content['intro']):?>
        <div class="000" style="text-align:justify;margin:0 0 15px 0;">
            <?php echo striptags($content['intro'])?>
            <br clear="all">
        </div>
    <?php endif;?>
    
    <!--image slider-->
    <?php echo include_partial('image/flexslider', array('objectType'=>'content', 'objectId'=>$content['id']));?>
    
    <?php if($content['quiz_id']) include_partial("quiz/form", array('quizId'=>$content['quiz_id']));?>
    
    <!--body-->
    <?php if($content['body']):?>      
        <div style="text-align:justify;">
            <?php echo striptags($content['body'])?>
  		      <br clear="all">
        </div>
    <?php endif;?>
    
    <!-- coupon -->
    <?php if($content['coupon_id']) {
    		$rs = GlobalTable::doFetchOne('Coupon', array('id'=>$content['coupon_id']));
    		include_partial("partial/coupon", array('rs'=>$rs));
    }?>
    
    <?php if($content['source']):?>
        <div class="em gray right">Эх сурвалж: <?php echo $content['source']?></div>
        <br clear="all">
    <?php endif?>
    
    <!--discuss-->
    <?php if($content['is_discuss']) include_partial('discuss/index', array('objectType'=>'content','objectId'=>$content['id']));?>
    
    <br clear="all">
    <?php echo image_tag('hr_gray_double.png', array('style'=>'margin:10px 0 25px 0;'))?>
    <br clear="all">
  
    <!--share -->
    <div>
        <?php include_partial('partial/share', array('url'=>$host."/content/leaf1?type={$type}&route={$content['route']}",
                                       'via'=>sfConfig::get('app_webname'), 'text'=>$content['title']));?>
    	  <!--<a class="left" style="margin:0 0 0 20px;" href="<?php //echo url_for('content/print?route='.$content['route'])?>" target="_blank"><?php //echo image_tag('icons/print.png', array('align'=>'absmiddle'))?></a>-->
    	  <a class="left" style="margin:0 0 0 20px;" href="#comments-title"><?php echo image_tag('icons/comment.png', array('align'=>'absmiddle'))?></a>
    	  <br clear="all">
    </div>
  
</div><!-- box-shadow -->

<br clear="all">
<?php //include_partial('partial/rek', array('position'=>'leaf1-hor', 'width'=>650, 'limit'=>1));?>

</div><!-- left -->

<div class="left" style="margin:0 0 0 20px;width:325px;">
    <?php include_partial('partial/rek', array('position'=>'leaf1-right', 'width'=>325, 'limit'=>1));?>
    
    <?php if(!$content['is_discuss']) include_partial('comment/index', array('objectType'=>'content','objectId'=>$content['id']));?>
    
    <?php include_partial('content/leaf1right', array('categoryId'=>$content['category_id'],'content'=>$content));?>
    
    <?php include_partial('partial/rek', array('position'=>'leaf1-right', 'width'=>325, 'limit'=>1));?>
    <br clear="all">

    <?php include_partial('partial/quote', array('width'=>325));?>
</div>


<br clear="all">
<?php include_partial('partial/rek', array('position'=>'footer-up', 'width'=>1000, 'limit'=>1));?>

<br clear="all">
<?php include_partial('content/popular', array('type'=>$type));?>
