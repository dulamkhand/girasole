<?php $host = sfConfig::get('app_host')?>

<?php $quiz = Doctrine::getTable('Quiz')->doFetchOne(array('isFeatured'=>'1','limit'=>1));?>
<?php if($quiz):?>
<div class="home-flow-nohover" style="border:1px solid #ccc;width:240px;padding:0 10px;z-index:1;margin-bottom:15px;min-height:425px;">
    <h2 class="title" style="border-bottom:1px solid #ccc;margin-bottom:10px;font-weight:bold;color:green;">
        <?php echo $quiz['title']?>
    </h2>

    <!--quiz sample questions-->
    <?php $rss = Doctrine::getTable('QuizQuestion')->doFetchArray(array('quizId'=>$quiz['id'], 'limit'=>1));?>
    <?php foreach ($rss as $rs):?>        
        <?php echo $rs['number'].'. '.$rs['body']?>
        <br clear="all">
        <?php $opts = Doctrine::getTable('QuizOption')->doFetchArray(array('questionId'=>$rs['id']));?>    
        <?php foreach ($opts as $opt):?>
            <label>
                <input type="radio" class="left" name="radio<?php echo $rs['id']?>" style="width:18px;margin:5px 5px 0 15px;" />
                <?php echo $opt['body']?>
                <br clear="all">
            </label>
        <?php endforeach?>
        <hr class="dotted" style="margin:15px 0;"/>
    <?php endforeach?>

    <a href="<?php echo $host?>/content/branch2/type/teenage/last/1/catId/88" class="more left" style="margin-bottom:10px;">Бүх сонжоо</a>
    
    <?php if(isset($rs['content_id'])):?>
		    <a href="<?php echo url_for('content/leaf1?route='.$rs['route'].'&type='.$type)?>" class="more right" style="margin-bottom:10px;">Үргэлжлүүлэх &raquo;</a>
    <?php else:?>
    		<a href="<?php echo url_for('quiz/detail?route='.$quiz['route'])?>" class="more right" style="margin-bottom:10px;">Үргэлжлүүлэх &raquo;</a>
    <?php endif?>
    <br clear="all">
</div>
<br clear="all">
<br clear="all">
<?php endif?>
