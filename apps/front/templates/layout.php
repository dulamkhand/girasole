<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <link rel="shortcut icon" href="/images/bg-li-banner.png" />
  <?php include_stylesheets() ?>
  <?php include_javascripts() ?>
  

  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <?php //use_javascript('jquery-latest.js') ?>
  
  <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
  <?php //use_javascript('jquery-ui-1.8.18.min.js') ?>

  <!--cufon-->
  <script type="text/javascript" src="http://cufon.shoqolate.com/js/cufon-yui.js?v=1.09i"></script>
  <?php //use_javascript('cufon-yui.js') ?>
  <?php use_javascript('Tahoma_400.font.js') ?>
  <script type="text/javascript">
		Cufon.replace('h1');
		Cufon.replace('h2');
		Cufon.replace('ul#mainmenu li a', {letterSpacing:'-1px', fontSize:'18px', color: 'white', fontStyle:'italic', hover: {color:'#FFE102'}});	
  </script>

	<!--css-->
  <?php use_stylesheet('all.css') ?>  
  <?php use_stylesheet('sidebar.css') ?>
  <?php use_stylesheet('custom-theme/jquery-ui-1.8.18.custom.css') ?>
  
	<?php include_stylesheets() ?>
  <?php include_javascripts() ?>

</head>
<body>
  
  <?php include_partial("global/header", array());?>

  <div class="wrapper" style="background:-moz-linear-gradient(center top,#F7B2AA,#fff);">

    <?php include_partial('partial/rek_header', array('position'=>'header'));?>
    
    <!--flash message-->
    <?php if ($sf_user->hasFlash('flash')): ?>
      <div class="flash"><?php echo $sf_user->getFlash('flash')?></div>
    <?php endif; ?>    
         
    <?php echo $sf_content ?>    

  </div><!--wrapper-->
  
  <br clear="all">
  
  <?php //include_partial('main/popular', array());?>
  
  <?php //include_partial("global/footer", array());?>

</body>
</html>