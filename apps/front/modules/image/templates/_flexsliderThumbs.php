<?php $images = Doctrine::getTable('Image')->doFetchArray(array('objectType'=>$objectType, 'objectId'=>$objectId, 'limit'=>30))?>

<?php if(sizeof($images)):?>
    
    <!--<script defer src="http://flexslider.woothemes.com/js/jquery.flexslider.js"></script>-->
    <?php use_javascript('/addons/flexslider/jquery.flexslider-min.js');?>
    <?php use_stylesheet('/addons/flexslider/flexslider.css');?>
    
    
    <div id="slider" class="flexslider">
      <ul class="slides">
        <?php foreach ($images as $image):?>
          <?php if(file_exists(sfConfig::get('sf_upload_dir').'/'.$image['folder'].'/50q-'.$image['filename'])):?>
            <li><?php echo image_tag('/uploads/'.$image['folder'].'/50q-'.$image['filename'], array("style"=>"max-height:500px;max-width:500px;",'class'=>'border-radius-5'));?></li>
          <?php endif?>
        <?php endforeach;?>
      </ul>
    </div><!--slider-->
    
    
    <div id="carousel" class="flexslider">
      <ul class="slides">
        <?php foreach ($images as $image):?>
          <?php if(file_exists(sfConfig::get('sf_upload_dir').'/'.$image['folder'].'/50q-'.$image['filename'])):?>
            <li style="margin:10px 10px 10px 0;"><?php echo image_tag('/uploads/'.$image['folder'].'/50q-'.$image['filename'], array("style"=>"max-height:100px;width:120px;",'class'=>'border-radius-5'));?></li>
          <?php endif?>
        <?php endforeach;?>
      </ul>
    </div><!--carousel-->
    

    <script type="text/javascript">
    $(window).load(function(){
      $('#carousel').flexslider({
          animation: "slide",
          controlNav: false,
          animationLoop: false,
          slideshow: false,
          itemWidth: 120,          
          asNavFor: '#slider',
          prevText:"",
          nextText:"",
          slideshowSpeed:7000,
          animationSpeed:600,
      });
       
      $('#slider').flexslider({
          animation: "fade",
          controlNav: false,
          animationLoop: false,
          slideshow: false,
          sync: "#carousel",
          prevText:"",
          nextText:"",
          slideshowSpeed:1,
          animationSpeed:1,
      });
      
      
    });
    </script>

<?php endif?>