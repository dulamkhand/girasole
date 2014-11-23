<?php $host = sfConfig::get('app_host')?>

<script type="text/javascript">
function love(objectId, objectType)
{
  $.ajax({
    url: "<?php echo url_for('partial/love')?>", 
    type: "POST",
    data: {objectId:objectId, objectType:objectType},
    success: function(data)        
    {
    		var id = objectType + "-" + objectId;
    		/* number of love */
      	$("#love-count-" + id).html(data);
      	/* image */
      	if($("#love-img-" + id).attr('src') == '<?php echo $host?>/images/love16-black.png') {
      			$("#love-img-" + id).attr('src','<?php echo $host?>/images/love16-green.png');
      	} else {
      			$("#love-img-" + id).attr('src','<?php echo $host?>/images/love16-black.png');	
      	}
    }
  });
  return false;
}
</script>
