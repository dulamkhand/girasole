<?php $host = sfConfig::get('app_host')?>
<?php $id = $content['id']?>

<!-- breadcump -->
<div style="margin:0 0 15px 0;">
    <?php echo link_to(myTools::getValueByKey("catTypesMn", $type), 'content/branch1?type='.$type, array('class'=>'category', 'style'=>'display:inline;font-size:16px;'));?>
    <span style='font-size:22px;padding:0 7px;'>&raquo;</span>

    <?php echo link_to('Зөв үйл хэргийг бид дэмжинэ', 'page/patriot', array('class'=>'category', 'style'=>'display:inline;font-size:16px;'));?>
</div>

<div class="left" style="width:650px;">
<div class="box-shadow" style="padding:20px 25px;">
    <div class="title-leaf" style="text-align:center;padding:10px 30px 10px 30px;">
        <?php echo $content['title']?>
    </div>
    
    <div class="timestamp align-center" style="margin:0 0 10px 0;">
  		<?php echo time_ago($content['created_at'])?>
    </div>
    
    <?php if($content['intro']):?>
        <div class="000" style="text-align:justify;margin:0 0 15px 0;">
            <?php echo striptags($content['intro'])?>
            <br clear="all">
        </div>
    <?php endif;?>
    
    <?php if($content['quiz_id']) include_partial("quiz/form", array('quizId'=>$content['quiz_id']));?>
    
    <?php if($content['body']):?>      
        <div style="text-align:justify;">
            <?php echo striptags($content['body'])?>
  		      <br clear="all">
        </div>
    <?php endif;?>
    
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
    	  <!--<a class="left" style="margin:0 0 0 20px;" href="<?php //echo url_for('content/print?id='.$id)?>" target="_blank"><?php //echo image_tag('icons/print.png', array('align'=>'absmiddle'))?></a>-->
    	  <a class="left" style="margin:0 0 0 20px;" href="#comments-title"><?php echo image_tag('icons/comment.png', array('align'=>'absmiddle'))?></a>
    	  <br clear="all">
    </div>
  
</div><!-- box-shadow -->

</div><!-- left -->

<div class="left" style="margin:0 0 0 20px;width:325px;">
    <?php include_partial('partial/rek', array('position'=>'leaf1-right', 'width'=>325, 'limit'=>1));?>
    
    <?php if(!$content['is_discuss']) include_partial('comment/index', array('objectType'=>'content','objectId'=>$content['id']));?>
    
</div>

<br clear="all">
