<div id="boxRegister" class="box-shadow" style="padding:40px 0 40px 50px;">

    <form action="#" method="post" id="formRegister" class="left">
    
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
        <button onclick="submitRegisterForm();return false;" class="buttonGreen" style="width:256px;padding:0px 95px;">БҮРТГҮҮЛЭХ</button>
        <br clear="all">
          
    </form>
    
    <?php echo image_tag('join-page-picture.jpg', array('class'=>'left', 'style'=>'margin:10px 0 0 120px;'))?>
    <br clear="all">
    
</div><!--boxRegister-->


<script type="text/javascript">
function submitRegisterForm()
{
  $.ajax({
      url: "<?php echo url_for('user/doRegister')?>",
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
