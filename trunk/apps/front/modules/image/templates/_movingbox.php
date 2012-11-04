<?php use_stylesheet('movingboxes.css') ?>
<?php use_javascript('movingboxes/movingboxes.min.js') ?>
<?php use_javascript('movingboxes/movingboxes.init.js') ?>

<?php $images = Doctrine::getTable('Image')->doFetchArray(array('objectType'=>$objectType, 'objectId'=>$objectId))?>

<div id="slider-two" class="align-center">
  <?php foreach ($images as $image):?>
    <div style="width:620px;height:600px;">
        <?php echo image_tag('/uploads/'.$image['folder'].'/'.$image['filename'], array('width'=>482, 'height'=>550))?>
        
        <p style="margin-left:10px;" class="subtitle"><?php echo $image['title']?></p>
        <p style="margin:0 0 10px 10px;" class="desc"><?php echo $image['description']?></p>
  
     </div>
  <?php endforeach;?>
</div>

<br clear="all">