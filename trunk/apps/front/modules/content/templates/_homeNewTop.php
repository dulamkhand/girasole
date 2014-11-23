<div id="tabs-home" class="" style="padding:0;border:0;">

<ul style="padding:0;background:#fff;">
    <li style="border:1px solid #ccc;border-bottom:3px solid #ccc;border-top:1px solid #000;margin:0;"><a href="#tab-new" class="title font20">Шинээр нэмэгдсэн</a></li>
    <li style="border:1px solid #ccc;border-bottom:3px solid #ccc;border-left:0;border-top:1px solid #000;margin:0;"><a href="#tab-top"  class="title  font20">Шилдэг нийтлэл</a></li>
</ul>

<div id="tab-new" style="padding:0;">
    <ul style="margin:0;padding:0 5px 0 10px;border-bottom:1px solid #ccc;height:603px;width:358px;overflow-y:scroll;" class="none home-flow-nohover">
        <?php $contents = Doctrine::getTable('Content')->doFetchArray(array('orderBy'=>'updated_at DESC', 
                                                                              'limit'=>10));
            include_partial('content/li', array('contents'=>$contents));
        ?>
  </ul>
</div><!--tab-new-->

<div id="tab-top" style="padding:0;">
  <ul style="margin:0;padding:0 5px 0 10px;border-bottom:1px solid #ccc;height:603px;width:358px;overflow-y:scroll;" class="none home-flow-nohover">
      <?php $contents = Doctrine::getTable('Content')->doFetchArray(array(
                                                                        'isTop'=>'1', 
                                                                        'orderBy'=>'updated_at DESC',
                                                                        'limit'=>10));
            include_partial('content/li', array('contents'=>$contents));
      ?>
  </ul>
</div><!--tab-top-->

</div>


<script type="text/javascript">
$(function() {
    $("#tabs-home").tabs();
});
</script>

