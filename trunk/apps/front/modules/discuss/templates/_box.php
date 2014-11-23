<div id="discuss<?php echo $rs['id']?>" style="border-top:1px dotted #cecece;padding:10px 0 15px 0;width:600px;line-height:20px;text-align:justify;" class="discuss-box font14">
  
    <span class="timestamp right" style="line-height:20px;"><?php echo time_ago($rs['created_at'])?></span>
    
    <span class="green" style="line-height:20px;"><?php echo htmlspecialchars_decode($rs['name'])?>:</span>
    <?php echo htmlspecialchars_decode(blurBadWords($rs['text']))?>
    
    <?php if($sf_user->getAttribute('id') == $rs['user_id']):?>
    	 <a href="#discusss" onclick="deleteDiscuss(<?php echo $rs['id']?>);" class="right">
      	  <?php echo image_tag('icons/close-dark.png', array('border'=>0))?>
    	 </a>
    <?php endif?>

    <br clear="all">
</div>