<?php $host = sfConfig::get('app_host')?>

<form action="<?php echo url_for('quote/index')?>" method="GET">
    <b>Day</b>&nbsp;     
    <input type="text" name="day" id="day" value="<?php echo $sf_params->get('day')?>" style="width:150px;"/> &nbsp;
    <?php include_partial('global/search', array());?>
</form>

<br clear="all">
<br clear="all">
<table width="100%" cellpadding="0" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th>Day</th>
      <th>Quote</th>
      <th>Author</th>
      <th>Image</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; foreach ($pager->getResults() as $rs): ?>
    <tr <?php if($i%2 != 0) echo 'class="odd"'?>>
        <td><?php echo ++$i?></td>
        <td><?php echo $rs->getDay() ?></td>
        <td>
            <a href="<?php echo url_for('quote/edit?id='.$rs->getId())?>" class="action"><b><?php echo $rs->getTitle() ?></b></a><br>
            <?php echo $rs->getBody() ?>            
        </td>
        <td><?php echo $rs->getAuthor() ?></td>
        <td><?php if($rs->getImage()) echo link_to(image_tag('/uploads/quote/300t-'.$rs->getImage(), array('style'=>'max-width:120px;max-height:100px;')), $host.'/uploads/quote/'.$rs->getImage(), array()) ?></td>
        <td nowrap>
            <?php include_partial('global/actions', array('module'=>'quote', 'id'=>$rs->getId()));?>
        </td> 
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<?php echo pager($pager, 'quote/index?day='.$sf_params->get('day').'&keyword='.$sf_params->get('keyword'))?>