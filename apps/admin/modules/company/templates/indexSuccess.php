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
    <?php $i=0; foreach ($pager->getResults() as $company): ?>
    <tr>
      <td><?php echo ++$i?></td>
      <td><?php echo $company->getName() ?></td>
      <td><?php echo $company->getUrlName() ?></td>
      <td><?php echo $company->getLogo() ?></td>
      <td><?php echo $company->getWeb() ?></td>
      <td><?php echo $company->getSort() ?></td>
      <td><?php echo $company->getCreatedAt() ?></td>
      <td nowrap>
        <a href="<?php echo url_for('company/edit?id='.$company->getId())?>" title="Засварлах" style="text-decoration:none;">
            <?php echo image_tag('icons/with-shadows/page-pencil-24.png', array())?>
        </a>
        <a onclick="return confirm('Are you sure?')" href="<?php echo url_for('company/delete?id='.$company->getId())?>" title="Устгах" style="text-decoration:none;">
            <?php echo image_tag('icons/with-shadows/cross-24.png', array())?>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br clear="all">
<?php echo pager($pager, 'company/index')?>