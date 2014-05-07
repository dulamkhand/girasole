<div style="width:600px;float:left;">		
	<?php include_partial('content/featuredHome', array());?>
	<br clear="all">
	<?php include_partial('content/featuredTextbox', array());?>	
</div>

<div class="right" style="width:375px;margin:0;">
  <?php include_partial('partial/rek', array('position'=>'home-featured', 'width'=>375, 'limit'=>1));?>
  <br clear="all">
  <?php include_partial('content/homeNewTop', array());?>    
</div>

<br clear="all">
<br clear="all">

<div class="left" style="width:715px;">
   <!-- 4 MAIN CATEGORIES FLOW -->
	 <div class="left" style="margin:0;width:715px;margin:0 15px 0 0;">
        <?php echo link_to('Гоо сайхан', 'content/branch1?type=diva', array('class'=>'title-leaf', 'style'=>'text-align:center;display:block;'))?>
        <hr style="margin:0 0 15px 0;">
        <?php include_partial('content/homeFlowDiva', array('type'=>'diva'));?>
        <br clear="all">
        <br clear="all">		
    </div>
    <br clear="all">
	
    <?php include_partial('partial/rek', array('position'=>'home-featured', 'width'=>715, 'limit'=>1));?>

    <div class="left" style="margin:0;width:715px;margin:0 15px 0 0;">
        <?php echo link_to('Ажил хэрэг', 'content/branch1?type=businesswoman', array('class'=>'title-leaf', 'style'=>'text-align:center;display:block;'))?>
        <hr style="margin:0 0 15px 0;">
        <?php include_partial('content/homeFlow', array('type'=>'businesswoman'));?>
        <br clear="all">
        <br clear="all">
    </div>    
    <br clear="all">
	
    <?php include_partial('partial/rek', array('position'=>'home-featured', 'width'=>715, 'limit'=>1));?>
    
    <div class="left" style="margin:0;width:715px;margin:0 15px 0 0;">
        <?php echo link_to('Айл гэрийн амьдрал', 'content/branch1?type=housewife', array('class'=>'title-leaf', 'style'=>'text-align:center;display:block;'))?>
        <hr style="margin:0 0 15px 0;">
        <?php include_partial('content/homeFlow', array('type'=>'housewife'));?>
        <br clear="all">
        <br clear="all">
    </div>    
    <br clear="all">
	
    <?php include_partial('partial/rek', array('position'=>'home-featured', 'width'=>715, 'limit'=>1));?>   
    
    <div class="left" style="margin:0;width:715px;margin:0 15px 0 0;">
        <?php echo link_to('Өсвөр үеийнхэн', 'content/branch1?type=teenage', array('class'=>'title-leaf', 'style'=>'text-align:center;display:block;'))?>
        <hr style="margin:0 0 15px 0;">
        <?php include_partial('content/homeFlow', array('type'=>'teenage'));?>
        <br clear="all">
        <br clear="all">
    </div>
    <br clear="all">
    <br clear="all">
</div><!--left-->

<div class="right" style="width:260px;padding-top:60px;">  
	<?php include_partial('quiz/home', array());?>
	
	<?php $rs = Doctrine::getTable('Poll')->doFetchOne(array('isActive'=>'1','isFeatured'=>'1'))?>
	<?php if($rs) include_partial('poll/form', array('rs'=>$rs, 'width'=>231));?>
	
	<?php include_partial('partial/rek', array('position'=>'footer-up', 'width'=>260, 'limit'=>1));?>
	<br clear="all">
	
	<?php include_partial('partial/quote', array('width'=>260));?>
</div><!--right-->

<br clear="all">
<br clear="all">
<?php include_partial('content/popular', array());?>
