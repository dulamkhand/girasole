<div id="boxLogin" class="box-shadow" style="padding:40px 0 40px 50px;">

    <form action="#" method="post" id="formLogin" class="left">
        <div id="errorLogin"></div>
    
        <?php echo $form['email']->renderLabel() ?>
        <br clear="all">
        <?php echo $form['email'] ?>
        
        <br clear="all">
        <?php echo $form['password']->renderLabel() ?>
        <br clear="all">
        <?php echo $form['password'] ?>
        
        <br clear="all">
        <button onclick="submitLoginForm();return false;" class="buttonGreen" style="width:256px;padding:0px 95px;cursor:pointer;">НЭВТРЭХ</button>
        <br clear="all">
          
    </form>
    
    <?php echo image_tag('join-page-picture.jpg', array('class'=>'left', 'style'=>'margin:10px 0 0 120px;'))?>
    <br clear="all">

</div><!--boxLogin-->


<script type="text/javascript">
function submitLoginForm()
{
  $.ajax({
      url: "<?php echo url_for('user/doLogin')?>",
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