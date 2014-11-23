<?php $host = sfConfig::get('app_host')?>
<h2 style="width:600px;"><?php echo $poll?></h2>
<br clear="all">
<table width="50%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th width="25%">Option</th>
      <th>Nb of vote</th>
      <th>User (IP)</th>
      <th>Details</th>
    </tr>
  </thead>
  <tbody>
      <?php $i = 0;?>
      <?php $total = $poll->getTotalPercent();?>
      <?php foreach ($rss as $rs): ?>
      <tr style="background:<?php if(!$rs['is_active']) echo '#dedede;'?>">
        <td style="border:1px solid #ccc;"><?php echo ++$i?></td>
        <td style="border:1px solid #ccc;"><?php echo $rs['body']?></td>
        <td style="border:1px solid #ccc;" nowrap><?php echo $rs['nb_vote'] ?> vote - <?php echo $total > 0 ? floor($rs['nb_vote']*100/$total) : 0?>%</td>
        <td style="border:1px solid #ccc;"><?php echo ($rs['user_id'] == $sf_user->getId() ? "admin" : $rs['user_id']).' ('.$rs['ip'].')' ?></td>
        <!--details-->
        <td style="border:1px solid #ccc;" nowrap>
            <?php if($rs['is_active']) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Active<br>
            Created at: <?php echo $rs['created_at'] ?><br>
            Sort: <?php echo $rs['sort']?>
        </td>
      </tr>
      <?php endforeach; ?>
      <tr>
          <th style="border:1px solid #ccc;">&nbsp;</th>
          <th style="border:1px solid #ccc;">&nbsp;</th>
          <th style="border:1px solid #ccc;"><?php echo $total?> vote - 100%</th>
          <th style="border:1px solid #ccc;">&nbsp;</th>
          <th style="border:1px solid #ccc;">&nbsp;</th>
      </tr>
  </tbody>
</table>