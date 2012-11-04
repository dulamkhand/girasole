<div style="border:0;border-top:2px dotted #ccc;margin:7px 0;"></div>
<?php include_partial('partial/share', array('id'=>$content->getId()));?>
<p class="right source"><?php if($content->getSource()) echo link_to($content->getSource(), $content->getSource(), array('target'=>'new', 'class'=>'source'))?></p>
<br clear="all">
<div style="border:0;border-top:2px dotted #ccc;margin:7px 0;"></div>