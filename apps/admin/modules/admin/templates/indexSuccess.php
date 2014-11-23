<form action="<?php echo url_for('admin/index')?>" method="GET">
    <?php include_partial('global/search', array());?>
</form>
<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Email</th>      
      <th>Module permissions</th>      
      <th>Logged At</th>
      <th>Updated</th>
      <th>Created</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $rs): ?>
    <tr style="background:<?php if(!$rs->getIsActive()) echo '#dedede;'?>">
      <td><?php echo ++$i?></td>
      <td><a href="<?php echo url_for('admin/edit?id='.$rs->getId())?>"><?php echo $rs->getEmail() ?></a></td>
      <td width="20%"><?php echo $rs->getModPermissions() ?></td>
      <td nowrap><?php echo $rs->getLoggedAt() ?></td>
      <td nowrap><?php echo $rs->getUpdatedAt() ?></td>
      <td nowrap><?php echo $rs->getCreatedAt() ?></td>
      <td nowrap>
          <?php include_partial('global/activate', array('module'=>'admin', 'rs'=>$rs));?>
          <?php include_partial('global/actions', array('module'=>'admin', 'id'=>$rs->getId()));?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br clear="all">
<?php echo pager($pager, 'admin/index')?>