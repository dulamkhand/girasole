<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>  
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
	<?php include_stylesheets() ?>    
  <?php include_javascripts() ?>
	<?php $host = sfConfig::get('app_host')?>
	<link rel="shortcut icon" href="<?php echo $host?>/favicon.ico" />
  <!--jquery-->
  <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>-->
	<script src="<?php echo $host?>/js/jquery.min.js"></script>  
</head>

<body>
    <?php if($sf_user->isAuthenticated()):?>
        <div id="topmenu"><ul>
            <?php $tab = isset($tab) ? $tab : $sf_request->getParameter('module'); ?>
            <?php $act = isset($act) ? $act : $sf_request->getParameter('action'); ?>
            
            <?php if($sf_user->hasCredential('content-view') || $sf_user->hasCredential('content-edit') || $sf_user->hasCredential('content-delete')):?>
                <!--content-->
                <li <?php echo $tab == 'content' ? 'class="current"' : '' ?>>
                    <?php echo link_to('Content', 'content/index')?>
                </li>
            <?php endif?>
            <?php if($sf_user->hasCredential('content-view')):?>
                <!--image-->
                <li <?php echo $tab == 'image' ? 'class="current"' : '' ?>>
                    <?php echo link_to('Image', 'image/index')?>
                </li>
            <?php endif?>
            <?php if($sf_user->hasCredential('comment')):?>
                <!--comment-->
                <li <?php echo $tab == 'comment' ? 'class="current"' : '' ?>>
                    <?php echo link_to('Comment', 'comment/indexMirror')?>
                </li>
            <?php endif?>
            <?php if($sf_user->hasCredential('discuss')):?>
                <!--disucss-->
                <li <?php echo $tab == 'discuss' ? 'class="current"' : '' ?>>
                    <?php echo link_to('Discuss', 'discuss/indexMirror')?>
                </li>
            <?php endif?>
            <?php if($sf_user->hasCredential('category')):?>
                <!--category-->
                <li <?php echo $tab == 'category' ? 'class="current"' : '' ?>>
                    <?php echo link_to('Category', 'category/list')?>
                </li>
            <?php endif?>
            <?php if($sf_user->hasCredential('banner')):?>
                <!--banner-->
                <li <?php echo $tab == 'banner' ? 'class="current"' : '' ?>>
                  <?php echo link_to('Banner', 'banner/index')?>
                </li>
            <?php endif?>
            <?php if($sf_user->hasCredential('coupon')):?>
                <!--banner-->
                <li <?php echo $tab == 'coupon' ? 'class="current"' : '' ?>>
                  <?php echo link_to('Coupon', 'coupon/index')?>
                </li>
            <?php endif?>
            <?php if($sf_user->hasCredential('quote')):?>
                <!--quote-->
                <li <?php echo $tab == 'quote' ? 'class="current"' : '' ?>>
                  <?php echo link_to('Quote', 'quote/index')?>
                </li>
            <?php endif?>
            <?php if($sf_user->hasCredential('quiz')):?>
                <!--quiz-->
                <li <?php echo in_array($tab, array('quiz','quizQuestion','quizAnswer','quizOption')) ? 'class="current"' : '' ?>>
                    <?php echo link_to('Quiz', 'quiz/index')?>
                </li>
            <?php endif?>
            <?php if($sf_user->hasCredential('poll')):?>
                <!--poll-->
                <li <?php echo in_array($tab, array('poll','pollOption')) ? 'class="current"' : '' ?>>
                    <?php echo link_to('Poll', 'poll/index')?>
                </li>
            <?php endif?>
            <?php if($sf_user->hasCredential('subscriber')):?>
                <!--subscriber-->
                <li <?php echo $tab == 'subscriber' ? 'class="current"' : '' ?>>
                    <?php echo link_to('Subscriber', 'subscriber/index')?>
                </li>
            <?php endif?>
            <?php if($sf_user->hasCredential('feedback')):?>
                <!--subscriber-->
                <li <?php echo $tab == 'feedback' ? 'class="current"' : '' ?>>
                    <?php echo link_to('Feedback', 'feedback/index')?>
                </li>
            <?php endif?>
            <?php if($sf_user->hasCredential('admin')):?>
                <!--admin-->
                <li <?php echo $tab == 'admin' ? 'class="current"' : '' ?>>
                    <?php echo link_to('Admin', 'admin/index')?>
                </li>
            <?php endif?>
            <?php if($sf_user->hasCredential('user')):?>
                <!--admin-->
                <li <?php echo $tab == 'user' ? 'class="current"' : '' ?>>
                    <?php echo link_to('User', 'user/index')?>
                </li>
            <?php endif?>
            <!--login-->
            <li><?php echo link_to('Logout ('.$sf_user->getEmail().')', 'admin/logout')?></li>
        </ul></div><!--topmenu-->
    
        <br clear="all">          
        <div id="submenu">
            <?php if($tab == 'content') {
                if($sf_user->hasCredential('content-edit')) 
                    echo link_to('+ Add', 'content/new', array('class'=>''));
                if($sf_user->hasCredential('content-view')) {
                    echo link_to('List all', 'content/index');                  
                    echo link_to('Business Woman', 'content/index?type=businesswoman', array('class'=>''));
                    echo link_to('Housewife', 'content/index?type=housewife', array('class'=>''));
                    echo link_to('Diva', 'content/index?type=diva', array('class'=>''));
                    echo link_to('Teenage', 'content/index?type=teenage', array('class'=>''));
                    echo link_to('HomeFeatured', 'content/index?isFeaturedHome=1', array('class'=>''));
                    echo link_to('HomeTextbox', 'content/index?isFeaturedHome1=1', array('class'=>''));
                    echo link_to('Branch1Featured', 'content/index?isFeatured=1', array('class'=>''));
                    echo link_to('Top', 'content/index?isTop=1', array('class'=>''));
                    echo link_to('Discuss', 'content/index?isDiscuss=1', array('class'=>''));
                    echo link_to('Ask18', 'content/index?ask18=1', array('class'=>''));
                    echo link_to('Inactive', 'content/index?isActive=0', array('class'=>''));
                }
            } else if($tab == 'image' && $sf_user->hasCredential('content-edit')) {
                # image
                echo link_to('+ Add', 'image/new?objectType='.$sf_params->get('objectType').'&objectId='.$sf_params->get('objectId'));                
            } else if($tab == 'comment' && $sf_user->hasCredential('comment')) {
                # comment
                echo link_to('New comments', 'comment/indexMirror');
                echo link_to('Deactivated comments', 'comment/indexDeactivated');
            } else if($tab == 'discuss' && $sf_user->hasCredential('discuss')) { 
                # discuss
                echo link_to('New discuss', 'discuss/indexMirror');
                echo link_to('Deactivated discusses', 'discuss/indexDeactivated');
            } else if($tab == 'category' && $sf_user->hasCredential('category')) { 
                # category
                echo link_to('+ Add', 'category/new?type='.$sf_params->get('type'));
                echo link_to('List all', 'category/list');
            } else if($tab == 'banner' && $sf_user->hasCredential('banner')) { 
                # banner
                echo link_to('+ Add', 'banner/new');
                echo link_to('List all', 'banner/index');
            } else if(in_array($tab, array('coupon', 'couponCode')) && $sf_user->hasCredential('coupon')) { 
            	  # coupon
                echo link_to('+ Add coupon', 'coupon/new');
                echo link_to('Coupons', 'coupon/index');
                # couponCode
                echo link_to('+ Add code', 'couponCode/new');
                echo link_to('Code list', 'couponCode/index');
            } else if($tab == 'quote' && $sf_user->hasCredential('quote')) { 
                # quote
                echo link_to('+ Add', 'quote/new');
                echo link_to('List all', 'quote/index');
            } else if(in_array($tab, array('poll','pollOption')) && $sf_user->hasCredential('poll')) { 
                # poll
                echo link_to('Polls', 'poll/index', array('class'=>(($tab == 'poll' && $act == "index") ? 'current' : '')));
                echo link_to('+ Add poll', 'poll/new', array('class'=>($tab == 'poll' && $act != "index" ? 'current' : '')));
                if($sf_params->get('pollId')) echo link_to('Options', 'pollOption/index?pollId='.$sf_params->get('pollId'), array('class'=>($tab == 'pollOption' && $act == "index" ? 'current' : '')));
                echo link_to('+ Add option', 'pollOption/new?pollId='.$sf_params->get('pollId'), array('class'=>($tab == 'pollOption' && $act != "index" ? 'current' : '')));
            } else if(in_array($tab, array('quiz','quizQuestion','quizAnswer','quizOption')) && $sf_user->hasCredential('quiz')) { 
                # quiz
                echo link_to('Quizs', 'quiz/index', array('class'=>(($tab == 'quiz' && $act == "index") ? 'current' : '')));
                echo link_to('+ Add quez', 'quiz/new', array('class'=>($tab == 'quiz' && $act != "index" ? 'current' : '')));
                echo link_to('Questions', 'quizQuestion/index?quizId='.$sf_params->get('quizId'), array('class'=>($tab == 'quizQuestion' && $act == "index" ? 'current' : '')));
                echo link_to('+ Add question', 'quizQuestion/new?quizId='.$sf_params->get('quizId'), array('class'=>($tab == 'quizQuestion' && $act != "index" ? 'current' : '')));
                echo link_to('Answers', 'quizAnswer/index?quizId='.$sf_params->get('quizId'), array('class'=>($tab == 'quizAnswer' && $act == "index" ? 'current' : '')));
                echo link_to('+ Add answer', 'quizAnswer/new?quizId='.$sf_params->get('quizId'), array('class'=>($tab == 'quizAnswer' && $act != "index" ? 'current' : '')));
            } else if($tab == 'subscriber' && $sf_user->hasCredential('subscriber')) { 
                # subscriber
                echo link_to('+ Add', 'subscriber/new');
                echo link_to('List all', 'subscriber/index');
            } else if($tab == 'admin' && $sf_user->hasCredential('admin')) { 
                # admin
                echo link_to('+ Add', 'admin/new');
                echo link_to('List all', 'admin/index');
            } else if($tab == 'user' && $sf_user->hasCredential('user')) { 
                # user
                echo link_to('+ Add', 'user/new');
                echo link_to('List all', 'user/index');
            }
            ?>
            <br clear="all">
        </div><!--topmenu-->
    <?php endif ?>

    <div id="wrapper">
      <div id="content" class="full">
          <?php if ($sf_user->hasFlash('flash')): ?>
              <div class="flash"><?php echo $sf_user->getFlash('flash')?></div>
          <?php endif; ?>
  
          <?php echo $sf_content ?>
      </div><!--content-->
    </div><!--wrapper-->
    
    <?php if($sf_user->isAuthenticated()):?>
        <div id="footer">
          2013 - 2015 &copy; Дагина <a href="http://www.dagina.mn" target="_blank">www.dagina.mn</a>
          <br clear="all">
        </div>
    <?php endif;?>
</body>
</html>
