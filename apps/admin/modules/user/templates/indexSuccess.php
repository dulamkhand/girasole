<form action="<?php echo url_for('user/index')?>" method="GET">
    <?php include_partial('global/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%">
  <thead>
    <tr>
      <th>#</th>
      <th>Email</th>      
      <th>Fullname</th>      
      <th>Mobile</th>
      <th>Avator</th>
      <th>Date</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i=0; foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?> style="background:<?php if(!$rs->getIsActive()) echo '#dedede;'?>">
      <td><?php echo ++$i?></td>      
      <td><?php echo $rs->getEmail() ?></td>
      <td><?php echo $rs->getFullname() ?></td>
      <td><?php echo $rs->getMobile() ?></td>
      <td><?php echo image_tag('/uploads/user/100t-'.$rs->getAvator(), array()) ?></td>
      <td nowrap>
        <b>Logged at:</b> <?php echo $rs->getLoggedAt() ?><br>
        <b>Updated at:</b> <?php echo $rs->getUpdatedAt() ?><br>
        <b>Created at:</b> <?php echo $rs->getCreatedAt() ?><br>
        <?php if($rs->getIsActive()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Active<br>
        <?php if($rs->getIsAdmin()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Admin
      </td>
      <td nowrap>
        <?php if($rs->getIsActive()==1):?>
          <a href="<?php echo url_for('user/activate?id='.$rs->getId().'&cmd=0') ?>" class="action">Dectivate</a>
        <?php else:?>
          <a href="<?php echo url_for('user/activate?id='.$rs->getId().'&cmd=1') ?>" class="action">Activate</a>
        <?php endif;?>
        <br clear="all">
        <?php include_partial('global/actions', array('module'=>'user', 'id'=>$rs->getId()));?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br clear="all">
<?php echo pager($pager, 'user/index')?>