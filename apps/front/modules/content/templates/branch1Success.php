<div class="sideleft">
  <?php 
  $type = $sf_params->get('type');
  $cats = array();
  $rss = Doctrine::getTable('Category')->doFetchArray(array('parentId'=>"0",'type'=>$type, 'limit'=>4)); // $sf_params->get('type') = businesswoman | housewife | diva | teenage
  foreach ($rss as $rs) {
      $cats[$rs["position"]] = $rs;
  }
  
  ?>
 
  <div class="left" style="width:450px;margin:0;">
      <?php include_partial('content/featured', array('type'=>$type));?>
      <br clear="all">
      <br clear="all">
      <?php include_partial('partial/rek', array('position'=>'branch1-hor', 'width'=>450, 'limit'=>1));?>
	  
      <div class="left" style="width:450px;background:;border:0px solid red;position:relative;">
          <?php include_partial('content/branch1pos3', array('cats'=>$cats, 'type'=>$type));?>
      </div>
  </div><!--end of col-1-->
  
  <div class="right" style="width:320px;padding:0;margin:0 0 0 30px;">
      <?php include_partial('content/branch1pos2', array('cats'=>$cats, 'type'=>$type));?>
  </div><!--end of col-2-->
 
  <br clear="all">
  <?php include_partial('partial/rek', array('position'=>'branch1-hor', 'width'=>800, 'limit'=>1));?>
  
  <div style="border:1px solid #ccc;padding:10px;">
    <div class="left" style="width:375px;margin:0 10px 0 0;padding:0 10px 0 0;border-right:1px dotted #ccc;">
        <?php include_partial('content/branch1pos4', array('cats'=>$cats, 'type'=>$type));?>
    </div>
   
    <div class="left" style="width:375px;margin:0;padding:0;">
        <?php include_partial('content/branch1pos5', array('cats'=>$cats, 'type'=>$type));?>
    </div>
    <br clear="all">
  </div>

</div> <!--sideleft-->


<div class="sideright">

  <?php include_partial('partial/rek', array('position'=>'branch1-right', 'width'=>170, 'limit'=>1));?>  
  
  <?php echo image_tag("http://urin-essence.com/girasole/uploads/rek2013/2.png", array('width'=>170, 'style'=>'margin:10px 0;'))?>  
  
  <?php $rs = Doctrine::getTable('Poll')->doFetchOne(array('isActive'=>'1','isFeatured'=>'0'))?>
  <?php if($rs) include_partial('poll/form', array('rs'=>$rs, 'width'=>141, 'title'=>'font-size:23px;line-height:30px;'));?>
  
  <?php include_partial('partial/quote', array('width'=>170));?>
</div><!--sideright-->


<br clear="all">
<?php include_partial('partial/rek', array('position'=>'footer-up', 'width'=>1000, 'limit'=>1));?>

<br clear="all">
<?php include_partial('content/popular', array('type'=>$type));?>