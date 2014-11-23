<?php $host = sfConfig::get('app_host')?>

<div class="pollBox">
<form action="#" id="pollForm" method="POST">
		<input type="hidden" value="<?php echo $rs['id']?>" name="pollId" id="pollId" />

    <h2 class="title-branch" style="border-bottom:1px solid #000;margin-bottom:10px;font-size:29px;<?php if(isset($title)) echo $title?>">
	      <?php echo $rs['title']?>
	  </h2>
	  <?php if(isset($rs['body'])):?>
				<div class="intro" style="margin:0 0 10px 0;"><?php echo striptags($rs['body'])?></div>
		<?php endif?>
		
    <!-- OPTIONS -->
    <div id="pollOptions">
        <?php $options = Doctrine::getTable('PollOption')->doFetchArray(array('pollId'=>$rs['id']));?>
		    <?php foreach ($options as $option):?>
		        <?php $id = $option['id']?>
  	        <span id="pollVote<?php echo $id ?>" class="nbvote border-radius-12"  title="<?php echo $option['nb_vote']?>">
  	           <?php echo $option['nb_vote'] >= 20 ? '20+' : $option['nb_vote'] ?>
  	        </span>
  		      <label class="choice">
  		          <input type="checkbox" id="pollOption<?php echo $id ?>" value="<?php echo $id ?>" class="pollCheckbox" 
                        onclick="submitPollForm(<?php echo $id ?>);"/>
  		          <?php echo striptags($option['body']) ?>
  		      </label>
		    <?php endforeach;?>
		</div>

    <?php if($rs['options_addable']):?>
		    <input type="text" id="pollAddOption" value="ХАРИУЛТ НЭМЭХ" class="left" style="width:<?php echo $width?>px;"/>
		    <a id="pollAddButton" onclick="addPollOption();" class="left"> + </a>
		    <br clear="all">
    <?php endif?>
</form>
</div>
<br clear="all">


<script type="text/javascript">
/* add poll option field */
$('#pollAddOption').click(function(){
  if($(this).val().trim().toLowerCase() == 'хариулт нэмэх'){
      $(this).val('');
  }
}).blur(function() {
  if($(this).val().trim() == ""){
      $(this).val('ХАРИУЛТ НЭМЭХ');
  }
});


/* submit pollForm */
function submitPollForm(id)
{
   act = 'inc';
   if($('#pollOption' + id).prop('checked') == false) {
      act = 'dec';   
   }

   $.ajax({
      url: "<?php echo url_for('poll/vote')?>", 
      type: 'POST',
      data: {pollId:$('#pollId').val(), pollOptionId:$('#pollOption' + id).val(), act:act},
      beforeSend: function(data){
          $('#pollVote' + id).html('<img src="<?php echo $host?>/images/icons/loading.gif" align="absmiddle"/>');
      },
      success: function(data){
          $('#pollVote' + id).html(data);
          /*is multiple choice?*/
          <?php if(!$rs['multiple_choice']):?>
              $('.pollCheckbox').prop('disabled', true);
              $('.pollCheckbox').attr('disabled', true);
          <?php endif?>
      }
  });
  return false;
}


/* add pollOption */
function addPollOption()
{
   if($('#pollAddOption').val().trim() == '' || $('#pollAddOption').val().trim().toLowerCase() == 'хариулт нэмэх') {
      //alert('Та ');
      return false;
   }

   $.ajax({
      url: "<?php echo url_for('poll/addOption')?>", 
      type: 'POST',
      data: {pollId:$('#pollId').val(), newOption:$('#pollAddOption').val()},
      beforeSend: function(data){
          $('#pollAddButton').html('<img src="<?php echo $host?>/images/icons/loading.gif" align="absmiddle"/>');          
      },
      success: function(data){
          $('#pollAddButton').html('+');
          $('#pollOptions').append(data);          
      }
  });
  return false;
}
</script>