<form action="<?php echo url_for('quizQuestion/index')?>" method="GET">
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
      <th>Question</th>
      <th>Details</th>
      <th></th>
      <th>Options</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0;?>
    <?php foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?> style="background:<?php if(!$rs->getIsActive()) echo '#dedede;'?>">
      <td><?php echo ++$i?></td>
      <td><?php echo $rs->getQuiz()?></td>
      <td width="20%">
          <a href="<?php echo url_for('quizQuestion/edit?id='.$rs->getId())?>">
              <?php echo $rs->getNumber().'. '.$rs?>
          </a>
      </td>
      <!--details-->
      <td nowrap>
          <?php if($rs->getIsActive()) echo image_tag('icons/valid.png', array('align'=>'absmiddle')) ?> Active<br>
          Created at: <?php echo $rs->getCreatedAt() ?><br>
          Sort: <?php echo $rs->getSort() ?>
      </td>
      <td nowrap>
          <?php include_partial('global/actions', array('module'=>'quizQuestion', 'id'=>$rs->getId()));?>
      </td>
      <!--options-->
      <td width="40%">
      		<?php $rss1 = $rs->getOptions();?>
          <?php foreach ($rss1 as $rs1):?>
              <a href="<?php echo url_for('quizOption/edit?id='.$rs1['id'])?>">
                  <?php echo '<b>'.$rs1['point'].'</b> &nbsp; - &nbsp; ';
                        echo striptags($rs1['body']);?>
              </a>
              &nbsp;&nbsp;
              (<?php include_partial('global/actions', array('module'=>'quizOption', 'id'=>$rs1['id']));?>)
              <br clear="all">
          <?php endforeach;?>
          <a href="<?php echo url_for('quizOption/new?questionId='.$rs->getId())?>" class="action">Add option</a>
      </td>      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'quizQuestion/index?quizId='.$quizId.'&keyword='.$sf_params->get('keyword'))?>