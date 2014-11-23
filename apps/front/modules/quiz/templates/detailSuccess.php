<?php $host = sfConfig::get('app_host')?>

<div class="left" style="width:650px;">
<div class="box-shadow" style="padding:10px 25px;">

<div class="title-leaf" style="text-align:center;padding:10px 30px 10px 30px;">
    <?php echo $rs['title']?>
</div>
  
<div class="timestamp align-center" style="margin:0 0 10px 0;">
		<?php echo time_ago($rs['created_at'])?>
</div>
  
<div class="000" style="text-align:justify;">
		<?php echo $rs['body']?>
</div>

<?php include_partial("quiz/form", array('quizId'=>$rs['id']));?>


<!--share -->
<?php include_partial('partial/share', array('url'=>$host."/quiz/detail?route={$rs['route']}",
                      'via'=>sfConfig::get('app_webname'), 'text'=>$rs['title']));?>

<br clear="all">

</div><!-- box-shadow -->
</div><!-- left -->

<br clear="all">
<br clear="all">
<?php include_partial('content/popular', array());?>