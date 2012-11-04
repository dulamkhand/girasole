<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>  
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
  	<?php include_stylesheets() ?>    
    <?php include_javascripts() ?>
  	
  	<link rel="shortcut icon" href="/images/logo_small.png" />
    
    <!--jquery-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>    

  </head>

  <body>
    <div id="container">
      
      <?php if($sf_user->isAuthenticated() && $sf_user->hasCredential('admin-girasole')):?>
        <div style="color:#fff;float:right;margin:8px 12px 0 0;">
          Welcome <b style="color:#fff;"><i style="color:#fff;"><?php echo $sf_user->getFullname()?></i></b>, &nbsp; 
          <a href="<?php echo url_for('feedback/index')?>" style="color:#fff;">Шинэ санал хүсэлт</a> &nbsp; 
          <a href="<?php echo url_for('user/logout')?>" style="color:#fff;">Гарах</a>
        </div>
      <?php endif;?>
      
      <h2 style="floart:right;margin:21px 0;color:#fff;">~ Girasole ~</h2>

      <div id="topmenu">
        <ul>
          <?php if($sf_user->isAuthenticated() && $sf_user->hasCredential('admin-broshure')):?>
          <?php $tab = isset($tab) ? $tab : $sf_request->getParameter('module'); ?>
            
            <li <?php echo $tab == 'content' ? 'class="current"' : '' ?>>
                <?php echo link_to('Content', 'content/index')?>
            </li>
            
            <li <?php echo $tab == 'image' ? 'class="current"' : '' ?>>
                <?php echo link_to('Image', 'image/index')?>
            </li>
            
            <li <?php echo $tab == 'banner' ? 'class="current"' : '' ?>>
              <?php echo link_to('Banner', 'banner/index')?>
            </li>
            
            <li <?php echo $tab == 'category' ? 'class="current"' : '' ?>>
                <?php echo link_to('Category', 'category/index')?>
            </li>
            
            <li <?php echo $tab == 'aphorism' ? 'class="current"' : '' ?>>
                <?php echo link_to('Aphorism', 'aphorism/index')?>
            </li>
            
            <li <?php echo $tab == 'user' ? 'class="current"' : '' ?>>
              <?php echo link_to('Logout', 'user/logout')?>
            </li>
            <?php else:?>
              <li>&nbsp;</li>
            <?php endif ?>
        </ul>
      </div><!--topmenu-->
      
     
      <div id="wrapper">
        <div id="content" class="full">
          <!-- message boxes -->
          <?php include_partial("global/messages", array());?>
          
          <?php echo $sf_content ?>
        </div><!--content-->
      </div><!--wrapper-->
  
      
      <div id="footer">
        2012 &copy; girasole <a href="http://www.girasole.com" target="_blank">www.girasole.mn</a>
        <br clear="all">
      </div>  

    </div><!--container-->
    

  </body>
</html>
