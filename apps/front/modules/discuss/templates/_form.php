<a name="discuss-form"></a>
<form action="#" method="post" class="form" id="discuss-form" style="margin:10px 0 0 0;">

  <input type="hidden" value="<?php echo $objectType ?>" name="discussObjectType" id="discussObjectType" />
  <input type="hidden" value="<?php echo $objectId ?>" name="discussObjectId" id="discussObjectId" />
  
  <div class="left" style="width:600px;">
      <input type="text" name="discuss-name" id="discuss-name" value="Зочин" class="border-radius-2" 
          style="width:250px;color:green;margin:0 0 7px 0;line-height:14px;" />
      
      <textarea name="discuss-area" id="discuss-area" class="border-radius-2" style="width:600px;">Сайн байна уу, </textarea>

      <div id="discuss-error" class="ff3322 font14"></div>
      <button class="buttonGreen" type="button" value="Сэтгэгдэл үлдээх" onclick="submitDiscussForm();">Сэтгэгдэл үлдээх</button>
      <?php echo image_tag('icons/loading.gif', array('id'=>'discuss-loader', 'style'=>'display:none;'))?>
  </div>
  
</form>
<br clear="all">
<br clear="all">


<script type="text/javascript">
function submitDiscussForm()
{
  $('#discuss-error').html('');
  
  if($('#discuss-area').val().trim() == "") {
      $('#discuss-error').html('&uarr; Та сэтгэгдлээ оруулна уу &uarr;');
      return false;
  }
  
  $.ajax({
      url: "<?php echo url_for('discuss/save')?>", 
      type: "POST",
      data: {discussObjectId:$('#discussObjectId').val(), discussObjectType:$('#discussObjectType').val(), discussName:$('#discuss-name').val(), discussBody:$('#discuss-area').val()},
      beforeSend: function(){
          $('#discuss-loader').show();
      },
      success: function(data)        
      {
          $('#discuss-loader').hide();
          $("#discusss").prepend(data);
          $('#discuss-area').val("Сайн байна уу, ");
      }
  });
  return false;
}




$(document).ready(function(){
  /* name */
  $('#discuss-name').click(function(){
      if($(this).val().trim() == "Зочин")
      {
          $(this).val('');
      }
  }).blur(function() {
      if($(this).val().trim() == "")
      {
          $(this).val('Зочин');
      }
  });
  
  /* textarea */
  $('#discuss-area').blur(function(){
      if($(this).val().trim() == "")
      {
          $(this).val('Сайн байна уу, ');
      }
  });

});


</script>