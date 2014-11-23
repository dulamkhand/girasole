<?php $rs = Doctrine::getTable('Quote')->doFetchOne(array('day'=>date('d'))); ?>
<?php if($rs):?>
    <div style="text-align:center;">
        <?php echo image_tag('orn-down.png', array());?>
        
        <?php if($rs['title']):?>
            <h2 class="title" style="text-align:center;"><?php echo $rs['title']?></h2>
        <?php endif?>
    
        <?php if($rs['image']) echo image_tag('/uploads/quote/300t-'.$rs['image'], array('width'=>$width));?>
        
        <?php if($rs['body']):?>
            <br clear="all">
            <?php echo $rs['body']?>
            <br clear="all">
        <?php endif?>
    
        <?php if($rs['author']):?>
            <div class="green em align-center"><?php echo $rs['author']?></div>
        <?php endif?>
        
        <?php echo image_tag('orn-up.png', array('style'=>'margin:5px 0;'));?>
    </div>
<?php endif?>
