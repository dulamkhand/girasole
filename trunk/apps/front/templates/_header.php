<style>
#header{margin:0;width:100%;border:0px solid red;background:-moz-linear-gradient(center top , #F10B61,#F7B2AA);}

#mainmenu {list-style:none;border:0px solid green;background:none);width:810px;height:30px;padding-top:15px;padding-left:45px;}
#mainmenu li {border:0px solid yellow;background:none;float:left;}
#mainmenu li.divider{background:#fff;width:1px;height:12px;margin:7px 0 0 0;padding:0;}
#mainmenu li a {font-style:italic;letter-spacing:-2px;color:#fff;font-size:12px;font-weight:normal;text-shadow:none;padding:0;margin:3px 30px;float:left;text-transform:uppercase;}
#mainmenu li a:hover {color:#FFF777;}

#mainmenu .submenu {display:none;position:absolute;top:30px;left:0;z-index:1;border:1px solid #333;background-color:#1C1C1C;-moz-box-shadow:0 5px 8px #333;-webkit-box-shadow:0 5px 8px #333;box-shadow:0 5px 8px #333;border-top:0;}
#mainmenu .submenu ul {padding:10px;}
#mainmenu .submenu ul li {padding:0;margin:0;border-bottom:1px solid #121212;display:block;float:none;}
#mainmenu .submenu ul li a {background:none;padding:0;margin:0;text-transform:none;color:#fff;font-weight:normal;font-style:normal;display:block;float:none;}
#mainmenu .submenu ul li a:hover {color:#bbb;}
</style>

<div id="header">
<div class="wrapper">

  <!--logo-->
  <a href="<?php echo url_for('@homepage')?>" class="left"><?php echo image_tag('logo/artofsun120.png', array('width'=>50))?></a>

  <!--mainmenu-->
  <ul id="mainmenu">
  
    <li class="mainnav">
      <a href="<?php echo url_for('main/list?listtype=list1&categoryId=16')?>"> Гоо сайхан</a>
    </li>      
    
    <li class="divider">&nbsp;</li>
    
    <li class="mainnav">
    	<a href="<?php echo url_for('main/list?listtype=list1&categoryId=15')?>">Collection</a>
    </li>
    
    <li class="divider">&nbsp;</li>
    
    <li class="mainnav">
    	<a href="<?php echo url_for('main/list?listtype=list1&categoryId=13')?>">Video</a>
    </li>
    
    <li class="divider">&nbsp;</li>
    
    <li class="mainnav">
      <a href="<?php echo url_for('main/list?listtype=list1&categoryId=14')?>">Shopping</a>
    </li>
    
  </ul><!--mainmenu-->

  <br clear="all">
</div><!--wrapper-->
</div><!--header-->

<script type="text/javascript">
$('#mainmenu li.mainnav').mouseover(function(e){
    $(this).find('.submenu').height('auto').slideDown(350);
});

$('#mainmenu li.mainnav').mouseleave(function(e){
    $(this).find('.submenu').height('auto').slideUp(100);
});
/*$('.submenu').mouseleave(function(e){
    $(this).slideUp(100);
});*/
</script>
