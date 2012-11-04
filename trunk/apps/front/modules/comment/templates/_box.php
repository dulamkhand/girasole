<div id="comment<?php echo $rs['id']?>" style="border-bottom:1px dotted #ccc;width:280px;" class="comment-box">
  <div style="width:40px;float:left;padding:5px;">
    <?php echo image_tag('icons/1351323322_comment.png', array())?>
  </div>
  <div style="width:230px;font-size:11px;float:left;">
    <p class="link11" style="font-weight:bold;"><?php echo htmlspecialchars_decode($rs['name'])?></p>
    <?php echo htmlspecialchars_decode($rs['text'])?>
    <br clear="all">
    <p class="timestamp left"><?php echo time_ago($rs['created_at'])?></p>

    <?php if($sf_user->getAttribute('id') == $rs['user_id']):?>
      <a href="#comments" onclick="deleteComment(<?php echo $rs['id']?>);" class="right">
        <?php echo image_tag('icons/close-dark.png', array('border'=>0))?>
      </a>  
    <?php endif?>
  </div>
  <br clear="all">
</div>