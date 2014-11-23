<?php $host = sfConfig::get('app_host')?>

<form action="<?php echo url_for('discuss/indexMirror')?>" method="GET">
    <b>ContentId</b>&nbsp; 
    <input type="text" value="<?php echo $sf_params->get('objectId')?>" name="objectId" id="objectId" style="width:80px;"/> &nbsp;
    <?php include_partial('global/search', array());?>
</form>

<br clear="all">
<br clear="all">
<form action="<?php echo url_for('discuss/cmdMirror')?>" method="POST">
  <table width="100%">
    <thead>
      <tr>
        <th>#</th>
        <th><label class="clean" style="font-weight:bold;width:180px; float:left;margin:10px 0 0 0;">
                <input type="checkbox" value="false" name="checkall" id="checkall"/> &nbsp; Check/Uncheck all
            </label>
            <input type="hidden" value="<?php echo $sf_params->get('cmd')?>" name="cmd" id="cmd" />
            <input type="submit" value="Confirm" onclick="$('#cmd').val('confirm');"/>
            <input type="submit" value="Deactivate" onclick="$('#cmd').val('deactivate');"/>
        </th>
        <th>User (IP)</th>
        <th>Date</th>
        <th>Content</th>
        <th>ContentId</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=0; foreach ($pager->getResults() as $rs): ?>
      <tr>
        <td><?php echo ++$i?></td>
        <td>
            <label class="clean">
                <input type="checkbox" value="<?php echo $rs['id']?>" name="checkbox_ids[]" class="checkbox"/> 
                <?php echo $rs->getText()?>
            </label>
        </td>
        <td><?php echo $rs->getName().' ('.$rs->getIpAddress().')'?></td>
        <td><?php echo $rs->getCreatedAt()?></td>
        <td>
            <?php $content = Doctrine::getTable('Content')->doFetchOne(array('id'=>$rs->getObjectId()))?>
            <?php $uri = $host.'/content/leaf1?id='.$rs->getObjectId();?>
            <a href="<?php echo $uri?>" class="action" target="_blank"><?php echo $content['title'] ?></a>
        </td>
        <td><?php echo $rs->getObjectId()?></td>
      </tr>
      <?php endforeach; ?>
      <tr><td colspan="10"><?php echo pager($pager, 'discuss/indexMirror?objectId='.$sf_params->get('objectId').'&keyword='.$sf_params->get('keyword'))?></td></tr>
    </tbody>
  </table>
</form>

<script type="text/javascript">
$(document).ready(function(){
  $("#checkall").click(function(){
      $(".checkbox").prop("checked",$("#checkall").prop("checked"))
  })
});
</script>