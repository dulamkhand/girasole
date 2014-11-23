<?php $images = Doctrine::getTable('Image')->doFetchArray(array('objectType'=>$objectType, 'objectId'=>$objectId, 'limit'=>30))?>
<?php if(sizeof($images)):?>
    
    <!--<script defer src="http://flexslider.woothemes.com/js/jquery.flexslider.js"></script>-->
    <?php use_javascript('/addons/flexslider/jquery.flexslider-min.js');?>
    <?php use_stylesheet('/addons/flexslider/flexsliderLeaf1.css');?>
    
    
    <div id="slider" class="flexslider">
      <ul class="slides">
        <?php $i = 1; $size = sizeof($images)?>
        <?php foreach ($images as $image):?>
          <?php //echo sfConfig::get('sf_upload_dir').'/'.$image['folder'].'/'.$image['filename']?>
          <?php if(file_exists(sfConfig::get('sf_upload_dir').'/'.$image['folder'].'/'.$image['filename'])):?>
            <?php //$dim = getimagesize(sfConfig::get('sf_upload_dir').'/'.$image['folder'].'/'.$image['filename'])?>            
            <li style="border:0px solid #ccc;">
                <div style="height:<?php echo 450?>px;overflow:hidden;width:600px;">
                    <?php echo image_tag('/uploads/'.$image['folder'].'/'.$image['filename'], array("style"=>"max-width:600px;border:0px;",'class'=>'border-radius-5'));?>
                </div>

                <div style="border:1px solid #e8e8e8;border-top:0;border-bottom:0;text-align:justify;padding:0 30px;">
                    <?php if($image['title']):?>
                        <br clear="all">
                        <br clear="all">
                        <div class="title" style="text-align:center;margin:0 0 5px 0;"><?php echo stripalltags($image['title'])?></div>
                        <?php if(!$image['description']):?>
                            <br clear="all">
                        <?php endif?>
                    <?php endif?>
                    
                    <?php if($image['description']):?>
                        <?php if(!$image['title']):?>
                            <br clear="all">
                            <br clear="all">
                        <?php endif?>
                        
                        <?php echo striptags($image['description'])?>
                        <br clear="all">
                        <br clear="all">
                    <?php endif?>
                </div>
                <div class="box-shadow-img"></div>
            </li>
          <?php endif?>
        <?php endforeach;?>
      </ul>
    </div><!--slider-->

    <script type="text/javascript">
    $(window).load(function(){
      $('#slider').flexslider({
          animation: "fade",     
          prevText:"",
          nextText:"",
          slideshowSpeed:15000,
          animationSpeed:500,
      });
      
    });
    </script>

<?php endif?>