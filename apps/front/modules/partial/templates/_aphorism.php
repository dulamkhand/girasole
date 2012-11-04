<?php $rs = Doctrine::getTable('Aphorism')->doFetchOne(array())?>
<div style="width:100%;color:#000;font-style:italic;">
  <span style="color:#FFF777;font-weight:bold;">"</span> <?php echo $rs['text']?> <span style="color:#FFF777;font-weight:bold;">"</span>
  <span class="right" style="color:#E94430;font-style:italic;font-weight:normal;"><?php echo $rs['source']?></span>
  <br clear="all">
</div>