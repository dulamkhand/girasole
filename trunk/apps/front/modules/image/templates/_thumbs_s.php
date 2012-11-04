<?php $images = Doctrine::getTable('Image')->doFetchArray(array('objectType'=>$objectType, 'objectId'=>$objectId))?>

<?php foreach ($images as $image):?>
<div style="width:120px;height:180px;float:left;margin:0 10px 10px 0;overflow:hidden;">
  <?php echo image_tag('/uploads/'.$image['folder'].'/120t-'.$image['filename'], array('width'=>120))?>
</div>
<?php endforeach;?>

<br clear="all">