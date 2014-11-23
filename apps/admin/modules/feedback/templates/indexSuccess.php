<form action="<?php echo url_for('feedback/index')?>" method="GET">
    <?php include_partial('global/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Organization</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Message</th>
      <th>Sent date</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $rs): ?>
    <tr >
      <td><?php echo ++$i?></td>
      <td><?php echo $rs->getOrganization()?></td>
      <td><?php echo $rs->getName()?></td>
      <td><?php echo $rs->getEmail()?></td>
      <td><?php echo $rs->getPhone()?></td>
      <td><?php echo $rs->getMessage()?></td>
      <td><?php echo $rs->getCreatedAt()?></td>
      <td nowrap width="20%">
      		<a onclick="return confirm('Are you sure?')" href="<?php echo url_for('feedback/delete?id='.$rs->getId())?>" title="Delete" class="action">Delete</a>
      </td>
    </tr>
    <?php endforeach; ?>
    <tr><td colspan="10"><?php echo pager($pager, 'feedback/index?keyword='.$sf_params->get('keyword'))?></td></tr>
  </tbody>
</table>
