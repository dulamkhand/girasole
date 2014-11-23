<div id="boxRegister" class="box-shadow" style="width:270px;position:absolute;top:34px;right:92px;display:none;padding:20px 30px;background:#fff;z-index:100;border:1px solid #ccc;">

    <?php echo image_tag('icons/remove.png', array('id'=>'closeBoxRegister', 'onmouseover'=>'$(this).attr("src", "http://ow/images/icons/remove-hover.png");', 'onmouseout'=>'$(this).attr("src", "http://ow/images/icons/remove.png");', 'style'=>'position:absolute;top:10px;right:10px;cursor:pointer;'))?>
    
    <form action="#" method="post" id="formRegister">
    
        <div id="errorRegister"></div>
    
        <?php echo $form['email']->renderLabel() ?>
        <br clear="all">
        <?php echo $form['email'] ?>
        <br clear="all">
        
        <?php echo $form['lastname']->renderLabel() ?>
        <br clear="all">
        <?php echo $form['lastname'] ?>
        <br clear="all">
        
        <?php echo $form['firstname']->renderLabel() ?>
        <br clear="all">
        <?php echo $form['firstname'] ?>
        <br clear="all">
        
        <?php echo $form['mobile']->renderLabel() ?>
        <br clear="all">
        <?php echo $form['mobile'] ?>
        <br clear="all">
        
        <?php echo $form['password']->renderLabel() ?>
        <br clear="all">
        <?php echo $form['password'] ?>
        
        <br clear="all">
        <button onclick="submitRegisterForm();return false;" class="buttonGreen" style="width:261px;padding:1px 95px;">БҮРТГҮҮЛЭХ</button>
        <br clear="all">
          
    </form>

</div><!--boxRegister-->


<script type="text/javascript">
function submitRegisterForm()
{
  $.ajax({
      url: "<?php echo url_for('user/register')?>",
      type : "POST",
      data: $("#formRegister").serialize(),
      beforeSend: function()
      {
          $('#errorRegister').html('<img src="/images/loadinggreen.gif" style="margin:0 120px;" />');
      },
      onLoading : function ()
      {
          $('#errorRegister').html('<img src="/images/loadinggreen.gif" style="margin:0 120px;" />');
      },
      success: function(data)
      {
          $('#errorRegister').html(data);
      }
  });
}
</script>
