<!--TODO: start & end date check-->
<!--url field nemex esex?-->
<?php $rss = Doctrine::getTable('Banner')->doFetchArray(array('position'=>'sideright','active'=>1))?>
<?php foreach ($rss as $rs):?>
  <div id="rek<?php echo $rs['id']?>" style="float:left;height:380px;overflow:hidden;background:#fff;margin-top:15px;">
    <p style="font-size:11px;color:#ccc;text-align:right;">Сурталчилгаа 
      <a href="#" onclick="$('#rek<?php echo $rs['id']?>').slideUp('slow');" class="right" style="margin:5px 0 0 0"><?php echo image_tag('icons/close-gray.png', array())?></a>
    </p>
    <a href="<?php echo $rs['link'] ? $rs['link'] : '#'?>" target="_blank">
      <?php echo image_tag('/uploads/rek/'.$rs['path'], array('width'=>300))?>
    </a>
  </div>
<?php endforeach?>