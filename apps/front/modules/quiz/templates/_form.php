<?php $host = sfConfig::get('app_host')?>

<form action="#" method="post" id="quizForm"">
    <?php if(isset($quizTitle) && $quizTitle):?>
        <h2 class="title-branch"><?php echo $quizTitle?></h2>
    <?php endif?>
    
    <br clear="all">
    
    <!--TODO: quiz title & quiz body?-->
    <?php //$quiz = Doctrine::getTable('Quiz')->doFetchOne(array('id'=>$quizId));?>
    <input type="hidden" value="<?php echo $quizId?>" name="quizId" id="quizId"/>
  
    <?php $rss = Doctrine::getTable('QuizQuestion')->doFetchArray(array('quizId'=>$quizId));?>
    <?php foreach ($rss as $rs):?>        
        <?php echo $rs['number'].'. '.$rs['body']?>
        <br clear="all">
        <?php $opts = Doctrine::getTable('QuizOption')->doFetchArray(array('questionId'=>$rs['id']));?>    
        <?php foreach ($opts as $opt):?>
            <label>
                <input type="radio" value="<?php echo $opt['point']?>" name="opts<?php echo $rs['id']?>[]" class="opts left" style="width:18px;margin:5px 5px 0 15px;" />
                <?php echo $opt['body']?>
                <br clear="all">
            </label>            
        <?php endforeach?>
        <hr class="dotted" style="margin:15px 0;"/>
    <?php endforeach?>
  
    <!--answer button-->
    <button class="buttonGreen" type="button" value="Хариу" onclick="submitQuizForm();" style="padding:0 50px;">Хариу</button>
    <?php echo image_tag('icons/loading.gif', array('id'=>'quizLoader', 'style'=>'display:none;'))?>
    
    <!--answer div in fancybox-->
    <div id="quizAnswer" style="width:600px;height:700px;overflow-y:scroll;display:none;text-align:center;"></div>

</form>
<br clear="all">
<br clear="all">


<script type="text/javascript">
function submitQuizForm()
{
  // validate point
  var sum = 0;
  $('.opts').each(function() {
      if($(this).prop('checked') == true) {
          sum += Number($(this).val());
      }
  });
  if(sum == 0) {
      alert('Та сонжооны хариултуудыг сонгоно уу.');
      return false;
  }

  // find answer
  $.ajax({
    url: "<?php echo url_for('quiz/answer')?>", 
    type: "POST",
    data: {quizId:$('#quizId').val(), sumpoint:sum},
    beforeSend: function(){
        $('#quizLoader').show();
    },
    success: function(data)        
    {
        $('#quizLoader').hide();
        $("#quizAnswer").html(data).fancybox({
                tpl: {closeBtn:'<a class="fancybox-item" href="javascript:;" title="Хаах" style="position:absolute;top:0;right:0;z-index:1;"><img src="<?php echo $host?>/images/icons/close20.png"/></a>'},
                closeBtn:true,
                closeClick:false,
                width: 600,
                height: 700,
                helpers: {overlay:{closeClick:false}},
                hideOnOverlayClick:false,
                hideOnContentClick:false               
            }).trigger('click');
    }
  });
  return false;
}
</script>