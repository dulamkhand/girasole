<form action="<?php echo url_for('image/index')?>" method="GET">
    <fieldset>
        <legend>Search / Filter</legend>
        <table width="100%">
          <tr>
            <td width="20%" align="right">Type</td>
            <td>
                <select id="objectType" name="objectType" style="width:400px;" onchange="loadObjects();">
                  <option value="">Бүгд</option>
                  <?php $rss = myTools::getArray('image_type');?>
                  <?php foreach ($rss as $key=>$value):?>
                      <option <?php if ($objectType == $key) echo 'selected';?> value="<?php echo $key?>"><?php echo $value?></option>
                  <?php endforeach?>
                </select><br>
                <div id="containerObjectId"></div>
            </td>
          </tr>
          <tr>
            <td align="right">Keyword</td>
            <td><input style="width:400px;" type="text" name="title" id="title" value="<?php echo $sf_request->getParameter('title')?>" size="30" /></td>
          </tr>
        </table>
        
        <input type="submit" value="Submit" />
    </fieldset>
</form>


<?php if(isset($pager)):?>
<ul>
<?php foreach ($pager->getResults() as $image): ?>
  <li class="left" style="position:relative;width:120px;height:120px;overflow:hidden;padding:1px;margin:2px;border:1px solid #eee;">
    <?php echo image_tag('/uploads/'.$image->getFullPath(), array('alt'=>$image, 'title'=>$image, 'style'=>'float:left; max-width:120px; max-height:120px;'))?>
    
    <a style="position:absolute;bottom:0px;right:35px;" href="<?php echo url_for('image/edit?id='.$image->getId()) ?>">edit</a>
    <a style="position:absolute;bottom:0px;right:0px;" onclick="return confirm('Та итгэлтэй байна уу?')" href="<?php echo url_for('image/delete?id='.$image->getId()) ?>">delete</a>
  </li>
<?php endforeach; ?>
</ul>

<br clear="all">

<?php echo pager($pager, 'image/index')?>
<?php endif;?>


<script type="text/javascript">

function loadObjects()
{
  $.ajax({
      url: "<?php echo url_for('image/loadObjects')?>",
      data: {objectType : $('#objectType').val(), objectId: <?php echo $objectId ? $objectId : 0?>},
      type: "POST",
      success: function(data){
          $('#containerObjectId').html('<select id="objectId" name="objectId" style="width:400px;">' + data + '</select>');
      }
  });
  return false;
}

$(document).ready(function() {
  loadObjects();  
});
</script>