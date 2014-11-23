<form action="<?php echo url_for('partial/subscribe')?>" method="POST">
		<div id="subscribeFlash"></div>
		Имэйл <input type="text" name="subscribeEmail" value="" />
		<input type="submit" value="OK"/>
</form>

<script type="text/javascript">
function subscribe()
{
  $.ajax({
    url: "<?php echo url_for('partial/subscribe')?>", 
    type: "POST",
    data: {subscribeEmail:$('#subscribeEmail').val()},
    success: function(data)        
    {
    		$('#subscribeFlash').html(data);
    }
  });
  return false;
}
</script>
