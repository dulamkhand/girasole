<?php $photos = Doctrine::getTable('Gallery')->findByPageId($page_id)?>

<?php if(sizeof($photos)):?>    
    <h2><?php echo __('Gallery')?></h2>
    <div class="right-gallery" style="width:100%;margin-bottom:20px;">
        <div class="carousel-images">
          <ul class="carousel" style="height:100%;width:100%;">
            <?php foreach ($photos as $photo): ?>
              <li class="item0" style="margin:5px 5px 0 0;height:72px;overflow:hidden;">
                 <a title="<?php echo $photo?>" rel="lightbox[]" href="<?php echo 'http://'.$sf_request->getHost().'/uploads/gallery/'.$photo->getPath()?>" class="zoomer"></a>
                 <?php echo image_tag('/uploads/gallery/'.$photo->getFullPath(170), array('alt'=>$photo, 'title'=>$photo))?>
              </li>
            <?php endforeach; ?>
          </ul>
        </div>
    </div><!--right-gallery-->
<?php endif;?>