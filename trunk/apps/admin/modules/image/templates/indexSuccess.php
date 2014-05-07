<?php $host = sfConfig::get('app_host')?>
<form action="<?php echo url_for('image/index')?>" method="GET">
    <!--<tr>
        <td><b>Choose object</b></td>
        <td><select id="objectType" name="objectType" style="width:400px;" onchange="loadObjects();">
          <option value="">Бүгд</option>
          <?php //$rss = myTools::getArray('objectType');?>
          <?php //foreach ($rss as $key=>$value):?>
              <option <?php //if ($objectType == $key) echo 'selected';?> value="<?php //echo $key?>"><?php //echo $value?></option>
          <?php //endforeach?>
        </select><br>
        <div id="containerObjectId"></div>
    </td></tr>--> &nbsp;
    <?php include_partial('global/search', array());?>
</form>
<br clear="all">
<a href="<?php echo url_for('content/index')?>">&laquo; Back to contents</a>
<br clear="all">
<br clear="all">
<?php if(isset($pager)):?>
<table width="100%" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>About</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
      <?php $i = 0;?>
      <?php foreach ($pager->getResults() as $rs): ?>
      <tr <?php if($i%2 != 0) echo 'class="odd"'?>>
          <td><?php echo ++$i?></td>
          <td>
            <?php $img = $rs->get50q() ? $rs->get50q() : $rs->getOrg()?>
            <a href="<?php echo $host.'/uploads/'.$img?>" target="_blank">
                <?php echo image_tag('/uploads/'.$img, array('alt'=>$rs, 'title'=>$rs, 'style'=>'max-width:120px; max-height:120px;'))?>
            </a>
          </td>
          <td>
              <a href="<?php echo url_for('image/edit?id='.$rs->getId())?>" title="Edit" class="action">
                  <b><?php echo stripalltags($rs) ?></b>
              </a>
              <br>
              <?php echo stripalltags($rs->getDescription()) ?>
          </td>
          <td nowrap>
              <?php include_partial('global/actions', array('module'=>'image', 'id'=>$rs->getId()));?>
          </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
</table>
<?php echo pager($pager, 'image/index')?>
<?php endif;?>

<br clear="all">



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