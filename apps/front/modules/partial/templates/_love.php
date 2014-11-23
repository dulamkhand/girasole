<!--TODO: login/register popup-->
<span  class="left" style="margin:-8px 0 0 19px;">
    <a <?php echo $sf_user->isAuthenticated() ? "onclick='love(".$objectId.", \"".$objectType."\");'" : "href='".url_for('user/login')."'"?> style="cursor:pointer;">
    		<?php echo image_tag('love16-black.png', array('align'=>'absmiddle','id'=>'love-img-'.$objectType.'-'.$objectId));?>
    </a>
    <span id="love-count-<?php echo $objectType.'-'.$objectId?>" class="font15"><?php echo $nbLove?></span>
</span>