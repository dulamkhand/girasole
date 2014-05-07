<div id="comment<?php echo $rs['id']?>" style="border-bottom:1px dotted #cecece;padding:5px 0;" class="comment-box">

  <?php echo image_tag('/uploads/user/48-browser-girl-firefox-icon.png', array('class'=>'border-radius-5', 'style'=>'width:48px;float:left;padding:0 7px 0 0;'))?>
  
  <div class="left font14" style="width:270px;line-height:20px;">
      <span class="timestamp right font10" style="line-height:20px;"><?php echo time_ago($rs['created_at'])?></span>
      
      <span class="green" style="line-height:20px;"><?php echo htmlspecialchars_decode($rs['name'])?>:</span>
      <?php echo htmlspecialchars_decode(blurBadWords($rs['text']))?>
  
      <?php if($sf_user->getAttribute('id') == $rs['user_id']):?>
      	<a href="#comments" onclick="deleteComment(<?php echo $rs['id']?>);" class="right">
        	<?php echo image_tag('icons/close-dark.png', array('border'=>0))?>
      	</a>
      <?php endif?>
    <br clear="all">
  </div>

  <br clear="all">
</div>
