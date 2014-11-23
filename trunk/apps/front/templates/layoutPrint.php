<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <link rel="shortcut icon" href="/images/bg-li-banner.png" />
  <?php $host = sfConfig::get('app_host')?>

  
  <!-- JQUIRY, UI -->
  <!--
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
  -->
  <script src="<?php echo $host?>/js/jquery.min.js"></script>  
  <script src="<?php echo $host?>/js/jquery-ui.js"></script>
  <link rel="stylesheet" href="<?php echo $host?>/css/jquery-ui.css" />
  
   
  <!-- FONTS -->
  <?php use_stylesheet('/addons/fonts/open-sans.css') ?>
  <?php use_stylesheet('/addons/fonts/roboto.css') ?>  
  
  <?php use_javascript('/addons/flexslider/jquery.flexslider-min.js');?>
  <!--<script src="<?php echo $host?>/js/jquery-select-disabler.js"></script>-->
  
	<?php include_stylesheets() ?>
  <?php include_javascripts() ?>

</head>
<body>

  <div class="wrapper">

    <?php echo $sf_content ?>

    <br clear="all">
    
  </div><!--wrapper-->
  
  <br clear="all">
  
</body>
</html>
