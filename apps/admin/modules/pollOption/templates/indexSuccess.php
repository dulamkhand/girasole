<?php $host = sfConfig::get('app_host')?>
<form action="<?php echo url_for('pollOption/index')?>" method="GET">
    <b>Poll</b>&nbsp; 
    <?php $pollId = $sf_params->get('pollId');?>
    <select name="pollId" id="pollId" style="width:250px;">
        <option></option>
        <?php $rss  = Doctrine::getTable('Poll')->doFetchSelection();?>
        <?php foreach ($rss as $k=>$v):?>
            <option value="<?php echo $k?>" <?php if($pollId == $k) echo 'selected'?>><?php echo $v?></option>
        <?php endforeach?>
    </select> &nbsp; 
    <?php include_partial('global/search', array());?>
   
    <a href="<?php echo url_for('pollOption/print?pollId='.$sf_params->get('pollId'))?>" target="_blank">
        <?php echo image_tag('icons/print32a.png', array('align'=>'absmiddle'))?>
    </a>
</form>

<br clear="all">
<br clear="all">
<table width="100%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th width="25%">Poll</th>
      <th width="25%">Option</th>
      <th>Nb of vote</th>
      <th>User (IP)</th>
      <th>Details</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
      <?php $i = 0;?>
      <?php foreach ($pager->getResults() as $rs): ?>
      <tr style="background:<?php if(!$rs->getIsActive()) echo '#dedede;'?>">
        <td><?php echo ++$i?></td>
        <td><?php echo $rs->getPoll() ?></td>
        <td><a href="<?php echo url_for('pollOption/edit?id='.$rs->getId())?>" class="action"><?php echo $rs?></a></td>
        <td><?php echo $rs->getNbVote() ?></td>
        <td><?php echo ($rs->getUserId() == $sf_user->getId() ? "admin" : $rs->getUserId()).' ('.$rs->getIp().')' ?></td>
        <!--details-->
        <td nowrap>
            <?php if($rs->getIsActive()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Active<br>
            Created at: <?php echo $rs->getCreatedAt() ?><br>
            Sort: <?php echo $rs->getSort() ?>
        </td>
        <td nowrap>
            <?php include_partial('global/activate', array('module'=>'pollOption', 'rs'=>$rs));?>
            <?php include_partial('global/actions', array('module'=>'pollOption', 'id'=>$rs->getId()));?>
        </td>
      </tr>
      <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'pollOption/index?pollId='.$pollId.'&keyword='.$sf_params->get('keyword'))?>