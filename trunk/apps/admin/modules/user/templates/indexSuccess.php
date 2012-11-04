<form action="<?php echo url_for('user/index')?>" method="GET">
    <b>Keyword</b>&nbsp; <input type="text" value="<?php echo $sf_params->get('keyword')?>" name="keyword" id="keyword" size="40" style="padding:6px;"/>
    <input type="submit" value="Submit" />
</form>

<br clear="all">

<a href="<?php echo url_for('user/new')?>"><?php echo image_tag('icons/with-shadows/badge-square-plus-24.png', array())?></a>
<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Email</th>      
      <th>Mobile</th>
      <th>Date</th>
      <th>Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $user): ?>
    <tr>
      <td><?php echo ++$i?></td>
      <td><?php echo $user->getFirstname() ?></td>
      <td><?php echo $user->getLastname() ?></td>
      <td><?php echo $user->getEmail() ?></td>
      <td><?php echo $user->getMobile() ?></td>
      <td nowrap>
        <b>Logged at:</b> <?php echo $user->getLoggedAt() ?><br>
        <b>Updated at:</b> <?php echo $user->getUpdatedAt() ?><br>
        <b>Created at:</b> <?php echo $user->getCreatedAt() ?>
      </td>
      <td nowrap>
        <?php if($user->getIsActive()==1):?>
          <a href="<?php echo url_for('user/active?id='.$user->getId().'&status=0') ?>" title="Идэвхгүй болгох" style="text-decoration:none;">
              <?php echo image_tag('icons/with-shadows/badge-square-minus-24.png', array())?>
          </a>
        <?php else:?>
          <a href="<?php echo url_for('user/active?id='.$user->getId().'&status=1') ?>" title="Идэвхжүүлэх" style="text-decoration:none;">
              <?php echo image_tag('icons/with-shadows/badge-square-check-24.png', array())?>
          </a>
        <?php endif;?>
        
        <a href="<?php echo url_for('user/edit?id='.$user->getId())?>" title="Засварлах" style="text-decoration:none;">
            <?php echo image_tag('icons/with-shadows/page-pencil-24.png', array())?>
        </a>
        <a onclick="return confirm('Are you sure?')" href="<?php echo url_for('user/delete?id='.$user->getId())?>" title="Устгах" style="text-decoration:none;">
            <?php echo image_tag('icons/with-shadows/cross-24.png', array())?>
        </a>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br clear="all">
<?php echo pager($pager, 'user/index')?>