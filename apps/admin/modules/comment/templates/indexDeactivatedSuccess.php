<?php $host = sfConfig::get('app_host')?>

<form action="<?php echo url_for('comment/indexDeactivated')?>" method="GET">
    <b>ContentId</b>&nbsp; 
    <input type="text" value="<?php echo $sf_params->get('objectId')?>" name="objectId" id="objectId" style="width:80px;"/>
    <?php include_partial('global/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Comment</th>
      <th>User (IP)</th>
      <th>Date</th>
      <th>Content</th>
      <th>ContentId</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $rs): ?>
    <tr style="background:<?php if($rs->getDeactivated()) echo '#dedede;'?>">
      <td><?php echo ++$i?></td>
      <td><?php echo $rs->getText()?></td>
      <td><?php echo $rs->getName().' ('.$rs->getIpAddress().')'?></td>
      <td><?php echo $rs->getCreatedAt()?></td>
      <td>
          <?php $content = Doctrine::getTable('Content')->doFetchOne(array('id'=>$rs->getObjectId()))?>
          <?php $uri = $host.'/content/leaf1?id='.$rs->getObjectId();?>
          <a href="<?php echo $uri?>" class="action" target="_blank"><?php echo $content['title'] ?></a>
      </td>
      <td><?php echo $rs->getObjectId()?></td>
      <td nowrap width="20%">
          <a href="<?php echo url_for('comment/cmd?id='.$rs->getId().'&cmd=confirm') ?>" class="action">Activate</a>
      </td>
    </tr>
    <?php endforeach; ?>
    <tr><td colspan="10"><?php echo pager($pager, 'comment/indexDeactivated?objectId='.$sf_params->get('objectId').'&keyword='.$sf_params->get('keyword'))?></td></tr>
  </tbody>
</table>