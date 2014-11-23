<div class="left box-shadow" style="background:url(<?php echo sfConfig::get('app_host').'/uploads/user/'.$user->getImage()?>) no-repeat 50% 50%;width:300px;height:400px;">
&nbsp;
</div>

<div class="left" style="width:668px;margin:0 0 0 30px;">
  <div class="title-branch"><?php echo $user->getFullname() ?></div>
  <p style="text-align:justify;"><?php echo $user->getAbout() ?></p>
  <br clear="all">
  
  <?php //echo image_tag('', array())?>
  <?php //echo image_tag('', array())?>
</div>

<br clear="all">
<br clear="all">

<div class="title-branch"><?php echo $user->getFirstname() ?>-н нийтлэлүүд</div>
<hr style="border:3px solid green;">

<?php include_partial('user/contents', array('authorId'=>$user->getId()));?>