<?php $id = $content['id']?>

<br clear="all">
<div style="width:600px;margin:0 auto;padding:25px;">
	<a href="<?php echo url_for('@homepage')?>" class="left"><?php echo image_tag('lady.png', array('style'=>'margin:0 0 15px 135px;'))?></a>

	<br clear="all">
  <div class="title-leaf" style="text-align:center;padding:10px 30px 10px 30px;">
    <?php echo $content['title']?>
  </div>
  
  <div class="timestamp align-center" style="margin:0 0 10px 0;">
		<?php echo time_ago($content['created_at'])?>
		<?php if($content->getAuthorShow()):?>
    		&nbsp; | &nbsp;
    		нийтэлсэн
    		<?php echo $content->getAuthor()?>
    		&nbsp; | &nbsp;
    		зургийг
    		<?php echo $content->getPhotographer()?>
		<?php endif?>
  </div>
  
  <?php //echo image_tag($content['cover'], array('style'=>'max-width:600px;'))?>
  
  <?php if($content['intro']):?>
      <div class="000" style="text-align:justify;margin:0 0 15px 0;">
          <?php echo striptags($content['intro'])?>
          <br clear="all">
      </div>
  <?php endif;?>
  
  <?php echo include_partial('image/flexslider', array('objectType'=>'content', 'objectId'=>$content['id']));?>
  
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

  <br clear="all">

</div>
