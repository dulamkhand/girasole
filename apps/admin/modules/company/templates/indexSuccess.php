<form action="<?php echo url_for('company/index')?>" method="GET">
    <b>Keyword</b>&nbsp; <input type="text" value="<?php echo $sf_params->get('keyword')?>" name="keyword" id="keyword" size="40" style="padding:6px;"/>
    <input type="submit" value="Submit" />
</form>

<br clear="all">

<a href="<?php echo url_for('company/new')?>"><?php echo image_tag('icons/with-shadows/badge-square-plus-24.png', array())?></a>
<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>№</th>
      <th>Name</th>
      <th>Url name</th>
      <th>Logo</th>      
      <th>Web</th>
      <th>Sort</th>
      <th>Created at</th>
      <th>#</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $rs): ?>
    <tr>
      <td><?php echo ++$i?></td>
      <td><?php echo $rs->getName() ?></td>
      <td><?php echo $rs->getUrlName() ?></td>
      <td><?php echo $rs->getLogo() ?></td>
      <td><?php echo $rs->getWeb() ?></td>
      <td><?php echo $rs->getSort() ?></td>
      <td><?php echo $rs->getCreatedAt() ?></td>
      <td nowrap>
          <?php include_partial('global/actions', array('module'=>'company', 'id'=>$rs->getId()));?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br clear="all">
<?php echo pager($pager, 'company/index')?>