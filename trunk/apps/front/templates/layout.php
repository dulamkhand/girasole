<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  
  <?php $host = sfConfig::get('app_host')?>
  <link rel="shortcut icon" href="<?php echo $host?>/favicon.ico" />
  
  <!--
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  -->

  <!-- JQUIRY -->
  <script src="<?php echo $host?>/js/jquery.min.js"></script>  
  
  <!--JQUERY UI-->
  <script src="<?php echo $host?>/js/jquery-ui.js"></script>
  <link rel="stylesheet" href="<?php echo $host?>/css/jquery-ui.css" />

  <!--FLEXSLIDER-->
  <?php use_javascript('/addons/flexslider/jquery.flexslider-min.js');?>
   
  <!-- FONTS -->
  <?php use_stylesheet('/addons/fonts/open-sans.css') ?>
  <?php use_stylesheet('/addons/fonts/roboto.css') ?>  
  
  <!-- FANCYBOX -->
  <?php use_javascript('/addons/fancybox/jquery.fancybox.pack.js');?>
  <?php use_stylesheet('/addons/fancybox/jquery.fancybox.css');?>
  
	<?php include_stylesheets() ?>
  <?php include_javascripts() ?>
  
  
  <script type="text/javascript">
    /*disable rightclick*/
    $(document).bind("contextmenu", function(e) {
      alert('Та Дагина онлайн сэтгүүлийн админтай холбогдож зөвшөөрөл авна уу.');
      e.preventDefault();
    });
  </script>
  
</head>
<body>

  <!--categories data-->
  <?php $cats = Doctrine::getTable('Category')->doFetchArray(array('parentId'=>"0", 'limit'=>20));?>
  <?php $subcats = Doctrine::getTable('Category')->doFetchArray(array('parentIdO'=>"0", 'limit'=>100));?>

  <?php include_partial("global/header", array('cats'=>$cats, 'subcats'=>$subcats));?>

  <div class="wrapper">

      <?php //include_partial('partial/rek', array('position'=>'header', 'width'=>1000, 'limit'=>1));?>
      
      <!--flash message-->
      <?php if ($sf_user->hasFlash('flash')): ?>
          <div class="flash"><?php echo $sf_user->getFlash('flash')?></div>
      <?php endif; ?>
         
      <?php echo $sf_content ?>    
    
  </div><!--wrapper-->
  
  <br clear="all">  
  <?php include_partial("global/footer", array('cats'=>$cats, 'subcats'=>$subcats));?>  

</body>
</html>
