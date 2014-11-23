<?php if(isset($rs) && $rs):?>
    <h2 class="title-branch" style="text-align:center;"><?php echo $rs['title']?></h2>
    <?php echo image_tag('/uploads/quiz/450t-'.$rs['image'], array());?>
    <br clear="all">
    <div class="justify" style="margin:10px 0 0 0;">
        <?php echo $rs['body']?>
    </div>
    <br clear="all">
<?php else:?>
    <h2 class="title-branch"><?php echo $msg?></h2>
<?php endif?>