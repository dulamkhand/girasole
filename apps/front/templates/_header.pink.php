<style>
body {background:#fff;}
#header{background:none;position:fixed;z-index:100;top:0;left:0;height:150px;width:100%;border:0px solid red;}
#mainmenu {margin:50px auto 0 auto;list-style:none;border:0px solid green;width:1050px;}
#mainmenu li {float:left;margin:0 30px 0 0;background:url(../images/menu.png);height:65px;width:171px;border:0px solid yellow;}
#mainmenu li a {color:#fff;font-size:15px;font-weight:bold;text-shadow:none;padding:0;margin:20px 0 0 35px;float:left;text-transform:uppercase;}
#mainmenu li a:hover {color:brown;}

#mainmenu .submenu {display:none;position:absolute;top:30px;left:0;z-index:1;border:1px solid #333;background-color:#1C1C1C;-moz-box-shadow:0 5px 8px #333;-webkit-box-shadow:0 5px 8px #333;box-shadow:0 5px 8px #333;border-top:0;}
#mainmenu .submenu ul {padding:10px;}
#mainmenu .submenu ul li {padding:0;margin:0;border-bottom:1px solid #121212;display:block;float:none;}
#mainmenu .submenu ul li a {background:none;padding:0;margin:0;text-transform:none;color:#444;font-weight:normal;font-style:normal;display:block;float:none;}
#mainmenu .submenu ul li a:hover {color:#bbb;}
</style>


<div id="header">

  <ul id="mainmenu">
      <li class="mainnav">
      	<a href="<?php echo url_for('main/index')?>" style="padding-left:0px;">Үл хөдлөх</a>
      </li>      
      
      <li class="mainnav">
        <a href="<?php echo url_for('main/index?category=beauty')?>">Гоо сайхан</a>
      </li>      
      
      <li class="mainnav">
      	<a href="<?php echo url_for('runway/index')?>">Коллекц</a>
      </li>
      
      <li class="mainnav">
      	<a href="<?php echo url_for('video/index')?>">Видео</a>
      </li>
      
      <li class="mainnav">
        <a href="<?php echo url_for('shop/index')?>">Дэлгүүр</a>
      </li>
      <br clear="all">
  </ul><!--nav-main-->

<br clear="all">
</div><!-- /header -->

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