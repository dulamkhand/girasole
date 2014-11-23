<?php use_stylesheet('/addons/flexslider/featuredHome.css');?>
<?php $host = sfConfig::get('app_host')?>

<?php $rss = Doctrine::getTable('Content')->doFetchArray(array('isFeaturedHome'=>'1', 'orderBy'=>'updated_at DESC, category_id ASC', 'limit'=>4))?>
<div class="featured box-shadow left">
  <ul class="slides">
    <?php foreach ($rss as $rs):?>
      <?php $uri = url_for('content/leaf1?type='.$rs['type'].'&route='.$rs['route'])?>
      <li style="position:relative;">
          <?php echo image_tag($rs['cover'], array("style"=>"",'class'=>''));?>
          
          <div style="position:absolute;left:10px;bottom:10px;width:420px;height:110px;background:none repeat scroll 0 0 rgba(255, 255, 255, 0.8);
                      box-shadow:1px 1px 5px rgba(0, 0, 0, 0.4);padding:10px;text-align:center;">
              <a href="<?php echo $uri?>" class="title" style="display:block;margin-bottom:5px;text-align:center;font-weight:bold;">
                  <?php echo $rs['title']?>
              </a>
              <hr style="background:#000;height:1px;">
              <div style="text-align:center;color:#000;" class="intro">
                  <?php echo myTools::utf8_substr(striptags($rs['intro']), 0, 200)?> ...
              </div>
              <?php echo link_to($rs['category_name'], 'content/branch2?type='.$rs['type'].'&last=1&catId='.$rs['category_id'], array('class'=>'category', 'style'=>'position:absolute;bottom:0;left:10px;'));?>
              
              <a href="<?php echo $uri?>" style="position:absolute;bottom:0;right:10px;color:#000;" class="right more">Дэлгэрэнгүй &raquo;</a>
          </div>
      </li>
    <?php endforeach;?>
  </ul>
</div>


<script type="text/javascript">
$('.featured').flexslider({
    animation: "slide",
    animationLoop: false,
    directionNav: true,
    controlNav: false,
    prevText:"",
    nextText:"",
    startAt:0
}); 
</script>
