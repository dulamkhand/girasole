<link type="text/css" rel="stylesheet" href="/css/restaurants_default_viewItem_item6_f4_2011-11-03-15-19.css" />
<link type="text/css" rel="stylesheet" href="/css/global_f4_2011-05-09-14-31.css" />
<link type="text/css" rel="stylesheet" href="/css/module_f1_2011-04-22-07-03.css" />
<link type="text/css" rel="stylesheet" href="/css/fancybox_f1_2011-03-29-09-35.css" />
<link rel="stylesheet" type="text/css" href="/css/module.css?mergeFile=_none" />


<?php $selected_id = ($showpage && $showpage->getId()) ? $showpage->getId() : $sf_request->getParameter('id')?>
<?php if(sizeof($pages) > 1):?>
<div id="subMenu" style="margin-right:10px;">
    <h2><?php echo myConstants::getMenuValueByKey($menu);?></h2>
    <ul class="main-content-menu">
      <?php foreach ($pages as $page):?>
          <li class="item2 <?php if($page->getId() == $selected_id) echo 'active'?>">
              <a href="<?php echo url_for('@page?menu='.$page->getMenu().'&id='.$page->getId())?>" style="text-shadow:0 0 1px #D2BEA9;">
                  <span><?php echo $page->getBriefCulture()?></span>
              </a>
          </li>		
      <?php endforeach?>
    </ul>
</div><!--subMenu-->
<?php endif?>



<div class="viewItem" id="contentArea" style="width:<?php echo sizeof($pages) <= 1 ? '100%' : '760px'?>;">

  <div class="content-wrapper" style="<?php if(sizeof($pages) <= 1) echo 'width:590px;'?>">
    <h2><?php echo __('Description')?></h2>
    <div class="moduleOutput viewItem" id="mod_pukkaRestaurants">
        <div class="moduleBody">
            <div class="contentWrapper">
                <?php if($showpage):?>
                    <h3 class="itemTitle" style="text-transform:uppercase;color:#916A48;font-size:1.05em;text-shadow:1px 1px 0 #D2BEA9;"><?php echo $showpage?></h3>
                    <p style="text-align:justify;"><?php echo nl2br(strip_tags(html_entity_decode($showpage->getContentCulture())))?></p>
                <?php endif;?>
            </div>
            
            <p class="itemPrice" style="color:#916A48;font-size:1.05em;">
        		    <span class="lowercase"><?php echo $showpage->getAdditionCulture()?></span>
      			</p>
        </div>
    </div>
  </div><!--content-wrapper-->
  
  
  <div class="right-content" style="width:360px;">
      <?php if($showpage) include_partial('page/gallery', array('page_id'=>$showpage->getId()));?>
      
      <?php include_partial('page/testimonial');?>
  </div><!--right-content-->
    
</div><!--viewItem-->