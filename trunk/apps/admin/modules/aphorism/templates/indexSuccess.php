<form action="<?php echo url_for('aphorism/index')?>" method="GET">
    <b>Keyword</b>&nbsp; <input type="text" value="<?php echo $sf_params->get('keyword')?>" name="keyword" id="keyword" size="40" style="padding:6px;"/>
    <input type="submit" value="Submit" />
</form>

<br clear="all">

<a href="<?php echo url_for('aphorism/new')?>"><?php echo image_tag('icons/with-shadows/badge-square-plus-24.png', array())?></a>
<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Text</th>
      <th>By</th>
      <th>Sort</th>
      <th>Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $aphorism): ?>
    <tr>
      <td><?php echo ++$i?></td>
      <td><?php echo $aphorism ?></td>
      <td><?php echo $aphorism->getSource() ?></td>
      <td><?php echo $aphorism->getSort() ?></td>
      <td>
        <a href="<?php echo url_for('aphorism/edit?id='.$aphorism->getId())?>" title="Засварлах" style="text-decoration:none;">
            <?php echo image_tag('icons/with-shadows/page-pencil-24.png', array())?>
        </a>
        <a onclick="return confirm('Are you sure?')" href="<?php echo url_for('aphorism/delete?id='.$aphorism->getId())?>" title="Устгах" style="text-decoration:none;">
            <?php echo image_tag('icons/with-shadows/cross-24.png', array())?>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br clear="all">
<?php echo pager($pager, 'aphorism/index')?>