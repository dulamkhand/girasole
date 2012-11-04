<form action="<?php echo url_for('category/index')?>" method="GET">
    <b>Keyword</b>&nbsp; <input type="text" value="<?php echo $sf_params->get('keyword')?>" name="keyword" id="keyword" size="40" style="padding:6px;"/>
    <input type="submit" value="Submit" />
</form>

<br clear="all">

<a href="<?php echo url_for('category/new')?>"><?php echo image_tag('icons/with-shadows/badge-square-plus-24.png', array())?></a>
<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Parent</th>
      <th>Name</th>
      <th>Sort</th>
      <th>Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $category): ?>
    <tr>
      <td><?php echo ++$i?></td>
      <td><?php echo $category->getParentId() ?></td>
      <td><?php echo $category->getName() ?></td>
      <td><?php echo $category->getSort() ?></td>
      <td>
        <a href="<?php echo url_for('category/edit?id='.$category->getId())?>" title="Засварлах" style="text-decoration:none;">
            <?php echo image_tag('icons/with-shadows/page-pencil-24.png', array())?>
        </a>
        <a onclick="return confirm('Are you sure?')" href="<?php echo url_for('category/delete?id='.$category->getId())?>" title="Устгах" style="text-decoration:none;">
            <?php echo image_tag('icons/with-shadows/cross-24.png', array())?>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br clear="all">
<?php echo pager($pager, 'category/index')?>