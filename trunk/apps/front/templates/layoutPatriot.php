<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  
  <?php $host = sfConfig::get('app_host')?>
  <link rel="shortcut icon" href="<?php echo $host?>/favicon.ico" />

  <!-- JQUIRY -->
  <script src="<?php echo $host?>/js/jquery.min.js"></script>  
  
  <!-- FONTS -->
  <?php use_stylesheet('/addons/fonts/open-sans.css') ?>
  <?php use_stylesheet('/addons/fonts/roboto.css') ?>  
  
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

      <!--flash message-->
      <?php if ($sf_user->hasFlash('flash')): ?>
          <div class="flash"><?php echo $sf_user->getFlash('flash')?></div>
      <?php endif; ?>
         
      <?php echo $sf_content ?>    
    
  </div><!--wrapper-->
  
  <br clear="all">  
  <div id="footer">
      <div class="wrapper gothic" style="padding:15px 0 15px 0;">
          Дагина Онлайн Сэтгүүл, зохиогчийн эрх хуулиар хамгаалагдсан ©2013 - 2015<br>
      </div>
  </div>

</body>
</html>
