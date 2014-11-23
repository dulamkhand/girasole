<?php if($rs->getIsActive()==1):?>
  <a href="<?php echo url_for($module.'/activate?id='.$rs->getId().'&cmd=0') ?>" class="action">Deactivate</a>
<?php else:?>
  <a href="<?php echo url_for($module.'/activate?id='.$rs->getId().'&cmd=1') ?>" class="action">Activate</a>
<?php endif;?>
<br clear="all">