<div class="sideleft">

<div class="list1">
<?php $i=0;?>
<?php foreach ($rss as $rs):?>
  <div class="entry-box <?php if($i++==0) echo 'hover'?>">
      <a href="<?php echo url_for('main/detail?id='.$rs['id'])?>">
        <?php echo image_tag('/uploads/'.$rs['cover'], array('width'=>600))?>
      </a>
      <br clear="all">
      <a class="title left" href="<?php echo url_for('main/detail?id='.$rs['id'])?>"><?php echo $rs['title']?></a>
      <br clear="all">
      
      <?php include_partial('partial/share', array('id'=>$rs['id']));?>
      
      <p class="right"><a class="category" href="<?php echo url_for('main/list?listtype=list1&categoryId='.$rs['category_id'])?>"><?php echo $rs['category_name']?></a></p>
      <p class="timestamp right" style="margin-right:5px;color:#333;"><?php echo $rs['created_at']?></p>
      
      <br clear="all">
  </div>
<?php endforeach?>
</div>

</div><!--sideleft-->


<div class="sideright">
  <?php include_partial('partial/sideright', array());?>
</div><!--sideright-->