<div id="boxLogin" class="box-shadow" style="width:270px;position:absolute;top:34px;right:-1px;display:none;padding:20px 30px;background:#fff;z-index:100;border:1px solid #ccc;">

    <?php echo image_tag('icons/remove.png', array('id'=>'closeBoxLogin', 'onmouseover'=>'$(this).attr("src", "http://ow/images/icons/remove-hover.png");', 'onmouseout'=>'$(this).attr("src", "http://ow/images/icons/remove.png");', 'style'=>'position:absolute;top:10px;right:10px;cursor:pointer;'))?>
    
    <form action="#" method="post" id="formLogin">
        <div id="errorLogin"></div>
    
        <?php echo $form['email']->renderLabel() ?>
        <br clear="all">
        <?php echo $form['email'] ?>
        
        <br clear="all">
        <?php echo $form['password']->renderLabel() ?>
        <br clear="all">
        <?php echo $form['password'] ?>
        
        <br clear="all">
        <button onclick="submitLoginForm();return false;" class="buttonGreen" style="width:261px;padding:1px 95px;cursor:pointer;">НЭВТРЭХ</button>
        <br clear="all">
          
    </form>

</div><!--boxLogin-->


<script type="text/javascript">
function submitLoginForm()
{
  $.ajax({
      url: "<?php echo url_for('user/login')?>",
      type : "POST",
      data: $("#formLogin").serialize(),
      beforeSend: function()
      {
          $('#errorLogin').html('<img src="/images/loadinggreen.gif" style="margin:0 120px;" />');
      },
      onLoading : function ()
      {
          $('#errorLogin').html('<img src="/images/loadinggreen.gif" style="margin:0 120px;"/>');
      },
      success: function(data)
      {
          $('#errorLogin').html(data);
      }
  });
}
</script>