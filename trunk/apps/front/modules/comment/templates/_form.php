<form action="#" method="post" class="form" id="comment-form">
  <a name="comment-form"></a>
  <input type="hidden" value="<?php echo $objectType ?>" name="commentObjectType" id="commentObjectType" />
  <input type="hidden" value="<?php echo $objectId ?>" name="commentObjectId" id="commentObjectId" />
  
  <div style="width:40px;float:left;padding:10px 5px;">
    <?php echo image_tag('icons/1351323322_comment.png', array())?>
  </div>
  <div style="width:230px;float:left;padding:10px 0;">
      <input type="text" name="comment-name" id="comment-name" value="Зочин" style="width:230px;height:18px;border:1px solid #ccc;color:#E94430;font-size:11px;font-weight:bold;padding:0 2px;margin:0 0 2px 0;" />
      <textarea name="comment-area" id="comment-area" 
          style="width:230px;height:40px;border:1px solid #ccc;color:#aaa;font-size:11px;padding:0 2px;">Сайн байна уу, </textarea>
      <div id="comment-error" style="font-size:11px;color:red;"></div>
      <button type="button" value="Сэтгэгдэл үлдээх" onclick="submitCommentForm();" style="cursor:pointer;color:#E94430;font-size:11px;font-weight:bold;">Сэтгэгдэл үлдээх</button>
      <?php echo image_tag('icons/loading.gif', array('id'=>'comment-loader', 'style'=>'display:none;'))?>
  </div>
</form>

<br clear="all">

<script type="text/javascript">
function submitCommentForm()
{
  $('#comment-error').html('');
  
  if($('#comment-area').val().trim() == "")
  {
      $('#comment-error').html('&uarr; Та сэтгэгдлээ оруулна уу &uarr;');
      return false;
  }
  
  $.ajax({
    url: "<?php echo url_for('comment/save')?>", 
    type: "POST",
    data: {commentObjectId:$('#commentObjectId').val(), commentObjectType:$('#commentObjectType').val(), commentName:$('#comment-name').val(), commentBody:$('#comment-area').val()},
    beforeSend: function(){
      $('#comment-loader').show();
    },
    success: function(data)        
    {
      $('#comment-loader').hide();
      $("#comments").append(data);

      $('#comment-area').val("Сайн байна уу, ");
    }
  });
  return false;
}


$(document).ready(function(){
  $('#comment-name').click(function(){
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
  
  
  $('#comment-area').blur(function(){
      if($(this).val().trim() == "")
      {
          $(this).val('Сайн байна уу, ');
      }
  })
});
</script>