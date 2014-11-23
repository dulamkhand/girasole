<?php $rss = $limit > 1 ?
          Doctrine::getTable('Banner')->doFetchArray(array('position'=>$position,'active'=>1,'limit'=>(isset($limit) ? $limit : 1)))
          : array();
?>

<?php if(sizeof($rss)) :?>
    <?php foreach ($rss as $rs):?>
      <!--TODO: find with from position-->
      <div id="rek<?php echo $rs['id']?>" style="background:#fff;margin-top:15px;">
        <p style="font-size:11px;color:#ccc;text-align:right;">Сурталчилгаа 
          	<a onclick="$('#rek<?php echo $rs['id']?>').slideUp('slow');" class="right" style="margin:8px 0 0 0"><?php echo image_tag('icons/close-gray.png', array())?></a>
        </p>
        <a href="<?php echo $rs['link'] ? $rs['link'] : '#'?>" target="_blank">
          	<?php echo image_tag('/uploads/rek/'.$rs['path'], array('width'=>(isset($width) ? $width : 300)))?>
        </a>
      </div>
    <?php endforeach?>
<?php else:?>
    <div style="width:<?php echo $width?>px;background:#ededed;margin:10px 0;padding:20px 0;">
        <marquee scrollamount="1"><h2 class="category" style="text-align:center;color:#aaa;">Сурталчилгаа</h2></marquee>
    </div>
<?php endif?>