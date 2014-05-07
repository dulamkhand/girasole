<?php $images = Doctrine::getTable('Image')->doFetchArray(array('objectType'=>$objectType, 'objectId'=>$objectId, 'limit'=>30))?>

<?php foreach ($images as $image):?>
  <?php echo image_tag('/uploads/'.$image['folder'].'/'.$image['filename'], array())?>
  <p class="subtitle"><?php echo $image['title']?></p>
  <p class="desc"><?php echo $image['description']?></p>
  <br clear="all">
<?php endforeach;?>

<br clear="all">