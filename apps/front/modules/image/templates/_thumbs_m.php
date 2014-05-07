<?php $images = Doctrine::getTable('Image')->doFetchArray(array('objectType'=>$objectType, 'objectId'=>$objectId, 'limit'=>30))?>

<?php foreach ($images as $image):?>
<div style="width:310px;height:550px;float:left;margin:0 10px 10px 0;overflow:hidden;">
  <?php echo image_tag('/uploads/'.$image['folder'].'/310t-'.$image['filename'], array('width'=>310))?>
  <p style="margin-left:10px;" class="subtitle"><?php echo $image['title']?></p>
  <p style="margin:0 0 10px 10px;" class="desc"><?php echo $image['description']?></p>
</div>
<?php endforeach;?>

<br clear="all">