<div id="header">
<div class="wrapper">

  <!-- LOGIN / JOIN -->
  <?php //include_partial('user/loginHeader', array());?>

  <!-- BANNER LOGO BANNER -->
  <div style="margin:40px 0 30px 0;position:relative;">
      <a href="<?php echo url_for('@homepage')?>" class="left" style="margin:20px 0 0 0">
          <?php include_partial('partial/rek', array('position'=>'header', 'width'=>300, 'limit'=>1));?>
      </a>
      
      <a href="<?php echo url_for('@homepage')?>" class="left">
          <?php echo image_tag('logo.header.png', array('style'=>'margin:-20px 0 0 35px'))?>
      </a>
      
      <a href="<?php echo url_for('@homepage')?>" class="right" style="margin:20px 0 0 0">
          <?php //echo image_tag('http://urin-essence.com/girasole/uploads/rek2013/numbers.jpg', array('style'=>'margin:5px 0 0 0;border:0px solid green;max-width:250px;'))?>
          <?php include_partial('partial/rek', array('position'=>'header', 'width'=>300, 'limit'=>1));?>      
      </a>
	  
  	  <!-- socials -->
  	  <div style="position:absolute;top:-35px;left:0;">
  			 <?php include_partial('partial/socials', array());?>
  	  </div>
  	  <!--search -->
  	  <div style="position:absolute;bottom:-20px;right:0;">
  			 <?php include_partial('partial/search', array('width'=>265));?>
  	  </div>
  	  <br clear="all">
  </div>
   
  <!-- MAIN MENU -->
  <?php $type = $sf_params->get('type')?>
  <div class="mainmenu <?php if($type == 'businesswoman') echo 'current'?>" id="mainmenu-businesswoman" style="width:170px;">
      <a href="<?php echo url_for('content/branch1?type=businesswoman')?>">Ажил хэрэг</a>
      <?php echo image_tag('icons/arrow-down-17x10.png', array('id'=>'arrow-businesswoman'))?>
      <?php include_partial('global/headerSubmenu', array('type'=>'businesswoman', 'cats'=>$cats, 'subcats'=>$subcats));?>
  </div>
  
  <div class="mainmenu <?php if($type == 'housewife') echo 'current'?>" id="mainmenu-housewife" style="width:245px;">
    	<a href="<?php echo url_for('content/branch1?type=housewife')?>" title="Fashion & Design">Айл гэрийн амьдрал</a>
    	<?php echo image_tag('icons/arrow-down-17x10.png', array('id'=>'arrow-housewife'))?>
    	<?php include_partial('global/headerSubmenu', array('type'=>'housewife', 'cats'=>$cats, 'subcats'=>$subcats));?>
  </div>
  
  <div class="mainmenu <?php if($type == 'diva') echo 'current'?>" id="mainmenu-diva" style="width:170px;">
    	<a href="<?php echo url_for('content/branch1?type=diva')?>">Гоо сайхан</a>
    	<?php echo image_tag('icons/arrow-down-17x10.png', array('id'=>'arrow-diva'))?>
    	<?php include_partial('global/headerSubmenu', array('type'=>'diva', 'cats'=>$cats, 'subcats'=>$subcats));?>
  </div>
  
  <div class="mainmenu <?php if($type == 'teenage') echo 'current'?>" id="mainmenu-teenage" style="width:210px;">
      <a href="<?php echo url_for('content/branch1?type=teenage')?>">Өсвөр үеийнхэн</a>
      <?php echo image_tag('icons/arrow-down-17x10.png', array('id'=>'arrow-teenage'))?>
      <?php include_partial('global/headerSubmenu', array('type'=>'teenage', 'cats'=>$cats, 'subcats'=>$subcats));?>
  </div>
  
  <div class="mainmenu <?php if($type == 'patriot') echo 'current'?>" id="mainmenu-?" style="width:200px;">
    <a href="<?php echo url_for('page/patriot')?>">Эх оронч булан</a>
    <?php echo image_tag('icons/mn.png', array('id'=>'arrow-patriot','class'=>'clean', 'style'=>'margin-right:15px;'))?>
    <?php //include_partial('global/headerSubmenu', array('type'=>'patriot', 'cats'=>$cats, 'subcats'=>$subcats));?>
  </div>

  <br clear="all">
  <br clear="all">

</div><!--wrapper-->
</div><!--header-->


<script type="text/javascript">
// MENU
$('#arrow-businesswoman').mouseover(function(e){
    $('#submenu-businesswoman').slideDown(300);
});
$('#arrow-housewife').mouseover(function(e){
    $('#submenu-housewife').slideDown(300);
});
$('#arrow-diva').mouseover(function(e){
    $('#submenu-diva').slideDown(300);
});
$('#arrow-teenage').mouseover(function(e){
    $('#submenu-teenage').slideDown(300);
});
$('#arrow-patriot').mouseover(function(e){
    $('#submenu-patriot').slideDown(300);
});

$('.submenu').mouseleave(function(e){
    $(this).slideUp(100);
});
$('.mainmenu').mouseleave(function(e){
    $('.mainmenu .submenu').slideUp(100);
});



// AVATOR, USERMENU
$('#userAvator').mouseover(function(e){
    $('#userMenu').show();
    $(this).css('box-shadow','0 0 5px green');
}).mouseleave(function(e){
    //$('#userMenu').hide();
    //$('#userAvator').css('box-shadow','none');
});

$('#userMenu').mouseleave(function(e){
    $(this).hide();
    $('#userAvator').css('box-shadow','none');
});


//jQuery.noConflict();
/*$(document).ready(function() {
    $('div').disableTextSelect();
});*/

</script>
