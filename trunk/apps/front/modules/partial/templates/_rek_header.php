<?php $rss = Doctrine::getTable('Banner')->doFetchArray(array('position'=>'header','active'=>1))?>
<?php foreach ($rss as $rs):?>
  <div id="rek<?php echo $rs['id']?>" style="margin:10px 0 15px 0;height:65px;width:950px;overflow:hidden;position:relative;z-index:0;">
    <p style="font-size:11px;color:#fff;top:0;right:0;position:absolute;z-index:1;">Сурталчилгаа 
      <a href="#" onclick="$('#rek<?php echo $rs['id']?>').slideUp('slow');" class="right" style="margin:5px 0 0 0"><?php echo image_tag('icons/close-gray.png', array())?></a>
    </p>
    <a href="<?php echo $rs['link'] ? $rs['link'] : '#'?>" target="_blank">
      <?php echo image_tag('/uploads/rek/'.$rs['path'], array('width'=>950))?>
    </a>
  </div>
<?php endforeach?>