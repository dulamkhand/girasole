<?php $host = sfConfig::get('app_host')?>
<form action="<?php echo url_for('pollOption/index')?>" method="GET">
    <?php include_partial('global/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th>Poll</th>
      <th>Details</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0;?>
    <?php foreach ($pager->getResults() as $rs): ?>
    <tr style="background:<?php if(!$rs->getIsActive()) echo '#dedede;'?>">
        <td><?php echo ++$i?></td>
        <td>
            <a href="<?php echo url_for('poll/edit?id='.$rs->getId())?>" class="action"><b><?php echo $rs->getTitle() ?></b></a><br>
            <?php echo $rs->getBody() ?>
        </td>
        <!--details-->
        <td nowrap>
            <?php if($rs->getMultipleChoice()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Multiple choices<br>
            <?php if($rs->getOptionsAddable()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Options addable<br>
            <?php if($rs->getIsFeatured()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Featured<br>
            <?php if($rs->getIsActive()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Active<br>
            Created at: <?php echo $rs->getCreatedAt() ?><br>
            Sort: <?php echo $rs->getSort() ?>
        </td>
        <td nowrap>
            <a href="<?php echo url_for('pollOption/index?pollId='.$rs->getId())?>" class="action">Options</a> | 
            <a href="<?php echo url_for('pollOption/new?pollId='.$rs->getId())?>" class="action">Add option</a>
            <br clear="all">
            
            <?php include_partial('global/featurate', array('module'=>'poll', 'rs'=>$rs));?>
            <?php include_partial('global/activate', array('module'=>'poll', 'rs'=>$rs));?>
            <br clear="all">
  
            <?php include_partial('global/actions', array('module'=>'poll', 'id'=>$rs->getId()));?>
        </td> 
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'poll/index?keyword='.$sf_params->get('keyword'))?>