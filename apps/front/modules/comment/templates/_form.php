<a name="comment-form"></a>
<form action="#" method="post" class="form" id="comment-form" style="margin:10px 0 0 0;">

  <input type="hidden" value="<?php echo $objectType ?>" name="commentObjectType" id="commentObjectType" />
  <input type="hidden" value="<?php echo $objectId ?>" name="commentObjectId" id="commentObjectId" />

  <div id="comment-img" class="left pointer border-radius-5 relative" style="margin:0 5px 0 0;">
      <?php echo image_tag('/uploads/user/'.$sf_user->getAttribute('avator', 'default.png'), array('class'=>'comment-avator', 'id'=>'chosen-comment-avator'))?>

      <?php //echo image_tag('icons/magnifier.png', array('style'=>'position:absolute;bottom:0;right:0;cursor:pointer;display:none;', 'id'=>'toggle-imgs'))?>
      
      <div id="comment-imgs" class="border-radius-5 absolute" style="width:320px;left:0;top:48px;display:none;background:#fff;z-index:100;border:1px solid #ddd;">
          <?php echo image_tag('/uploads/user/48-browser-girl-safari-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>
          <?php echo image_tag('/uploads/user/48-browser-girl-chrome-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>
          <?php echo image_tag('/uploads/user/48-browser-girl-internet-explorer-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>
          <?php echo image_tag('/uploads/user/48-browser-girl-opera-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>
          <?php echo image_tag('/uploads/user/48-browser-girl-firefox-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>
          <?php echo image_tag('/uploads/user/48-callcenter-girls-flower-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>        
          <?php echo image_tag('/uploads/user/48-Cosmo-Girl-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>        
          <?php echo image_tag('/uploads/user/48-fichiers-gif-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>        
          <?php echo image_tag('/uploads/user/48-girl-beauty-consultant-attention-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>        
          <?php echo image_tag('/uploads/user/48-girl-bunny-happy-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>        
          <?php echo image_tag('/uploads/user/48-girl-bunny-heart-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>        
          <?php echo image_tag('/uploads/user/48-girl-idea-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>        
          <?php echo image_tag('/uploads/user/48-Girls-Blue-Dress-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>        
          <?php echo image_tag('/uploads/user/48-Girl-Shock-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>        
          <?php echo image_tag('/uploads/user/48-Girls-Red-Dress-icon.png', array('style'=>'margin:5px;', 'class'=>'left pointer comment-avator'))?>        
      </div>
  </div><!--comment-img-->
  
  <div class="left" style="width:270px;">
  
      <input type="text" name="comment-name" id="comment-name" value="Зочин" class="border-radius-2" 
          style="width:267px;color:green;margin:0 0 7px 0;line-height:14px;" />
      
      <textarea name="comment-area" id="comment-area" class="border-radius-2"
          style="width:267px;">Сайн байна уу, </textarea>
      
      <div id="comment-error" class="ff3322 font14"></div>

      <button class="buttonGreen" type="button" value="Сэтгэгдэл үлдээх" onclick="submitCommentForm();">Сэтгэгдэл үлдээх</button>
      <?php echo image_tag('icons/loading.gif', array('id'=>'comment-loader', 'style'=>'display:none;'))?>

  </div>

  <br clear="all">
</form>
<br clear="all">



<script type="text/javascript">
function submitCommentForm()
{
  $('#comment-error').html('');
  
  // validate
  if($('#comment-area').val().trim() == "") {
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
  
  /* name */
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
  
  
  /* textarea */
  $('#comment-area').blur(function(){
      if($(this).val().trim() == "")
      {
          $(this).val('Сайн байна уу, ');
      }
  });
  
  
  /* avator choose */
  $('#comment-img').mouseover(function(){
      $('#comment-imgs').show();
  });
  
  $('#comment-img').mouseleave(function(){
      $('#comment-imgs').hide();
  });
  
  $('.comment-avator').mouseover(function(){
      $(this).css('border','1px solid green');
  });
  
  $('.comment-avator').mouseleave(function(){
      $(this).css('border','1px solid #fff');
  });

  $('.comment-avator').click(function(){
      src = $(this).attr('src');
      $('#chosen-comment-avator').attr('src',src);
  });
  

});
</script>