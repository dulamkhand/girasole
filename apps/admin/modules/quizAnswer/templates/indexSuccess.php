<?php $host = sfConfig::get('app_host')?>
<form action="<?php echo url_for('quizAnswer/index')?>" method="GET">
    <b>Quiz</b>&nbsp; 
    <?php $quizId = $sf_params->get('quizId');?>
    <select name="quizId" id="quizId" style="width:250px;">
        <option></option>
        <?php $rss  = Doctrine::getTable('Quiz')->doFetchSelection();?>
        <?php foreach ($rss as $k=>$v):?>
            <option value="<?php echo $k?>" <?php if($quizId == $k) echo 'selected'?>><?php echo $v?></option>
        <?php endforeach?>
    </select> &nbsp; 
    <?php include_partial('global/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th>Quiz</th>
      <th>Answer</th>
      <th>Image</th>
      <th>Point</th>
      <th>Details</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0;?>
    <?php foreach ($pager->getResults() as $rs): ?>
    <tr style="background:<?php if(!$rs->getIsActive()) echo '#dedede;'?>">
      <td><?php echo ++$i?></td>
      <td><?php echo $rs->getQuiz()?></td>
      <td>
          <a href="<?php echo url_for('quizAnswer/edit?id='.$rs->getId())?>"><b><?php echo $rs?></b></a><br>
          <?php echo $rs->getBody()?>
      </td>
      <td><?php if($rs->getImage()) echo link_to(image_tag('/uploads/quiz/450t-'.$rs->getImage(), array('style'=>'max-width:150px;max-height:100px;')), $host.'/uploads/quiz/450t-'.$rs->getImage(), array('target'=>'_blank'))?></td>
      <td><?php echo $rs->getPointStart() ?> - <?php echo $rs->getPointEnd() ?></td>
      <!--details-->
      <td nowrap>
          <?php if($rs->getIsActive()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Active<br>
          Created at: <?php echo $rs->getCreatedAt() ?><br>
          Sort: <?php echo $rs->getSort() ?>
      </td>
      <td nowrap>
          <?php include_partial('global/activate', array('module'=>'quizAnswer', 'rs'=>$rs));?>
          <?php include_partial('global/actions', array('module'=>'quizAnswer', 'id'=>$rs->getId()));?>
      </td> 
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'quizAnswer/index?quizId='.$quizId.'&keyword='.$sf_params->get('keyword'))?>