<form action="<?php echo url_for('subscriber/index')?>" method="GET">
    <?php include_partial('global/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="40%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th>Email</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0;?>
    <?php foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?>>
      <td><?php echo ++$i?></td>
      <td><?php echo $rs?></td>
      <td nowrap>
          <?php include_partial('global/actions', array('module'=>'subscriber', 'id'=>$rs->getId()));?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'subscriber/index?keyword='.$sf_params->get('keyword'))?>